<?php

define('MAX_LAYER', 2);
//header("content-type:text/html;charset=utf-8");
/*微信类*/
class Custom_menuApp extends StoreadminbaseApp
{
    var $_gcategory_mod;
	 function __construct()
    {
        $this->Custom_menuApp();
    }
    function Custom_menuApp()
    {
        parent::__construct();
        $this->_gcategory_mod =& bm('custom_menu', array('_store_id' => $this->visitor->get('manage_store')));
    }
    function index()
    {
       $userid=$this->visitor->get('user_id');
    	$model_wechat=& m('wechat');
    	$find_data = $model_wechat->get("user_id =".$userid);
    	$model_wxconfig=& m('wxconfig');
    	$data_wxconfig = $model_wxconfig->get("user_id =".$userid);
    	if(empty($find_data))
    	{
        $this->show_warning('请先设置微信接口！','马上去设置','index.php?app=wechat');return ;
    	}
    	if(IS_POST)
    	{
    	
    		if(empty($data_wxconfig))
    		{
    			$data=array('appid'=>$_POST['appid'],'appsecret'=>$_POST['appsecret'],'user_id'=>$userid);
    			if($model_wxconfig->add($data))
    			{
    				$this->show_message('添加成功！');return ;
    			}else
    			{
    				$this->show_warning('添加失败！');
    				return;
    			}
    		}else
    		{
    			$data=array('appid'=>$_POST['appid'],'appsecret'=>$_POST['appsecret']);
    			if($model_wxconfig->edit("user_id=".$userid,$data)!==false)
    			{
    				$this->show_message('修改成功！');return ;
    			}else
    			{
    				$this->show_warning('修改失败！');
    				return;
    			}
    		}
    	}
    	
    	
    	
        /* 取得商品分类 */
        $gcategories = $this->_gcategory_mod->get_list();
        $tree =& $this->_tree($gcategories);

        /* 先根排序 */
        $sorted_gcategories = array();
        $cate_ids = $tree->getChilds();
        foreach ($cate_ids as $id)
        {
            $sorted_gcategories[] = array_merge($gcategories[$id], array('layer' => $tree->getLayer($id)));
        }
        $this->assign('gcategories', $sorted_gcategories);

        /* 构造映射表（每个结点的父结点对应的行，从1开始） */
        $row = array(0 => 0); // cate_id对应的row
        $map = array(); // parent_id对应的row
        foreach ($sorted_gcategories as $key => $gcategory)
        {
            $row[$gcategory['cate_id']] = $key + 1;
            $map[] = $row[$gcategory['parent_id']];
        }
        $this->assign('map', ecm_json_encode($map));
        $this->import_resource(array(
              'script' => array(
                       array(
                          'path' => 'dialog/dialog.js',
                          'attr' => 'id="dialog_js"',
                       ),
                       array(
                          'path' => 'jquery.ui/jquery.ui.js',
                          'attr' => '',
                       ),
                       array(
                          'path' => 'jqtreetable.js',
                          'attr' => '',
                       ),
                       array(
                          'path' => 'jquery.plugins/jquery.validate.js',
                          'attr' => '',
                       ),
                       array(
                          'path' => 'utils.js',
                          'attr' => '',
                       ),
              ),
              'style' =>  'jquery.ui/themes/ui-lightness/jquery.ui.css,res:css/jqtreetable.css',
            ));
        header("Content-Type:text/html;charset=" . CHARSET);
    	
    	
    	
    	
    	$this->assign('info',$data_wxconfig);
    	$this->_curlocal('微信管理',url('app=wechat&act=custom_menu'),'自定义菜单');
    	/* 当前用户中心菜单 */
    	$this->_curitem('custom_menu');
    	$this->_config_seo('title', '自定义菜单');
    	$this->display('custom_menu.index.html');
    }

    
    
    
     function add()
    {
        if (!IS_POST)
        {
            /* 当前页面信息 
            $this->_curlocal(LANG::get('member_center'), 'index.php?app=member',
                             LANG::get('my_category'), 'index.php?app=my_category',
                             LANG::get('gcategory_add'));
            $this->_curitem('my_category');
            $this->_curmenu('gcategory_manage');
            $this->_config_seo('title', Lang::get('member_center') . Lang::get('my_category'));*/

            $pid = empty($_GET['pid']) ? 0 : intval($_GET['pid']);
            $gcategory = array('parent_id' => $pid, 'sort_order' => 255, 'if_show' => 1);
            header('Content-Type:text/html;charset=' . CHARSET);
            $this->assign('gcategory', $gcategory);
            $this->import_resource(array(
                'script' => 'jquery.plugins/jquery.validate.js'
            ));
            $this->assign('parents', $this->_get_options());
            header("Content-Type:text/html;charset=" . CHARSET);
            $this->display('custom_menu.form.html');
        }
        else
        {
         $userid=$this->visitor->get('user_id');
    	$model_wechat=& m('wechat');
    	$find_data = $model_wechat->get("user_id =".$userid);
    	
            $data = array(
                'cate_name'  => $_POST['cate_name'],
                'parent_id'  => $_POST['parent_id'],
                'sort_order' => $_POST['sort_order'],
                'if_show'    => $_POST['if_show'],
                'type'    => $_POST['type'],
                'keyvalue'    => $_POST['keyvalue'],
                'keyword'    => $_POST['keyword'],
                'token'=>$find_data['token'],
            );

            /* 检查名称是否已存在 
            if (!$this->_gcategory_mod->unique(trim($data['cate_name']), $data['parent_id']))
            {
                $this->pop_warning('name_exist');
                return;
            }*/

            /* 保存 */
            $cate_id = $this->_gcategory_mod->add($data);
            if (!$cate_id)
            {
                $this->pop_warning($this->_gcategory_mod->get_error());
                return;
            }

            $this->pop_warning('ok', 'my_category_add');
        }
    }

