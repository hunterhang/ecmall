<?php

/**
 *    Desc
 *用户赚钱系统
 *    @author    Garbin
 *    @usage    none
 */
class Make_moneyApp extends StoreadminbaseApp
{
    function __construct()
    {
        $this->Make_moneyApp();
    }
    function Make_moneyApp()
    {
        parent::__construct();
    }
    function index()
    {
    	
    	$data_member=& m('member')->get(
         array(
          'conditions' => "user_id=".$this->visitor->get('user_id'),
          'fields'=>'jifen',
         )	
    	);
    	$this->assign('info',$data_member);
    	$this->assign('user_id',dechex($this->visitor->get('user_id')));
    	$this->_curlocal(LANG::get('member_center'),url('app=member'),'赚钱系统');
    	 /* 当前所处子菜单 */
        $this->_curmenu('make_money');
    	/* 当前用户中心菜单 */
    	$this->_curitem('make_money');
    	
    	$this->_config_seo('title', '充值管理');
    	$this->display('make_money.index.html');
    }
    function tuijian_friend()//推荐好友
    {
    	
    	$model_member=& m('member');
    	$data_tuijian= $model_member->find(
         array(
          'conditions' => "tuijian_id=".$this->visitor->get('user_id'),
          'order'=>"user_id  desc",
          'fields'=>'user_id,user_name,reg_time'
         )	
    	);
    
   	$this->assign('data_friend',$data_tuijian);
    	$this->_curlocal(LANG::get('member_center'),url('app=member'),'赚钱系统');
    	 /* 当前所处子菜单 */
        $this->_curmenu('tuijian_friend');
    	/* 当前用户中心菜单 */
    	$this->_curitem('make_money');
    	
    	$this->_config_seo('title', '充值管理');
    	$this->display('tuijian_friend.index.html');
    }
     function record_log()//好友充值
    {
    
    	$tuijian_log=& m('tuijian_log');
    	  $result = $tuijian_log->find(array('conditions' => 'tuijian_id='.$this->visitor->get('user_id'),
                        ));
           $this->assign('tuijian_logs',$result); 
                
    	$this->_curlocal(LANG::get('member_center'),url('app=member'),'赚钱系统');
    	 /* 当前所处子菜单 */
        $this->_curmenu('record_log');
    	/* 当前用户中心菜单 */
    	$this->_curitem('make_money');
    	
    	$this->_config_seo('title', '充值管理');
    	$this->display('record_log.index.html');
    }
    

}

?>
