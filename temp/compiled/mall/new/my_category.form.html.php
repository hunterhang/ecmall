<script type="text/javascript">
$(function(){
    $('#category_form').validate({
/*        errorPlacement: function(error, element){
            var _message_box = $(element).parent().parent().parent().parent().find('#warning');
            _message_box.find('#warning_info').hide();
            _message_box.append(error);
        },
        success       : function(label){
            label.addClass('validate_right').text('OK!');
        },*/
        errorLabelContainer: $('#warning'),
        invalidHandler: function(form, validator) {
           /*var errors = validator.numberOfInvalids();
           if(errors)
           {*/
               $('#warning').show();
           /*}
           else
           {
               $('#warning').hide();
           }*/
        },
        onfocusout : false,
        onkeyup    : false,
        rules : {
            cate_name : {
                required : true,
                remote   : {
                url :'index.php?app=my_category&act=check_category',
                type:'get',
                data:{
                    cate_name : function(){
                        return $('#cate_name').val();
                    },
                    parent_id : function() {
                        return $('#parent_id').val();
                    },
                    id : '<?php echo $this->_var['gcategory']['cate_id']; ?>'
                  }
                }
            },
            sort_order : {
                number   : true
            },
            cate_images   : {
               accept   : 'png|jpe?g|gif'
                }
        },
        messages : {
            cate_name : {
                remote   : '该分类名称已存在，请您重新输入。',
                required : '分类名称不能为空。'

            },
            sort_order  : {
                number   : '此项仅能为数字。'
            },
            cate_images  : {
              accept : '请上传格式为 jpg,jpeg,png,gif 的文件'
             }
        }
    });
});
</script>


<ul class="tab">
    <li class="active"><?php if ($_GET['act'] == add): ?>新增分类<?php else: ?>编辑<?php endif; ?></li>
</ul>
<div class="eject_con">
 <div class="adds">
        <div id="warning"></div>
        <form id="category_form" method="post"  enctype="multipart/form-data"  target="pop_warning" action="index.php?app=my_category&amp;act=<?php echo $_GET['act']; ?><?php if ($_GET['id']): ?>&amp;id=<?php echo $_GET['id']; ?><?php endif; ?>">
        <ul style="width:100%;">
            <li style="width:100%;">
                <h3>分类名称:</h3>
                <p><input class="text width_normal" type="text" name="cate_name" id="cate_name" value="<?php echo htmlspecialchars($this->_var['gcategory']['cate_name']); ?>" /><label class="field_notice"></label></p>
            </li>
            <li style="width:100%;">
                <h3>上级分类:</h3>
                <p><select name="parent_id" id="parent_id">
                <option>请选择...</option>
                <?php echo $this->html_options(array('options'=>$this->_var['parents'],'selected'=>$this->_var['gcategory']['parent_id'])); ?>
                </select></p>
            </li>
          <!--  <li style="width:100%;">
            <h3>栏目图片链接:</h3>
            <p><input type="text" style="width:350px;" name="cate_images" id="cate_images" value="<?php echo $this->_var['gcategory']['cate_images']; ?>" />图片尺寸120*120</p>
            </li>-->
              <li style="width:100%;">
            <h3>栏目图片:</h3>
            <p>  <?php if ($this->_var['gcategory']['cate_images'] != ''): ?><img style="width:50px;height:50px;" src="<?php echo $this->_var['gcategory']['cate_images']; ?>"><?php endif; ?>
            <input style="width:132px;" name="cate_images" type="file" size="1" maxlength="0" hidefocus="true" ectype=""  /><label class="field_notice">图片尺寸120*120,大小不要超过100kb,不上传使用默认</label></p>
            </li>
            <input type="hidden" name='cate_images_value' value="<?php echo $this->_var['gcategory']['cate_images']; ?>" >
            <li style="width:100%;">
                <h3>排序:</h3>
                <p><input type="text" name="sort_order" value="<?php echo $this->_var['gcategory']['sort_order']; ?>"  class="text width_short"/></p>
            </li>
            <li style="width:100%;">
                <h3>显示:</h3>
                <p><label>
                 <input type="radio" name="if_show" value="1" <?php if ($this->_var['gcategory']['if_show']): ?>checked="checked"<?php endif; ?> />
                是</label>
                <label>
                <input type="radio" name="if_show" value="0" <?php if (! $this->_var['gcategory']['if_show']): ?>checked="checked"<?php endif; ?> />
                否</label></p>
            </li>
            <script>
            $(function(){
            	   $('input[ectype="type"]').change(function(){
            	   	if($(this).val()==1)
            	   	{
            	   		$('#check_article').hide();
            	   		$('#check_article2').hide();
            	   	}else if($(this).val()==2)
            	   	{
            	   		$('#check_article').show();
            	   		$('#check_article2').show();
            	   	}
            	   });
            	   
            	   var type="<?php echo $this->_var['gcategory']['article_link']; ?>";
            	  if(type!='')
            	  {
            	  	$('#check_article').show();
            	   		$('#check_article2').show();
            	  }
            	  
            	   
            })
            </script>
            <li style="width:100%;" >
            <h3>选择类型:</h3>
            <p><input type="radio" checked ectype='type' name="type" value="1">商品类型<input  <?php if ($this->_var['gcategory']['article_link']): ?>checked="checked"<?php endif; ?>ectype='type' type="radio" name="type" value="2" >文章类型</p>
            </li>
              <li id="check_article" style="width:100%;display:none;">
               <h3>文章链接:</h3>
              <!-- <p> <input type="text" name="article_link" style="width:450px;"  value="<?php echo $this->_var['gcategory']['article_link']; ?>"></p>-->
               <p>
               <select name="article_link">
               <option value="">--请选择文章--</option>
                 <?php $_from = $this->_var['navigations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'navigation');if (count($_from)):
    foreach ($_from AS $this->_var['navigation']):
?>
                 <option <?php if ($this->_var['gcategory']['article_id'] == $this->_var['navigation'] [ 'article_id' ]): ?>selected <?php endif; ?> value="<?php echo $this->_var['navigation']['article_id']; ?>"><?php echo $this->_var['navigation']['title']; ?></option>
                   <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
               </select>
               <a style='width:78px;height:24px; line-height:24px;display:block;text-align:center;float:right;margin-left:10px;background:url("themes/mall/default/styles/default/images/member/btn.gif") no-repeat scroll 0 -590px rgba(0, 0, 0, 0)' target="_blank" href="<?php echo url('app=my_navigation'); ?>">去添加文章</a>
               </p>
            </li>
            <li id='check_article2' style="width:580px;display:none;">
            <p style="color:red;width:580px;">根据实际情况选择,如果选择了的话，在店铺首页点击该栏目会跳转到此文章链接,只支持第一级栏目,不支持第二级栏目(子栏目)</p>
            </li>
            <?php if ($_GET['act'] == edit): ?>
              <li style="width:100%;">
               <h3>分类链接:</h3>
               <p> <input style="width:450px;"  readonly value="<?php echo $this->_var['site_url']; ?>/index.php?app=store&id=<?php echo $this->_var['gcategory']['store_id']; ?>&act=search&cate_id=<?php echo $this->_var['gcategory']['cate_id']; ?>&wx_store_id=<?php echo $this->_var['gcategory']['store_id']; ?>"></p>
            </li>
            <li>
            <p style="color:red;">分类链接主要是方便用户在微信内推广专用</p>
            </li>
          <?php endif; ?>
          
        </ul>
        <div class="submit"><input type="submit" class="btn" value="提交" /></div>
        </form>
    </div>
</div>