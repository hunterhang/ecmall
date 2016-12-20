<?php

/**
 *    Desc
 *
 *    @author    Garbin
 *    @usage    none
 */
class WechatApp extends StoreadminbaseApp
{
    function __construct()
    {
        $this->WechatApp();
    }
    function WechatApp()
    {
        parent::__construct();
    }
   function index()
    {
    	

    	$userid=$this->visitor->get('user_id');
    	$model_wechat=& m('wechat');
    	$find_data = $model_wechat->get("user_id =".$userid);
    	if(IS_POST)
    	{
    		if(empty($find_data))
    		{
    			
    			if (preg_match("/([\x81-\xfe][\x40-\xfe])/",trim($_POST['token']), $match)) {//存在中文
    				$this->show_warning('TOKEN值不能存在中文或特殊符号！');
    				return ;
    			}
    				if(preg_match("/^\\d+$/",trim($_POST['token'])))//纯数字
    			{
    				$this->show_warning('TOKEN值不能使用纯数字！');
    				return ;
    			}
    			if(strlen(trim($_POST['token']))<3||strlen(trim($_POST['token']))>32)
    			{
    				$this->show_warning('TOKEN值长度在3-32个字符之间！');
    				return ;
    			}
    			if(!$model_wechat->unique($_POST['token'],$userid))
    			{
    				$this->show_warning('TOKEN值已经存在，请换一个！');
    				return;
    			}
    			$data=array('wxname'=>$_POST['wxname'],'weixin'=>$_POST['weixin'],'token'=>$_POST['token'],'user_id'=>$userid,'wx_type'=>$_POST['wx_type']);
    			if($model_wechat->add($data))
    			{
    				$this->show_message('添加成功！');return ;
    			}else
    			{
    				$this->show_warning('添加失败！');
    				return;
    			}
    		}else
    		{
    			if(!$model_wechat->unique($_POST['token'],$userid))
    			{
    				$this->show_warning('TOKEN值已经存在，请换一个！');
    				return;
    			}
    			$data=array('wxname'=>$_POST['wxname'],'weixin'=>$_POST['weixin'],'wx_type'=>$_POST['wx_type']);
    			if($model_wechat->edit("user_id=".$userid,$data)!==false)
    			{
    				$this->show_message('修改成功！');return ;
    			}else
    			{
    				$this->show_warning('修改失败！');
    				return;
    			}
    		}
    	}


    	$this->assign('wechat', $find_data);
    	$this->_curlocal('微信管理',url('app=wechat'),'微信接口管理');
    	/* 当前用户中心菜单 */
    	$this->_curitem('wechat_index');
    	$this->_config_seo('title', '微信接口管理');
    	$this->display('wechat.index.html');
    }
    /**
     * 关注自动回复
     *
     */
    function follow_index()
    {
    	
    	$userid=$this->visitor->get('user_id');
    	$model_wechat=& m('wechat');
    	$find_data = $model_wechat->get("user_id =".$userid);
    	if(empty($find_data))
    	{
        $this->show_warning('请先设置微信接口！','马上去设置','index.php?app=wechat');return ;
    	}
    	
    	
    	$this->_curlocal('微信管理',url('app=wechat&act=follow_index'),'关注自动回复');
    	/* 当前用户中心菜单 */
    	$this->_curitem('follow_index');
    	$this->_config_seo('title', '关注自动回复');
    	$this->display('follow.index.html');
    }

    /**
     * *
     * 添加，修改 关注自动回复
     *
     */
    function addfollow()
    {
    	if(IS_POST)
    	{
    	$userid=$this->visitor->get('user_id');
    	$model_wechat=& m('wechat');
    	$find_data = $model_wechat->get("user_id =".$userid);
		$model_keyword=& m('keyword');
    	$keyinfo = $model_keyword->get("user_id =".$userid." AND isfollow=1 AND token ='".$find_data['token']."'");
			$keyword = array();
			$keyword['type']= intval($_POST['ketype']);
			$linkinfo=explode(",",substr($_POST['linkinfo'], 0, -1));
			$titles=explode(",",substr($_POST['titles'], 0, -1));
			$imageinfo=explode(",",substr($_POST['imageinfo'], 0, -1));
			if(empty($keyinfo)){
				if($keyword['type']==1){
					$keyword['kecontent'] = trim($_POST['kecontent']);
				}else{
					$keyword['linkinfo']  = serialize($linkinfo);
					$keyword['titles']    = serialize($titles);
					$keyword['imageinfo'] = serialize($imageinfo);
				}
				     $keyword['isfollow'] = 1;
				     $keyword['user_id'] = $userid;	
				     $keyword['token'] = $find_data['token'];	
					if($model_keyword->add($keyword))
					{
						echo "1";
					}else 
					{
						echo "0";
					}
			}else{
				if($keyword['type']==1){
					$keyword['linkinfo']  = NULL;
					$keyword['titles']    = NULL;
					$keyword['imageinfo'] = NULL;
					$keyword['kecontent'] = trim($_POST['kecontent']);
				}else{
					$keyword['kecontent'] = NULL;
					$keyword['linkinfo']  = serialize($linkinfo);
					$keyword['titles']    = serialize($titles);
					$keyword['imageinfo'] = serialize($imageinfo);
				}
				$keyword['user_id'] = $userid;
				$keyword['token'] = $find_data['token'];
				//$where = array('isfollow' => 1,'user_id'=>$userid);
				
				if($model_keyword->edit("user_id=".$userid." AND isfollow =1",$keyword)!==false)
    			{
    				echo "1";
    			}else
    			{
    				echo "0";
    			}
				
			}
    	}
    }
    
