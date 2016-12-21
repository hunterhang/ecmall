<?php

/**
 *    插件管理控制器
 *
 *    @author    Garbin
 *    @usage    none
 */
class H_orderApp extends BackendApp
{
    function index()
    {
        $search_options = array(
            'buyer_name'   => "买家名称",
            'order_sn'   => "订单号",
        );
        /* 默认搜索的字段是店铺名 */
        $field = 'buyer_name';
        array_key_exists($_GET['field'], $search_options) && $field = $_GET['field'];
        $conditions = $this->_get_query_conditions(array(array(
                'field' => $field,       //按用户名,店铺名,支付方式名称进行搜索
                'equal' => 'LIKE',
                'name'  => 'search_name',
            ),array(
                'field' => 'status',
                'equal' => '=',
                'type'  => 'numeric',
            ),array(
                'field' => 'created',
                'name'  => 'add_time_from',
                'equal' => '>=',
                'handler'=> 'gmstr2time',
            ),array(
                'field' => 'created',
                'name'  => 'add_time_to',
                'equal' => '<=',
                'handler'   => 'gmstr2time_end',
            ),array(
                'field' => 'order_amount',
                'name'  => 'order_amount_from',
                'equal' => '>=',
                'type'  => 'numeric',
            ),array(
                'field' => 'order_amount',
                'name'  => 'order_amount_to',
                'equal' => '<=',
                'type'  => 'numeric',
            ),
        ));
        $model_order =& m('user_order');
        $page   =   $this->_get_page(10);    //获取分页信息
        //更新排序
        if (isset($_GET['sort']) && isset($_GET['order']))
        {
            $sort  = strtolower(trim($_GET['sort']));
            $order = strtolower(trim($_GET['order']));
            if (!in_array($order,array('asc','desc')))
            {
             $sort  = 'created';
             $order = 'desc';
            }
        }
        else
        {
            $sort  = 'created';
            $order = 'desc';
        }
        $orders = $model_order->find(array(
            'conditions'    => '1=1 ' . $conditions,
            'limit'         => $page['limit'],  //获取当前页的数据
            'order'         => "$sort $order",
            'count'         => true             //允许统计
        )); //找出所有商城的合作伙伴
        $page['item_count'] = $model_order->getCount();   //获取统计的数据
        $this->_format_page($page);
        $this->assign('filtered', $conditions? 1 : 0); //是否有查询条件
        $this->assign('order_status_list', array(
            ORDER_PENDING => Lang::get('order_pending'),
            ORDER_SUBMITTED => Lang::get('order_submitted'),
            ORDER_ACCEPTED => Lang::get('order_accepted'),
            ORDER_SHIPPED => Lang::get('order_shipped'),
            ORDER_FINISHED => Lang::get('order_finished'),
            ORDER_CANCELED => Lang::get('order_canceled'),
        ));
        $this->assign('search_options', $search_options);
        $this->assign('page_info', $page);          //将分页信息传递给视图，用于形成分页条
        $this->assign('orders', $orders);
        $this->import_resource(array('script' => 'inline_edit.js,jquery.ui/jquery.ui.js,jquery.ui/i18n/' . i18n_code() . '.js',
                                      'style'=> 'jquery.ui/themes/ui-lightness/jquery.ui.css'));
        $this->display('h_order.index.html');
    }

    /**
     *    启用一个插件
     *
     *    @author    Garbin
     *    @param    none
     *    @return    void
     */
    function enable()
    {
        $id = empty($_GET['id']) ? 0 : trim($_GET['id']);
        if (!$id)
        {
            $this->show_warning('no_such_plugin');

            return;
        }
        $plugin_info = $this->_get_plugin_info($id);
        if (!IS_POST)
        {
            $this->assign('plugin', $plugin_info);
            $this->display('plugin.form.html');
        }
        else
        {
            $config = empty($_POST['config']) ? array() : $_POST['config'];
            $result = $this->_enable_plugin($plugin_info['hook'], $id, $config);

            if (!$result)
            {
                $this->show_warning('enable_plugin_failed');

                return;
            }

            $this->show_message('enable_plugin_successed',
                'plugin_manage', 'index.php?app=plugin');
        }
    }

    /**
     *    禁用插件
     *
     *    @author    Garbin
     *    @return    void
     */
    function disable()
    {
        $id = empty($_GET['id']) ? 0 : trim($_GET['id']);
        if (!$id)
        {
            $this->show_warning('no_such_plugin');

            return;
        }
        if(!$this->_disable_plugin($id))
        {
            $this->show_warning('disable_plugin_failed');

            return;
        }

        $this->show_message('disable_plugin_successed');
    }

