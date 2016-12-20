<?php

/* 用户提现控制器 */
class IndentApp extends BackendApp
{

	function __construct()
	{
		$this->IndentApp();
	}

	function IndentApp()
	{
		parent::BackendApp();
		$this->_indent_mod=& m('indent');
	}

	/* 管理 */
	function index()
	{

		$conditions = $this->_get_query_conditions(array(array(
		'field' =>'user_name',      
		'equal' => 'LIKE',
		'name'  => 'user_name',
		),array(
		'field' => 'status',
		'equal' => '=',
		'type'  => 'numeric',
		)
		));
		$page = $this->_get_page(10);
		$indent = $this->_indent_mod->find(array(
		'conditions' => '1=1' . $conditions,
		'limit' => $page['limit'],
		'order' => "id desc",
		'count' => true,
		));
		$this->import_resource(array(
		'script' => 'jqtreetable.js,inline_edit.js',
		'style'  => 'res:style/jqtreetable.css'
		));
		$page['item_count'] = $this->_indent_mod->getCount();
		$this->_format_page($page);
		 $this->assign('filtered', $conditions? 1 : 0); //是否有查询条件
		$this->assign('page_info', $page);
		$this->assign('indents', $indent);
		$this->assign('status_options', array(
		''   => '请选择',
		'0'   => '未支付',
		'1' => '待审核',
		'2'     =>'支付成功',
		));
		$this->display('indent.index.html');
	}
	 function drop()
	{
		$id = isset($_GET['id']) ? trim($_GET['id']) : '';
		if (!$id)
		{
			$this->show_warning('操作失败！充值记录不存在!');
			return;
		}
		 $ids = explode(',', $id);
		 if (!$this->_indent_mod->drop($ids))
		  {
            $this->show_warning($ms->user->get_error());
            return;
        }
            $this->show_message('删除成功!');
		    
	}
	function sent()//已付款，待确认
	{
		if(empty($_GET['id'])||empty($_GET['user_id']))
		{
			$this->show_warning('操作失败！!');return ;
		}
		$datas['status']=2;
		if($this->_indent_mod->edit("id=".$_GET['id']." AND user_id=".$_GET['user_id'],$datas))
		{
			$this->show_message('操作成功!');return ;
		}else 
		{
			$this->show_message('操作失败!');return ;
		}
		
	}
	
	function sents()//未付款，手工通过
	{
		if(empty($_GET['id'])||empty($_GET['user_id']))
		{
			$this->show_warning('操作失败！!');return ;
		}
		$datas['status']=2;
		if($this->_indent_mod->edit("id=".$_GET['id']." AND user_id=".$_GET['user_id'],$datas))
		{
			$back=& m('member')->edit('user_id='.$_GET['user_id'],'money=money+'.$_GET['money']);
			$data_member=& m('member')->get("user_id =".$_GET['user_id']);
			if(!empty($data_member['tuijian_id']))
		   {
			$back=& m('member')->edit("user_id=".$data_member['tuijian_id'],'jifen =jifen + '.$_GET['money']*0.25);	
			$model_tuijian_log=& m('tuijian_log')->add(array('user_id'=>$_GET['user_id'],
			             'user_name'=>$data_member['user_name'],
						'tuijian_id'=>$data_member['tuijian_id'],
						'price'=>$_GET['money'],
						'jifen'=>$_GET['money']*0.25,
						'add_time'=>gmtime()	
						));		
		   }
			$this->show_message('操作成功!');return ;
		}else 
		{
			$this->show_message('操作失败!');return ;
		}
		
	}
	function friend_info()
	{
		
		$model_member=& m('member');
		$data_member=$model_member->find(array(
		'conditions' => 'tuijian_id='.$_GET['user_id'],
		'order' => "user_id desc",
		));
		$this->assign('friend_info',$data_member);
		$this->display('friend_info.index.html');
	}
	
	function alipay_info()
	{
		
		$model_tuijian_log=& m('tuijian_log');
		$data_tuijian_log=$model_tuijian_log->find(array(
		'conditions' => 'tuijian_id='.$_GET['user_id'],
		'order' => "id desc",
		));
		$this->assign('friend_log',$data_tuijian_log);
		$this->display('alipay_info.index.html');
	}
	function get_jifen()
	{
	
		if(IS_POST)
		{
			//$_POST['user_id'];
			//$_POST['jifen'];
			$back=& m('member')->edit('user_id='.$_POST['user_id'],array('jifen'=>$_POST['jifen']));
			if($back!==false)
			{
			$this->show_message('操作成功!');return ;
			}else 
			{
				$this->show_message('操作失败!');return ;
			}
		}
		if(empty($_GET['user_id']))
		{
			$this->show_message('非法操作!');return ;
		}
		$model_member=& m('member');
		$data_member=$model_member->get(array(
		'conditions' => 'user_id='.$_GET['user_id'],
		'fields' => "user_id,user_name,jifen",
		));
		$this->assign('info',$data_member);
		
		$this->display('get_jifen.index.html');
	}


}

?>