    /**
     * *
     * 添加 修改消息自动回复
     * 
     */
    function addmess()
    {
    		if(IS_POST)
    	{
    	$userid=$this->visitor->get('user_id');
    	$model_wechat=& m('wechat');
    	$find_data = $model_wechat->get("user_id =".$userid);
		$model_keyword=& m('keyword');
    	$keyinfo = $model_keyword->get("user_id =".$userid." AND ismess=1 AND token ='".$find_data['token']."'");
			$keyword = array();
			$keyword['type']= intval($_POST['ketype']);
			$linkinfo=explode(",",substr($_POST['linkinfo'], 0, -1));
			$titles=explode(",",substr($_POST['titles'], 0, -1));
			$imageinfo=explode(",",substr($_POST['imageinfo'], 0, -1));
			//var_dump(serialize($linkinfo));
			//exit;
			if(empty($keyinfo)){
				if($keyword['type']==1){
					$keyword['kecontent'] = trim($_POST['kecontent']);
				}else{
					$keyword['linkinfo']  = serialize($linkinfo);
					$keyword['titles']    = serialize($titles);
					$keyword['imageinfo'] = serialize($imageinfo);
				}
				    $keyword['ismess'] = 1;
				     $keyword['user_id'] = $userid;	
				     $keyword['token'] = $find_data['token'];	
					if($model_keyword->add($keyword))
					{
						echo "1";
					}else 
					{
						echo "0";
					}
			}else{
				if($keyword['type']==1){
					$keyword['linkinfo']  = NULL;
					$keyword['titles']    = NULL;
					$keyword['imageinfo'] = NULL;
					$keyword['kecontent'] = trim($_POST['kecontent']);
				}else{
					$keyword['kecontent'] = NULL;
					$keyword['linkinfo']  = serialize($linkinfo);
					$keyword['titles']    = serialize($titles);
					$keyword['imageinfo'] = serialize($imageinfo);
				}
				$keyword['user_id'] = $userid;
				$keyword['token'] = $find_data['token'];
				
				if($model_keyword->edit("user_id=".$userid." AND ismess =1",$keyword)!==false)
    			{
    				echo "1";
    			}else
    			{
    				echo "0";
    			}
				
			}
    	}
    }
    
    /**
     * 显示自动回复
     *
     */
     function showfollow()
     {
     	$userid=$this->visitor->get('user_id');
     	$model_keyword=& m('keyword');
    	$keyinfo = $model_keyword->get("user_id =".$userid." AND isfollow=1");
    	if(!empty($keyinfo)){
    		if($keyinfo['type']==2)
    		{
    			$keyinfo['titles2']=unserialize($keyinfo['titles']);
    			$keyinfo['imageinfo2']=unserialize($keyinfo['imageinfo']);
    			$keyinfo['linkinfo2']=unserialize($keyinfo['linkinfo']);
    		} 
  
    		echo json_encode($keyinfo);
    	}else{
    		echo json_encode($keyinfo);
    	}
     }
    /**
     * 显示自动回复
     *
     */
     function showmess()
     {
     	$userid=$this->visitor->get('user_id');
     	$model_keyword=& m('keyword');
    	$keyinfo = $model_keyword->get("user_id =".$userid." AND ismess=1");
    	if(!empty($keyinfo)){
    		if($keyinfo['type']==2)
    		{
    			$keyinfo['titles2']=unserialize($keyinfo['titles']);
    			$keyinfo['imageinfo2']=unserialize($keyinfo['imageinfo']);
    			$keyinfo['linkinfo2']=unserialize($keyinfo['linkinfo']);
    		} 
    		echo json_encode($keyinfo);
    	}else{
    		echo json_encode($keyinfo);
    	}
     }
     
     
    
