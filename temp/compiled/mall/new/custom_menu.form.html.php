<script type="text/javascript">
$(function(){
    $('#category_form').validate({

        errorLabelContainer: $('#warning'),
        invalidHandler: function(form, validator) {
               $('#warning').show();
        },
        onfocusout : false,
        onkeyup    : false,
        rules : {
            cate_name : {
                required : true
              
            },
            sort_order : {
                number   : true
            }
        },
        messages : {
            cate_name : {
                required : '分类名称不能为空'

            },
            sort_order  : {
                number   : '排序仅能为数字'
            }
        }
    });
});
</script>

<script>
$(function(){
	if($("input[type=radio][checked]").val()==0)
	{
		$('#key_value').html('KEY值:');
		$('#zhuce').html('用字母或数字组成。');
	}
	else if($("input[type=radio][checked]").val()==1)
	{
		
		$('#key_value').html('url链接:');
		$('#zhuce').html('请填写您的链接');
	}
	else if($("input[type=radio][checked]").val()==2)
	{
		
		$('#key_value').html('QQ客服:');
		//$('#zhuce').html('请填写您的QQ号码');
	}
})
function get_value(key)
{
	if(key==0)
	{
		$('#key_value').html('KEY值:');
		$('#zhuce').html('用字母或数字组成。');
		
	}else if(key==1)
	{
		$('#key_value').html('url链接:');
		$('#zhuce').html('请填写您的链接');
	}else if(key==2)
	{
		$('#key_value').html('QQ客服:');
		$('#zhuce').html('请填写您的QQ号码');
	}
}
</script>
<ul class="tab">
    <li class="active"><?php if ($_GET['act'] == add): ?>添加分类<?php else: ?>编辑<?php endif; ?></li>
</ul>
<div class="eject_con">
	<div class="tan_btn">
    	<a href="/themes/mall/new/menus.htm" target="_blank">自定义菜单使用教程</a><a target="_blank" href="http://pan.baidu.com/s/1eQHvA4U">在线QQ客服教程</a>
    </div>
 <div class="adds">
        <div id="warning"></div>
        <form id="category_form" method="post" target="pop_warning" action="index.php?app=custom_menu&amp;act=<?php echo $_GET['act']; ?><?php if ($_GET['id']): ?>&amp;id=<?php echo $_GET['id']; ?><?php endif; ?>">
        <ul>
            <li>
                <h3>分类名称:</h3>
                <p><input class="text width_normal" type="text" name="cate_name" id="cate_name" value="<?php echo htmlspecialchars($this->_var['gcategory']['cate_name']); ?>" /><label class="field_notice"></label></p>
            </li>
            <li>
                <h3>分类上级:</h3>
                <p><select name="parent_id" id="parent_id">
                <option>请选择...</option>
                <?php echo $this->html_options(array('options'=>$this->_var['parents'],'selected'=>$this->_var['gcategory']['parent_id'])); ?>
                </select></p>
            </li>
            <li>
                <h3>类型:</h3>
                <p>
                 关键词类型: <input  onclick="get_value(0);"  <?php if ($this->_var['gcategory']['type'] == 0): ?> checked <?php endif; ?> type="radio" value="0" name="type">&nbsp;&nbsp;
                  链接类型:<input  onclick="get_value(1);" <?php if ($this->_var['gcategory']['type'] == 1): ?>checked <?php endif; ?>   value="1" type="radio" name="type" >&nbsp;&nbsp;
                   <!--QQ客服:<input  onclick="get_value(2);" value="2" type="radio" name="type" >-->
                  <br>
                 <b style="color:red;">如果选择链接类型：关键词不用填,key值直接填链接</b>
                </p>
            </li>
            <li>
                <h3 id='key_value'>KEY值:</h3>
                <p><input type="text" name="keyvalue" value="<?php echo $this->_var['gcategory']['keyvalue']; ?>" style="width:176px;"  class="text "/><font style="color:red;" id='zhuce'>用字母或数字组成</font></p>
            </li>
           <li>
                <h3>关键词:</h3>
                <p><input type="text" name="keyword" value="<?php echo $this->_var['gcategory']['keyword']; ?>"  style="width:176px;"  class="text "/></p>
            </li>
            
            
            <li>
                <h3>排序:</h3>
                <p><input type="text" name="sort_order" value="<?php echo $this->_var['gcategory']['sort_order']; ?>"  class="text width_short"/></p>
            </li>
            <li>
                <h3>显示:</h3>
                <p><label>
                 <input type="radio" name="if_show" value="1" <?php if ($this->_var['gcategory']['if_show']): ?>checked="checked"<?php endif; ?> />
                是</label>
                <label>
                <input type="radio" name="if_show" value="0" <?php if (! $this->_var['gcategory']['if_show']): ?>checked="checked"<?php endif; ?> />
                否</label></p>
            </li>
        </ul>
        <div class="submit"><input type="submit" class="btn" value="提交" /></div>
        </form>
    </div>
</div>