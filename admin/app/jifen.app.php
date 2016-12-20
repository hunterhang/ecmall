<?php

/* 文章分类控制器 */
class JifenApp extends BackendApp
{

	function __construct()
	{
		$this->JifenApp();
	}

	function JifenApp()
	{
		parent::BackendApp();
		$this->_indent_mod=& m('indent');
		$this->_member_mod=& m('member');
		$this->_tuijian_log_mod=& m('tuijian_log');
	}

	/* 管理 */
	function index()
	{

		$conditions = $this->_get_query_conditions(array(array(
		'field' =>'user_name',      
		'equal' => 'LIKE',
		'name'  => 'user_name',)
		));
		$page = $this->_get_page(10);
		$indent = $this->_member_mod->find(array(
		'conditions' => '1=1' . $conditions,
		'limit' => $page['limit'],
		//'order' => "user desc",
		'count' => true,
		));
		$this->import_resource(array(
		'script' => 'jqtreetable.js,inline_edit.js',
		'style'  => 'res:style/jqtreetable.css'
		));
		$page['item_count'] = $this->_member_mod->getCount();
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
		$this->display('jifen.index.html');
	}
	 

}

?>