    /* 检查分类名的唯一性 */
    function check_category ()
    {
        $cate_name = empty($_GET['cate_name']) ? '' : trim($_GET['cate_name']);
        $parent_id = empty($_GET['parent_id']) ? 0  : intval($_GET['parent_id']);
        $cate_id   = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if (!$cate_name)
        {
            echo ecm_json_encode(true);
            return ;
        }
        if ($this->_gcategory_mod->unique($cate_name, $parent_id, $cate_id))
        {
            echo ecm_json_encode(true);
        }
        else
        {
            echo ecm_json_encode(false);
        }
        return ;
    }

    function edit()
    {
        $id = empty($_GET['id']) ? 0 : intval($_GET['id']);
        if (!IS_POST)
        {
            /* 是否存在 */
            $gcategory = $this->_gcategory_mod->get_info($id);
            if (!$gcategory)
            {
                echo Lang::get('gcategory_empty');
                return;
            }
            $this->assign('gcategory', $gcategory);

            $this->assign('parents', $this->_get_options($id));

            /* 当前页面信息 
            $this->_curlocal(LANG::get('member_center'), 'index.php?app=member',
                             LANG::get('my_category'), 'index.php?app=custom_menu',
                             LANG::get('gcategory_edit'));
            $this->_curitem('my_category');
            $this->_curmenu('edit_category');
            $this->_config_seo('title', Lang::get('member_center') . Lang::get('my_category'));*/
            $this->import_resource(array(
                'script' => 'jquery.plugins/jquery.validate.js'
            ));
            header("Content-Type:text/html;charset=" . CHARSET);
            $this->display('custom_menu.form.html');
        }
        else
        {
            $data = array(
                'cate_name'  => $_POST['cate_name'],
                'parent_id'  => $_POST['parent_id'],
                'sort_order' => $_POST['sort_order'],
                'if_show' => $_POST['if_show'],
                'type' => $_POST['type'],
                'keyvalue' => $_POST['keyvalue'],
               'keyword'=> $_POST['keyword'],
            );

            /* 检查名称是否已存在 
            if (!$this->_gcategory_mod->unique(trim($data['cate_name']), $data['parent_id'], $id))
            {
                $this->pop_warning('name_exist');
                return;
            }*/

            /* 保存 */
            $rows = $this->_gcategory_mod->edit($id, $data);
            if ($this->_gcategory_mod->has_error())
            {
                $this->pop_warning($this->_gcategory_mod->get_error());
                return;
            }
          
            $this->pop_warning('ok','my_category_edit');
        }
    }

         //异步修改数据
       function ajax_col()
       {
           $id     = empty($_GET['id']) ? 0 : intval($_GET['id']);
           $column = empty($_GET['column']) ? '' : trim($_GET['column']);
           $value  = isset($_GET['value']) ? trim($_GET['value']) : '';
           $data   = array();
           if (in_array($column ,array('cate_name','if_show', 'sort_order')))
           {
               $data[$column] = $value;
               if ($column == 'cate_name')
               {
                   $gcategory = $this->_gcategory_mod->get_info($id);
                   if(!$this->_gcategory_mod->unique($value, $gcategory['parent_id'], $id))
                   {
                       $this->json_error('category name exist');
                       return ;
                   }
               }
               $this->_gcategory_mod->edit($id, $data);
               if(!$this->_gcategory_mod->has_error())
               {
                   $result = $this->_gcategory_mod->get_info($id);
                   $this->json_result($result[$column]);
               }
               else
               {
                   $this->json_error($this->_gcategory_mod->get_error());
                   return;
               }
           }
           else
           {
               $this->json_error('unallow edit');
               return;
           }
           return ;
       }
    function drop()
    {
        $id = isset($_GET['id']) ? trim($_GET['id']) : '';
        if (!$id)
        {
            $this->show_warning('no_gcategory_to_drop');
            return;
        }

        $ids = explode(',', $id);
        if (!$this->_gcategory_mod->drop($ids))
        {
            $this->show_warning($this->_gcategory_mod->get_error());
            return;
        }

        $this->show_message('删除成功！');
    }

   
    /* 构造并返回树 */
    function &_tree($gcategories)
    {
        import('tree.lib');
        $tree = new Tree();
        $tree->setTree($gcategories, 'cate_id', 'parent_id', 'cate_name');
        return $tree;
    }

