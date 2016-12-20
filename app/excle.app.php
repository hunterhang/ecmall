<?php

/**
 *    Desc
 *header("content-type:text/html;charset=utf-8");
 *    @author    Garbin
 *    @usage    none
 */
header("content-type:text/html;charset=utf-8");
header("Content-type: application/vnd.ms-excel;");
header("Content-Disposition: attachment;Filename=地区.xls");
class ExcleApp extends MemberbaseApp
{
	function __construct()
	{
		$this->ExcleApp();
	}
	function ExcleApp()
	{
		parent::__construct();
	}

	function index()
	{
		//$data_region=& m('region2')->find();
		//var_dump($data_region);exit;
		echo "<html>";
		echo '<meta http-equiv="Content-Type" content="text/html;charset=utf-8">';
		echo '<body>';
		echo '<table width="100%" border="1" align="center" cellspacing="1" cellpadding="1">';
		echo '<tr>';
		echo '<td nowrap>第一级</td>';
		echo '<td nowrap>第二级</td>';
		echo '<td nowrap>第三级</td>';
		echo '<td nowrap>第四级</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td nowrap>中国</td>';
		echo '<td nowrap></td>';
		echo '<td nowrap></td>';
		echo '<td nowrap></td>';
		echo '</tr>';
		$data_region=& m('region2')->find('region_type=1');
		foreach ($data_region as $key=>$value)
		{
			echo '<tr>';
			echo '<td nowrap></td>';
			echo '<td nowrap>'.$value['region_name'].'</td>';
			echo '<td nowrap></td>';
			echo '<td nowrap></td>';
			echo '</tr>';
			$data_region2=& m('region2')->find('parent_id='.$value['region_id']);
			foreach ($data_region2 as $key =>$value)
			{
				echo '<tr>';
				echo '<td nowrap></td>';
				echo '<td nowrap></td>';
				echo '<td nowrap>'.$value['region_name'].'</td>';
				echo '<td nowrap></td>';
				echo '</tr>';
				$data_region3=& m('region2')->find('parent_id='.$value['region_id']);
				foreach ($data_region3 as $key =>$value)
				{
					echo '<tr>';
					echo '<td nowrap></td>';
					echo '<td nowrap></td>';
					echo '<td nowrap></td>';
					echo '<td nowrap>'.$value['region_name'].'</td>';
					echo '</tr>';
				}
			}
		}
		echo '</table>';
		echo '</body>';
		echo '</html>';
	}



}

?>
