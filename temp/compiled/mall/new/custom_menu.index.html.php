<?php echo $this->fetch('member.header.html'); ?>
<link href="<?php echo $this->res_base . "/" . 'css/css.css'; ?>" type="text/css" rel="stylesheet" />
<script type="text/javascript">
//<!CDATA[
$(function()
{
    var map = <?php echo $this->_var['map']; ?>;
    var path = "<?php echo $this->res_base . "/" . 'images/'; ?>";
    if (map.length > 0)
    {
        var option = {openImg: path + "treetable/tv-collapsable.gif", shutImg: path + "treetable/tv-expandable.gif", leafImg: path + "treetable/tv-item.gif", lastOpenImg: path + "treetable/tv-collapsable-last.gif", lastShutImg: path + "treetable/tv-expandable-last.gif", lastLeafImg: path + "treetable/tv-item-last.gif", vertLineImg: path + "treetable/vertline.gif", blankImg: path + "treetable/blank.gif", collapse: false, column: 1, striped: false, highlight: false, state:false};
        $("#treet1").jqTreeTable(map, option);
    }
    var t = new EditableTable($('#my_category'));
});
//]]>
</script>
<style>
.borline td {padding:10px 0px;}
.ware_list th {text-align:left;}
.jcs{position: absolute;top:20px;right:20px;}
</style>