    /**
     * 关键词自动回复
     *
     */
    function keyword_index()
    {
    	$userid=$this->visitor->get('user_id');
    	$model_wechat=& m('wechat');
    	$find_data = $model_wechat->get("user_id =".$userid);
    	$model_keyword=& m('keyword');
    	if(empty($find_data))
    	{
        $this->show_warning('请先设置微信接口！','马上去设置','index.php?app=wechat');return ;
    	}
    	
    		$op = $_GET['op'];
    		if(!empty($op)){
    			$keyword = array();
    			$keyword['kename']    = trim($_POST['kename']);
    			$keyword['kyword']    = trim($_POST['keword']);
    			$keyword['type']      = intval($_POST['ketype']);
    		
    			$linkinfo=explode(",",substr($_POST['linkinfo'], 0, -1));
    			$titles=explode(",",substr($_POST['titles'], 0, -1));
    			$imageinfo=explode(",",substr($_POST['imageinfo'], 0, -1));
    			
    			if($op == 'add') {
    				if($keyword['type']==1){
    					$keyword['kecontent'] = trim($_POST['kecontent']);
    					$keyword['linkinfo']  = '';
    					$keyword['titles']    = '';
    					$keyword['imageinfo'] = '';
    				}else{
    					$keyword['kecontent'] ='';
    					$keyword['linkinfo']  = serialize($linkinfo);
    					$keyword['titles']    = serialize($titles);
    					$keyword['imageinfo'] = serialize($imageinfo);
    				}
    				 $keyword['iskey'] = 1;
				     $keyword['user_id'] = $userid;	
				     $keyword['token'] = $find_data['token'];	
					if($model_keyword->add($keyword))
					{
						echo "1";
					}else 
					{
						echo "0";
					}
    			}

    			if($op=='update'){
    				$kid = trim($_POST['kid']);
    				if($keyword['type']==1){
    					$keyword['kecontent'] = trim($_POST['kecontent']);
    				}else{
    					$keyword['linkinfo']  = serialize($linkinfo);
    					$keyword['titles']    = serialize($titles);
    					$keyword['imageinfo'] = serialize($imageinfo);
    				}
    				if($model_keyword->edit("kid=".$kid." AND iskey =1 AND user_id=".$userid,$keyword))
    				{
    					echo "1";
    				}else 
    				{
    					echo "0";
    				}
    			}
    			if($op=='del'){
    				$kid = trim($_POST['kid']);
    				if($model_keyword->drop("kid=".$kid." AND user_id=".$userid." AND iskey=1",$kid))
    				{
    					echo "1";
    				}else 
    				{
    					echo "0";
    				}
    			}
    		}else
    		{  
    
    	  $keyinfo = $model_keyword->find(array(
                'conditions' => "user_id =".$userid." AND iskey=1",
                'order'=>'kid desc',
                ));
    	 $this->assign('keyinfo',$keyinfo);
    	
    	$this->_curlocal('微信管理',url('app=wechat&act=keyword_index'),'关键词自动回复');
    	/* 当前用户中心菜单 */
    	$this->_curitem('keyword_index');
    	$this->_config_seo('title', '关键词自动回复');
    	$this->display('keyword.index.html');
    		}
    }
    /**
     * *
     *关键词 AJAX
     */
    function addkeyword_ajax()
    {
    	$kid = $_GET['kid'];
    	$userid=$this->visitor->get('user_id');
    	$model_keyword=& m('keyword');
    	$keyinfo = $model_keyword->get("iskey=1 AND kid=".$kid." AND user_id=".$userid);
    	if(!empty($keyinfo)){
    		if($keyinfo['type']==2)
    		{
    			$keyinfo['titles2']=unserialize($keyinfo['titles']);
    			$keyinfo['imageinfo2']=unserialize($keyinfo['imageinfo']);
    			$keyinfo['linkinfo2']=unserialize($keyinfo['linkinfo']);
    			echo json_encode($keyinfo);
    		}else{
    			echo json_encode($keyinfo);
    		}
    	}
    }
    
    /**
     * 消息自动回复
     *
     */
    function message_index()
    {
    	$userid=$this->visitor->get('user_id');
    	$model_wechat=& m('wechat');
    	$find_data = $model_wechat->get("user_id =".$userid);
    	if(empty($find_data))
    	{
        $this->show_warning('请先设置微信接口！','马上去设置','index.php?app=wechat');return ;
    	}
    	
    	
    	
    	$this->_curlocal('微信管理',url('app=wechat&act=message_index'),'消息自动回复');
    	/* 当前用户中心菜单 */
    	$this->_curitem('message_index');
    	$this->_config_seo('title', '消息自动回复');
    	$this->display('message.index.html');
    }
    
   


    
}

?>