    function config()
    {
        $id = empty($_GET['id']) ? 0 : trim($_GET['id']);
        if (!$id)
        {
            $this->show_warning('no_such_plugin');

            return;
        }
        $plugin_info = $this->_get_plugin_info($id);
        if (!IS_POST)
        {
            $config      = $this->_get_plugin_config($plugin_info['hook'], $id);
            $this->assign('plugin', $plugin_info);
            $this->assign('config', $config);
            $this->display('plugin.form.html');
        }
        else
        {
            $enabled = $this->_list_enabled_plugins();
            $enabled[$plugin_info['hook']][$id] = $_POST['config'];
            if (!$this->_save_enabled($enabled))
            {
                $this->show_warning('config_plugin_failed');

                return;
            }

            $this->show_message('config_plugin_successed',
            'plugin_manage', 'index.php?app=plugin');
        }
    }

    /**
     *    读取已安装的插件
     *
     *    @author    Garbin
     *    @return    array
     */
    function _list_plugins()
    {
        $plugin_dir = ROOT_PATH . '/external/plugins';
        static $plugins    = null;
        if ($plugins === null)
        {
            $plugins = array();
            if (!is_dir($plugin_dir))
            {
                return $plugins;
            }
            $dir = dir($plugin_dir);
            while (false !== ($entry = $dir->read()))
            {
                if (in_array($entry, array('.', '..')) || $entry{0} == '.')
                {
                    continue;
                }
                $info = $this->_get_plugin_info($entry);
                $plugins[$entry] = $info;
                $plugins[$entry]['enabled'] = $this->_is_enabled($info['hook'], $entry);
            }
        }

        return $plugins;
    }

    /**
     *    获取已启用的插件列表
     *
     *    @author    Garbin
     *    @return    array
     */
    function _list_enabled_plugins()
    {
        $plugin_inc_file = ROOT_PATH . '/data/plugins.inc.php';
        if (is_file($plugin_inc_file))
        {
            return include($plugin_inc_file);
        }

        return array();
    }

    /**
     *    获取插件信息
     *
     *    @author    Garbin
     *    @param     string $id
     *    @return    array
     */
    function _get_plugin_info($id)
    {
        $plugin_info_path = ROOT_PATH . '/external/plugins/' . $id . '/plugin.info.php';

        return include($plugin_info_path);
    }

    /**
     *    获取插件信息
     *
     *    @author    Garbin
     *    @param     string $hook
     *    @param     string $id
     *    @return    array
     */
    function _get_plugin_config($hook, $id)
    {
        $enabled = $this->_list_enabled_plugins();
        return $enabled[$hook][$id];
    }

    /**
     *    判断指定的插件是否已启用
     *
     *    @author    Garbin
     *    @param     string $hook
     *    @param     string $id
     *    @return    bool
     */
    function _is_enabled($hook, $id)
    {
        static $enabled = null;
        if ($enabled === null)
        {
            $enabled = $this->_list_enabled_plugins();
        }

        return isset($enabled[$hook][$id]);
    }

    /**
     *    启用一个插件
     *
     *    @author    Garbin
     *    @param     string $hook
     *    @param     string $id
     *    @param     array  $config
     *    @return    bool
     */
    function _enable_plugin($hook, $id, $config)
    {
        $enabled = $this->_list_enabled_plugins();
        $enabled[$hook][$id] = $config;

        return $this->_save_enabled($enabled);
    }

    /**
     *    彬用一个插件
     *
     *    @author    Garbin
     *    @param     string $id
     *    @return    bool
     */
    function _disable_plugin($id)
    {
        $enabled = $this->_list_enabled_plugins();
        $info    = $this->_get_plugin_info($id);
        unset($enabled[$info['hook']][$id]);

        return $this->_save_enabled($enabled);
    }

    /**
     *    保存已安装的信息
     *
     *    @author    Garbin
     *    @param     array $enabled
     *    @return    bool
     */
    function _save_enabled($enabled)
    {
        $plugin_inc_file = ROOT_PATH . '/data/plugins.inc.php';
        $php_data = "<?php\n\nreturn " . var_export($enabled, true) . ";\n\n?>";
        return file_put_contents($plugin_inc_file, $php_data, LOCK_EX);
    }
}

?>