<div class="content">
    <?php echo $this->fetch('member.menu.html'); ?>
    <div id="right">
          
            <div class="wrap">
                <div class="public" style=" padding:30px 0;">
                <form method="post" enctype="multipart/form-data" id="profile_form">
                    <div class="information">
                        <div class="info individual">
                            <table>
                           <!-- <tr>
                            <th></th>
                           <!-- <td class="remind">
                            <td class="remind">-->
                            <!--<a href="http://pan.baidu.com/s/1mgDeAYs" target="_blank" style="right:199px;" class="jcs btn1"><span class="pic3">自定义菜单教程</span></a>
                               <a href="http://pan.baidu.com/s/1bnd5Jxd" target="_blank" class="jcs btn1"><span class="pic3">在线QQ客服教程</span></a>
                            </td>
                            </tr>-->
                                 <tr>
                                    <th style="text-align:right;">1:</th>
                                    <td><b style="color:red;">该功能只有服务号和认证订阅号才能使用。</b></td>
                                </tr>
                                <tr>
                                    <th style="text-align:right;">2:</th>
                                    <td>先填写微信AppId和微信AppSecret（这个2个值需要到微信公众平台获取）</td>
                                </tr>
                                <tr>
                                    <th style="text-align:right;">3:</th>
                                    <td>按钮数最多只能创建3个，子按钮数最多创建5个，否则创建失败!</td>
                                </tr>
                                <tr>
                                    <th style="text-align:right;">4:</th>
                                    <td>关键词需于《关键词自动回复》里的关键词对应,KEY值用字母或数字组成</td>
                                </tr>

                                <tr>
                                    <th style="text-align:right;"><font style="color:red;">*</font>微信AppId：</th>
                                    <td><input type="text" style="width:260px;" class="text width_normal" name="appid" value="<?php echo $this->_var['info']['appid']; ?>" /><a style="color:#85c401" target="_blank" href="/mall/help/help100.jpg">什么是AppId</a></td>
                                </tr>
                                 <tr>
                                    <th style="text-align:right;"><font style="color:red;">*</font>微信AppSecret：</th>
                                    <td><input type="text" style="width:260px;" class="text width_normal" name="appsecret" value="<?php echo $this->_var['info']['appsecret']; ?>" /><a style="color:#85c401" target="_blank" href="/mall/help/help100.jpg">什么是AppSecret</a></td>
                                </tr>
 
                                    <th></th>
                                    <td style="text-align:center;"><input type="submit" class="btn" value="保存修改" style="margin-top:20px;" /></td>
                                </tr>
                        </table>	
                        	<div class="clear"></div>
                            <div class="wrap" style=" margin-top:50px">
                                <div class="eject_btn_two eject_pos3" title="gcategory_add" style="left:20px;right:0;"><b class="ico3" ectype="dialog" style="color:#FFFFFF;"  dialog_title="gcategory_add" dialog_id="my_category_add" dialog_width="480" uri="index.php?app=custom_menu&amp;act=add">新增分类</b></div>
                                 <!--<div class="information eject_pos3"  style="left:190px;right:0;width:120px;"><div class="info"><a target="_blank" href="index.php?app=custom_menu&act=yulan"><input type="button" class="btn" value="效果预览" /></a></div></div>-->
                                 <!--<div class="information eject_pos3"  style="left:345px;right:0;width:120px;"><div class="info"><a target="_blank" href="/themes/mall/new/styles/default/images/menus.jpg"><input type="button" class="btn" value="自定义菜单示例图" /></a></div></div>-->
                            <div class="public table" style=" padding:30px 0;">
                                <table id="my_category" server="<?php echo $this->_var['site_url']; ?>/index.php?app=custom_menu&act=ajax_col">
                                    <?php if ($this->_var['gcategories']): ?>
                                    <tr class="line_bold" >
                                        <th class="width1"></th>
                                        <th class="align1" colspan="4">
                                           
                                        </th>
                                    </tr>
                                    <tr class="gray" ectype="table_header">
                                      <th></th>
                                        <th class="align1" coltype="editable" column="cate_name" checker="check_required" inputwidth="50%">分类名称</th>
                                        <th class="width15" style="width:40px; text-align:center;" coltype="editable" column="sort_order" checker="check_max" inputwidth="30px" style="text-align:center">排序</th>
                                        <th class="width15" style="width:40px; text-align:center;" coltype="switchable" column="if_show" checker="" onclass="right_ico" offclass="wrong_ico" style="text-align:center">显示</th>
                                        <th class="width3" style="text-align:center;">操作</th>
                                    </tr>
                                     <?php endif; ?>
                                 <?php if ($this->_var['gcategories']): ?>
                                <tbody id="treet1">
                                <?php endif; ?>
                                <?php $_from = $this->_var['gcategories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'gcategory');$this->_foreach['v'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['v']['total'] > 0):
    foreach ($_from AS $this->_var['gcategory']):
        $this->_foreach['v']['iteration']++;
?>
                                <tr class="line<?php if (($this->_foreach['v']['iteration'] == $this->_foreach['v']['total'])): ?> last_line<?php endif; ?>" ectype="table_item" idvalue="<?php echo $this->_var['gcategory']['cate_id']; ?>">
                                    <td class="align2"><input type="checkbox" class="checkitem" value="<?php echo $this->_var['gcategory']['cate_id']; ?>" /></td>
                                    <td class="width7" style="width:245px;">&nbsp;&nbsp;<span ectype="editobj"><?php echo htmlspecialchars($this->_var['gcategory']['cate_name']); ?></span></td>
                                    <td class="align2"><span ectype="editobj"><?php echo $this->_var['gcategory']['sort_order']; ?></span></td>
                                    <td>
                                        <p class="padding2"><span <?php if ($this->_var['gcategory']['if_show']): ?>class="right_ico" status="on"<?php else: ?>class="wrong_ico" status="off"<?php endif; ?>ectype="editobj"></span></p>
                                        </td>
                                    <td class="">
                                        <?php if ($this->_var['gcategory']['layer'] < 2): ?>
                                         <a href="javascript:void(0);" ectype="dialog" dialog_width="500" dialog_title="add_child" dialog_id="my_category_add" uri="index.php?app=custom_menu&amp;act=add&amp;pid=<?php echo $this->_var['gcategory']['cate_id']; ?>" class="add1_ico">新增下级</a>
                                        <?php endif; ?>
                                        <a href="javascript:void(0);" ectype="dialog" dialog_width="480" dialog_title="编辑" dialog_id="my_category_edit" uri="index.php?app=custom_menu&amp;act=edit&amp;id=<?php echo $this->_var['gcategory']['cate_id']; ?>" class="edit1">编辑</a>  <a href="javascript:drop_confirm('删除该分类将会同时删除该分类的所有下级分类，您确定要删除吗', 'index.php?app=custom_menu&amp;act=drop&id=<?php echo $this->_var['gcategory']['cate_id']; ?>');" class="delete">删除</a>
                
                                        </td>
                                </tr>
                                <?php endforeach; else: ?>
                                <tr class="line_bold" >
                                        <th class="width1"></th>
                                        <th class="align1" colspan="4">
                                           
                                        </th>
                                    </tr>
                                    <tr class="gray" ectype="table_header">
                                        <th></th>
                                        <th class="align1" coltype="editable" column="cate_name" checker="check_required" inputwidth="50%">分类名称</th>
                                        <th class="width15" style="width:40px; text-align:center;" coltype="editable" column="sort_order" checker="check_max" inputwidth="30px">排序</th>
                                        <th class="width15" style="width:40px; text-align:center;" coltype="switchable" column="if_show" checker="" onclass="right_ico" offclass="wrong_ico">显示</th>
                                        <th class="width3">操作</th>
                                    </tr>
                                <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                <?php if ($this->_var['gcategories']): ?>
                                </tbody>
                                <?php endif; ?>
                                <?php if ($this->_var['gcategories']): ?>
                                <tr class="line_bold line_bold_bottom">
                                    <td colspan="5">&nbsp;</td>
                                </tr>
                                <tr>
                                   
                                </tr>
                                <?php endif; ?>
                               
                                </table>
                            </div>         
                                <div class="information">
                                        <div class="info individual">
                                            <table>
                
                                                 <tr>
                                                    <td >
                                                    <a href="index.php?app=custom_menu&amp;act=creat_menu"  onclick="return confirm('是否生成自定义菜单？');" ><input type="button" class="btn" value="生成菜单" /></a>
                                                    <a href="index.php?app=custom_menu&amp;act=delete_menu"  onclick="return confirm('是否删除已有的自定义菜单？');" ><input type="button" class="btn" value="删除自定义菜单" style="margin-left:20px;" /></a>
                                                    
                                                    
                                                    </td>
                                                </tr>
                                                 <tr>
                                                	<td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                	<td style="color:#f00;">(如果菜单无法生成，或点击没反应，请换火狐，谷歌Chrome浏览器，360浏览器极速模式) </td>
                                                </tr>
                                                <tr>
                                                	<td style="color:#f00;">注：若有修改信息请重新生成菜单</td>
                                                </tr>
                                        </table>	
                                        </div>
                                    </div>   
                            <div class="wrap_bottom"></div>
                             </div>
                        </div>
                        <div class="indivr">
                        	<div class="phone">
                                <div  class="diy_menu">
                                    <ul>
                                        <li> 
                                            <a href="javascript:;"><img src="<?php echo $this->res_base . "/" . 'images/jianpan.jpg'; ?>" height="30" width="32"/></a>
                                        </li>
                                          <?php $_from = $this->_var['gcategories1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'gcategory1');$this->_foreach['v'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['v']['total'] > 0):
    foreach ($_from AS $this->_var['gcategory1']):
        $this->_foreach['v']['iteration']++;
?>
                                        <li>
                                            <a onclick="javascript:zsc_click(<?php echo $this->_var['gcategory1']['cate_id']; ?>)" class="menu_btn"><label><?php echo htmlspecialchars($this->_var['gcategory1']['cate_name']); ?></label></a>
                                      <?php if ($this->_var['gcategory1']['childen']): ?>
                                      
                                            <ul style="display:none" class="sub_menu2" id="sub_menu<?php echo $this->_var['gcategory1']['cate_id']; ?>">
                                            
                                                <div class="sub_menu_top"></div>
                                                  <?php $_from = $this->_var['gcategory1']['childen']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'child_gcategory1');$this->_foreach['v'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['v']['total'] > 0):
    foreach ($_from AS $this->_var['key'] => $this->_var['child_gcategory1']):
        $this->_foreach['v']['iteration']++;
?>
                                                <li><a href="javascript:;" <?php if ($this->_var['key'] == 0): ?>class="first"<?php endif; ?>><?php echo htmlspecialchars($this->_var['child_gcategory1']['cate_name']); ?></a></li>
                                                   <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                                <div class="sub_menu_bottom"></div>
                                            </ul>
                                       <?php endif; ?>
                                        </li>
                                         <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                     
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
                <div class="wrap_bottom"></div>
            </div>

             <iframe name="pop_warning" style="display:none"></iframe>
             
            <div class="clear"></div>
            <div class="adorn_right1"></div>
            <div class="adorn_right2"></div>
            <div class="adorn_right3"></div>
            <div class="adorn_right4"></div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php echo $this->fetch('footer.html'); ?>
<script>
var jilu=0;
function zsc_click(num){
	if(jilu!=0){
		if(jilu!=num){
			$('#sub_menu'+jilu).hide();	
		}
	}
	if(jilu==num){
		jilu=0;
	}else{
		jilu=num;
	}
	
	$('#sub_menu'+num).show();
}
</script>