    /* 取得可以作为上级的商品分类数据 */
    function _get_options($except = NULL)
    {
        $gcategories = $this->_gcategory_mod->get_list();
        $tree =& $this->_tree($gcategories);
        return $tree->getOptions(MAX_LAYER - 1, 0, $except);
    }

   /* function _get_member_submenu()
    {
        $menus = array(
            array(
                'name' => 'gcategory_manage',
                'url'  => 'index.php?app=my_category',
            ),
            );
        return $menus;
    }*/
   
     function creat_menu()
   {
  
   	    $userid=$this->visitor->get('user_id');
    	$model_wxconfig=& m('wxconfig');
    	$wechat = $model_wxconfig->get("user_id =".$userid);

		if(!is_array($wechat))
		{
				$this->show_warning('请先添加微信APPID和微信AppSecret!');
					return;
		}else 
		{
			if($wechat['appid']==''||$wechat['appsecret']=='')
			{
				$this->show_warning('微信APPID或微信AppSecret不能为空!');
					return;
			}
		}
		$ACCESS_LIST=$this->curl($wechat['appid'],$wechat['appsecret']);
		if($ACCESS_LIST['access_token']!='')
		{
		$access_token=$ACCESS_LIST['access_token'];//获取到ACCESS_TOKEN
		$data=$this->getmenu();
	 //var_dump(preg_replace("#\\\u([0-9a-f]{4}+)#ie", "iconv('UCS-2', 'UTF-8', pack('H4', '\\1'))", $data));exit;
		 $msg=$this->curl_menu($access_token,preg_replace("#\\\u([0-9a-f]{4}+)#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $data));
        if($msg['errmsg']=='ok')
        {
        	$this->show_message('创建自定义菜单成功');return ;
        }
        else {
        	$wechat_error= $this->wechat_error($msg['errcode']);
             $this->show_warning('创建自定义菜单失败!'.$wechat_error);
        }
		}else 
		{
           $this->show_warning('创建失败,微信AppId或微信AppSecret填写错误');
		}
   }
   
   
   public function delete_menu()
   {
   	 $userid=$this->visitor->get('user_id');
    	$model_wxconfig=& m('wxconfig');
    	$wechat = $model_wxconfig->get("user_id =".$userid);
		if(!is_array($wechat))
		{
				$this->show_warning('请先添加微信APPID和微信AppSecret!');
					return;
		}else 
		{
			if($wechat['appid']==''||$wechat['appsecret']=='')
			{
				$this->show_warning('微信APPID或微信AppSecret不能为空!');
					return;
			}
		}
			$ACCESS_LIST=$this->curl($wechat['appid'],$wechat['appsecret']);
		if($ACCESS_LIST['access_token']!='')
		{
		$access_token=$ACCESS_LIST['access_token'];//获取到ACCESS_TOKEN
		$msg=$this->curl_delete($access_token);
		
        if($msg['errmsg']=='ok')
        {
        	$this->show_message('删除自定义菜单成功');return ;
        }
        else {
      
             $this->show_warning('删除自定义菜单失败!');return;
        }
		}else 
		{
           $this->show_warning('微信AppId或微信AppSecret填写错误');
		}
   }
    

	public function curl($appid,$secret)
    {
    	$ch = curl_init();
    	curl_setopt($ch, CURLOPT_URL, "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$secret);
    	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
    	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    	curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	$tmpInfo = curl_exec($ch);
    	if (curl_errno($ch)) {
    		echo 'Errno'.curl_error($ch);
    	}
    	curl_close($ch);
    	$arr= json_decode($tmpInfo,true);
    	return $arr;
    }

       public function curl_menu($ACCESS_TOKEN,$data)
    {
    	$ch = curl_init();
    	curl_setopt($ch, CURLOPT_URL, "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$ACCESS_TOKEN);
    	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
    	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    	curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
    	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	$tmpInfo = curl_exec($ch);
    	if (curl_errno($ch)) {
    		echo 'Errno'.curl_error($ch);
    	}
    	curl_close($ch);
    	$arr= json_decode($tmpInfo,true);
    	return $arr;
    }
    
        public function curl_delete($ACCESS_TOKEN)
    {
    	$ch = curl_init();
    	curl_setopt($ch, CURLOPT_URL, "https://api.weixin.qq.com/cgi-bin/menu/delete?access_token=".$ACCESS_TOKEN);
    	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
    	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    	curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
    	//curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	$tmpInfo = curl_exec($ch);
    	if (curl_errno($ch)) {
    		echo 'Errno'.curl_error($ch);
    	}
    	curl_close($ch);
    	$arr= json_decode($tmpInfo,true);
    	return $arr;
    }

   
   public function getmenu()
   {
   	    $model_custom=& m('custom_menu');
       	$keyword = array();
       	$userid=$this->visitor->get('user_id');
       	  $topmemu = $model_custom->find(array(
                'conditions' => "store_id =".$userid." AND if_show=1 AND parent_id=0",
                'order'=>'sort_order asc,cate_id asc',
                ));
                
       /*	echo "<pre>";
       print_r($topmemu);
       	echo "</pre>";
       	exit;*/
    	foreach ($topmemu as $key )
    	{
    		$nextmenu = $model_custom->find(array(
                'conditions' => "store_id =".$userid." AND if_show=1 AND parent_id=".$key['cate_id'],
                'order'=>'sort_order asc,cate_id asc',
                ));
    		//$nextmenu=M('custom_menu')->where(array('token'=>session('token'),'pid'=>$key['id']))->order('sort asc')->select();
    		if(count($nextmenu)!=0)//没有下级栏目
    		{
                 foreach ($nextmenu as $key2)
                 {
                 	if($key2['type']==1)
                 	{
                 	$kk[]=array('type'=>'view','name'=>$key2['cate_name'],'url'=>$key2['keyvalue']);
                 	}else 
                 	{
                 		$kk[]=array('type'=>'click','name'=>$key2['cate_name'],'key'=>$key2['keyvalue']);
                 	}
                 }
                 $keyword['button'][]=array('name'=>$key['cate_name'],'sub_button'=>$kk);
                 $kk='';
    		}else
    		{
    			if($key['type']==1)
    			{
    			    $keyword['button'][]=array('type'=>'view','name'=>$key['cate_name'],'url'=>$key['keyvalue']);
    			}else 
    			{

    				 $keyword['button'][]=array('type'=>'click','name'=>$key['cate_name'],'key'=>$key['keyvalue']);
    			}
    		}
    	}
     return	json_encode($keyword);
   } 

    
	public  function wechat_error($error)
	{
	  	$wechat_error= array('-1'=>'系统繁忙',
	  	  '0'=>'请求成功',
	  	  '40001'=>'验证失败',
	  	  '40002'=>'不合法的凭证类型',
	  	  '40003'=>'不合法的OpenID',
	  	  '40013'=>'不合法的APPID',
	  	  '40014'=>'不合法的access_token',
	  	  '40015'=>'不合法的菜单类型',
	  	  '40016'=>'不合法的按钮个数',
	  	  '40017'=>'不合法的按钮个数',
	  	  '40018'=>'不合法的按钮名字长度',
	  	  '40019'=>'不合法的按钮KEY长度',
	  	  '40020'=>'不合法的按钮URL长度',
	  	  '40021'=>'不合法的菜单版本号',
	  	  '40022'=>'不合法的子菜单级数',
	  	  '40023'=>'不合法的子菜单按钮个数',
	  	  '40024'=>'不合法的子菜单按钮类型',
	  	  '40025'=>'不合法的子菜单按钮名字长度',
	  	  '40026'=>'不合法的子菜单按钮KEY长度',
	  	  '40027'=>'不合法的子菜单按钮URL长度',
	  	  '40028'=>'不合法的自定义菜单使用用户',
	  	  '41001'=>'缺少access_token参数',
	  	  '41002'=>'缺少appid参数',
	  	  '41003'=>'缺少refresh_token参数',
	  	  '41004'=>'缺少secret参数',
	  	  '41005'=>'缺少多媒体文件数据',
	  	  '41006'=>'缺少media_id参数',
	  	  '41007'=>'缺少子菜单数据',
	  	  '42001'=>'access_token超时',
	  	  '43001'=>'需要GET请求',
	  	  '43002'=>'需要POST请求',
	  	  '43003'=>'需要HTTPS请求',
	  	  '45010'=>'创建菜单个数超过限制',
	  	  '46002'=>'不存在的菜单版本',
	  	  '46003'=>'不存在的菜单数据',
	  	  '47001'=>'解析JSON/XML内容错误',

	  	);
	  	return $wechat_error[$error];
	}
    
}

?>