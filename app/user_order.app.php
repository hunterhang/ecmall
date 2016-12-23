<?php

class User_orderApp extends MallbaseApp
{
    function index()
    {
        $this->assign('index', 1); // 标识当前页面是首页，用于设置导航状态
        $this->assign('icp_number', Conf::get('icp_number'));

        /* 热门搜素 */
        $this->assign('hot_keywords', $this->_get_hot_keywords());

        $this->_config_seo(array(
            'title' => Lang::get('mall_index') . ' - ' . Conf::get('site_title'),
        ));
        $this->assign('page_description', Conf::get('site_description'));
        $this->assign('page_keywords', Conf::get('site_keywords'));
        $this->display('user_order.html');
    }
    function check_param()
    {
        import('uploader.lib');
        $data = array();
        $ret = 0;
        $msg = "success";
        //检查数据
        do{
            if($_POST['goods_size'] == "")
            {
                $ret = -1;
                $msg = "请选择需要改成的尺码";
                break;
            };
            if($_POST['close_type'] == "")	
                {
                $ret = -2;
                $msg = "请选择需要改成的尺码";
                break;
            };
            if($_POST['old_img'] == "")	
            {
                $ret = -3;
                $msg = "请重新上传旧衣照片";
                break;
            };

            if($_POST['new_img'] == "")	
            {
                $ret = -4;
                $msg = "请重新上传新衣照片";
                break;
            };
            $data['goods_size'] = $_POST['goods_size'];
            $data['close_type'] = $_POST['close_type'];	
            $data['old_img'] = $_POST['old_img'];	
            $data['new_img'] = $_POST['new_img'];	
        }while(0);
        $data['ret'] = $ret;
        $data['msg'] = $msg;
        echo json_encode($data);
        return ;
    }

    function order_view()
    {
        $size = $_GET['size'];
        $style = $_GET['style'];
        $old_img = $_GET['o'];
        $new_img = $_GET['n'];
        $ret = 0;
        $size_text = "未知";
        switch ($size) {
            case 1:
                $size_text = "S";
                break;
            case 2:
                $size_text = "M";
                break;
            case 3:
                $size_text = "XS";
                break;
            case 4:
                $size_text = "XL";
                break;
            default:
                $ret = -1;
                break;
        }


        $style_text = "未知";
        switch ($style) {
            case 1:
                $style_text = "上衣";
                break;
            case 2:
                $style_text = "裤子";
                break;
            case 3:
                $style_text = "裙子";
                break;
            case 4:
                $style_text = "大衣";
                break;
            default:
                $ret = -1;
                break;
        }
        $this->assign("select_size",$size_text);
        $this->assign("select_style",$style_text);
        $this->assign("old_img",$old_img);
        $this->assign("new_img",$new_img);
        $this->assign("send_amount",19);
        $this->assign("total_amount",99);
        $this->display('order_view.html');
        return ;
        if(!IS_POST)
        {
            return ;
        };

    }

    function save_order()
    {
        if(IS_POST)
        {
            
        
        };
    
    }
	function upload_img()
	{
		//数据检查
		import('uploader.lib');
		$data = array();
        $ret = 0;
        $msg = "success";
        $url = "";
        foreach($_FILES as $key=>$val)
        {
            $file = $val;
            if($file == "")
            {
                $ret = -1;
                $msg = "请选择图片";
                break;
            };
            if($file['error'] != UPLOAD_ERR_OK)
            {
                $ret = -2;
                $msg = "上传图片错误";
                break;
            };
            $uploader = new Uploader();
            $uploader->allowed_type(IMAGE_FILE_TYPE);
            $uploader->allowed_size(SIZE_STORE_LOGO);
            $uploader->addFile($file);

            if ($uploader->file_info() === false)
            {
                $msg = $uploader->get_error();
                $ret = -3;
                break;
            }
            //print_r($file);
            $uploader->root_dir(ROOT_PATH);
            $url = $uploader->save('data/files/goods', $uploader->random_filename());
            break;
        };
        $data['ret'] = $ret;
        $data['msg'] = $msg;
        $data['url'] = $url;
        echo json_encode($data);
        return ; 
	}
    function _get_hot_keywords()
    {
        $keywords = explode(',', conf::get('hot_search'));
        return $keywords;
    }
	     /**
     * 资费
     *
     */
    function zifei()
    {$sgrade_mod =& m('sgrade');
	$sgrades = $sgrade_mod->find(array(
                    'order' => 'sort_order',
                ));
				
                foreach ($sgrades as $key => $sgrade)
                {
                    if (!$sgrade['goods_limit'])
                    {
                        $sgrades[$key]['goods_limit'] = LANG::get('no_limit');
                    }
                    if (!$sgrade['space_limit'])
                    {
                        $sgrades[$key]['space_limit'] = LANG::get('no_limit');
                    }
                    $arr = explode(',', $sgrade['functions']);
                    $subdomain = array();
                    foreach ( $arr as $val)
                    {
                        if (!empty($val))
                        {
                            $subdomain[$val] = 1;
                        }
                    }
                    $sgrades[$key]['functions'] = $subdomain;
                    unset($arr);
                    unset($subdomain);
                }
                //var_dump($sgrade['functions']);exit;
                $this->assign('sgrades', $sgrades);
        $this->display('zifei.html');
    }
}

?>
