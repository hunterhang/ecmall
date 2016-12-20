<?php echo $this->fetch('member.header.html'); ?>
<style>
.information .info table{width :auto;}
.downs{position: absolute;right:-10px;top:-55px;}
.information .shop .btn1:hover{background:#3F89EC;color:#fff;}
</style>
<script type="text/javascript">
//<!CDATA[
$(function(){
        $('input[ectype="change_store_logo"]').change(function(){
      
            var src = getFullPath($(this)[0]);
            $('img[ectype="store_logo"]').attr('src', src);
            $('input[ectype="change_store_logo"]').removeAttr('name');
            $(this).attr('name', 'store_logo');
        });
        $('input[ectype="change_store_banner"]').change(function(){
            var src = getFullPath($(this)[0]);
            $('img[ectype="store_banner"]').attr('src', src);
            $('input[ectype="change_store_banner"]').removeAttr('name');
            $(this).attr('name', 'store_banner');
        });

        $('#my_store_form').validate({
            errorPlacement: function(error, element){
                $(element).next('.field_notice').hide();
                if($(element).parent().parent().is('b'))
                {
                    $(element).parent().parent('b').next('.explain').hide();
                    $(element).parent().parent('b').after(error);
                }
                else
                {
                    $(element).after(error);
                }
            },
            success       : function(label){
                if($(label).attr('for') != 'store_logo' && $(label).attr('for') != 'store_banner'  ){
                    label.addClass('validate_right').text('OK!');
                    }
            },
            rules : {
                store_name : {
                    required   : true,
                    remote : {
                        url  : 'index.php?app=apply&act=check_name&ajax=1',
                        type : 'get',
                        data : {
                            store_name : function(){
                                return $('#store_name').val();
                            },
                            store_id : <?php echo $this->_var['store']['store_id']; ?>
                        }
                    },
                    maxlength: 20
                },
                tel      : {
                    required     : true,
                    checkTel     : true
                },
                store_banner : {
                    accept   : 'png|jpe?g|gif'
                },
                store_logo   : {
                    accept   : 'png|jpe?g|gif'
                }
            },
            messages : {
                store_name  : {
                    required   : '此项不允许为空',
                    remote: '店铺名称已经存在，请换一个',
                    maxlength: '请控制在20个字以内'
                },
                tel      : {
                    required   : '此项不允许为空',
                    checkTel   : '电话号码由数字、加号、减号、空格、括号组成,并不能少于6位'
                },
                store_banner : {
                    accept  : '请上传格式为 jpg,jpeg,png,gif 的文件'
                },
                store_logo  : {
                    accept : '请上传格式为 jpg,jpeg,png,gif 的文件'
                }
            }
    });
   regionInit("region");
        $(".right").mouseover(function(){
            $(this).next("div").show();
        });
        $(".right").mouseout(function(){
            $(this).next("div").hide();
        });
});
function add_uploadedfile(file_data)
{

        $('#desc_images').append('<li file_name="'+ file_data.file_name +'" file_path="'+ file_data.file_path +'" ectype="handle_pic" file_id="'+ file_data.file_id +'"><input type="hidden" name="desc_file_id[]" value="'+ file_data.file_id +'"><div class="pic" style="z-index: 2;"><img src="<?php echo $this->_var['site_url']; ?>/'+ file_data.file_path +'" width="50" height="50" alt="'+ file_data.file_name +'" /></div><div ectype="handler" class="bg" style="z-index: 3;display:none"><img src="<?php echo $this->_var['site_url']; ?>/'+ file_data.file_path +'" width="50" height="50" alt="'+ file_data.file_name +'" /><p class="operation"><a href="javascript:void(0);" class="cut_in" ectype="insert_editor" ecm_title="插入编辑器"></a><span class="delete" ectype="drop_image" ecm_title="删除"></span></p><p class="name">'+ file_data.file_name +'</p></div></li>');
        trigger_uploader();
        if(EDITOR_SWFU.getStats().files_queued == 0){
                window.setTimeout(function(){
                        $('#editor_uploader').hide();
                },5000);
        }
}
function drop_image(file_id)
{
    if (confirm(lang.uploadedfile_drop_confirm))
        {
            var url = SITE_URL + '/index.php?app=my_store&act=drop_uploadedfile';
            $.getJSON(url, {'file_id':file_id}, function(data){
                if (data.done)
                {
                    $('*[file_id="' + file_id + '"]').remove();
                }
                else
                {
                    alert(data.msg);
                }
            });
        }
}

//]]>

</script>
<?php echo $this->_var['editor_upload']; ?>
<?php echo $this->_var['build_editor']; ?>
<div class="content">
  <div class="totline"></div>
  <div class="botline"></div>
  <?php echo $this->fetch('member.menu.html'); ?>
  <div id="right"> <?php echo $this->fetch('member.submenu.html'); ?>
    <div class="wrap remind">
    	<a href="#" target="_blank" class="btn1 downs"><span class="pic3">下载微商城教程</span></a>
        <div class="public">
            <div class="information">
       
            <form method="post" enctype="multipart/form-data" id="my_store_form">
                    <div class="setup">
                        <div class="photo relative1">
                            <p><img src="<?php if ($this->_var['store']['store_logo'] != ''): ?><?php echo $this->_var['store']['store_logo']; ?><?php else: ?>data/system/default_store_logo.gif<?php endif; ?>?rad=<?php echo $this->_var['radom']; ?>" width="120" height="120" ectype="store_logo" /></p>
                            <b class="ie6hack">
                                <span class="file1"><input name="store_logo" type="file" size="1" maxlength="0" hidefocus="true" ectype="change_store_logo" /></span>
                             
                                <div class="txt">更换店标</div>
                            </b>
                            <span class="explain">此处为您的店铺标志，将显示在店铺信息栏里建议<font style="color:red;">尺寸130*40像素,图片大小在20k以内</font></span>
                        </div>
                        <?php if ($this->_var['store']['store_code']): ?>
                         <div class="photo relative2">
                            <p><img src="<?php echo $this->_var['store']['store_code']; ?>?rad=<?php echo $this->_var['radom']; ?>" width="120" height="120" ectype="store_code" /></p>
                            <b style="height:0px;" class="ie6hack">
                                <div  class="txt">店铺二维码</div>
                            </b>
                        </div>
                        <?php else: ?>
                         <div class="photo relative2">
                            <p><img src=" /themes/store/default/styles/default/images/code.jpg?rad=<?php echo $this->_var['radom']; ?>" width="120" height="120" ectype="store_code" /></p>
                            <b style="height:0px;" class="ie6hack">
                                <div class="txt">店铺二维码</div>
                            </b>
                        </div>
                        <?php endif; ?>  
                          <div class="photo relative2">
                            <p><img src="<?php if ($this->_var['store']['store_new_images']): ?><?php echo $this->_var['store']['store_new_images']; ?><?php else: ?>/themes/store/default/styles/default/images/sort_icon1.png<?php endif; ?>?rad=<?php echo $this->_var['radom']; ?> " width="120" height="120"  /></p>
                            <b style="height:0px;" class="ie6hack">
                                <div class="txt">最新商品图标</div>
                            </b>
                        </div>
                         <div class="photo relative2">
                            <p><img src="<?php if ($this->_var['store']['store_recommend_images']): ?><?php echo $this->_var['store']['store_recommend_images']; ?><?php else: ?>/themes/store/default/styles/default/images/sort_icon2.png<?php endif; ?>?rad=<?php echo $this->_var['radom']; ?> " width="120" height="120"  /></p>
                            <b style="height:0px;" class="ie6hack">
                                <div class="txt">推荐商品图标</div>
                            </b>
                        </div>
                         <div class="photo relative2">
                            <p><img src="<?php if ($this->_var['store']['store_hot_images']): ?><?php echo $this->_var['store']['store_hot_images']; ?><?php else: ?>/themes/store/default/styles/default/images/sort_icon3.png<?php endif; ?>?rad=<?php echo $this->_var['radom']; ?> " width="120" height="120"  /></p>
                            <b style="height:0px;" class="ie6hack">
                                <div class="txt">热门商品图标</div>
                            </b>
                        </div>

                        <div class="clear"></div>
                    </div>
                    <div class="setup info shop">

                        <table style="width: 100%">
                            <?php if ($this->_var['subdomain_enable']): ?>
                            <tr>
                              <th>二级域名:</th>
                              <td><input type="text" name="domain" value="<?php echo htmlspecialchars($this->_var['store']['domain']); ?>"<?php if ($this->_var['store']['domain']): ?> disabled<?php endif; ?> class="text width11" />&nbsp;<?php if (! $this->_var['store']['domain']): ?>可留空,注意！设置后将不能修改，域名长度应为:<?php echo $this->_var['domain_length']; ?><?php else: ?><?php endif; ?></td>
                            </tr>
                            <?php endif; ?>
                              <tr>
                                <th class="width2">店铺首页链接:</th>
                                <td>
                                    <p class="td_block"><input style="width:400px;"  type="text" class="text width_normal" value="<?php echo $this->_var['site_url']; ?>/index.php?app=store&id=<?php echo $this->_var['store']['store_id']; ?>&wx_store_id=<?php echo $this->_var['store']['store_id']; ?>"/></p>
                                      <a href="<?php echo url('app=store&act=index_view&id=' . $this->_var['store']['store_id']. ''); ?>" target="_blank" class="btn1">首页预览</a>
                                </td>
                            </tr>
                           
                             <tr>
                                <th class="width2">最新商品链接:</th>
                                <td>
                                    <p class="td_block"><input style="width:400px;"  type="text" class="text width_normal" value="<?php echo $this->_var['site_url']; ?>/index.php?app=store&act=search&id=<?php echo $this->_var['store']['store_id']; ?>&order=add_time desc&wx_store_id=<?php echo $this->_var['store']['store_id']; ?>"/><label class="field_notice">此链接主要是方便用户在微信内推广专用</label></p>
                                   
                                </td>
                            </tr>
                             <tr>
                                <th class="width2">推荐商品链接:</th>
                                <td>
                                    <p class="td_block"><input style="width:400px;"  type="text" class="text width_normal" value="<?php echo $this->_var['site_url']; ?>/index.php?app=store&act=search&id=<?php echo $this->_var['store']['store_id']; ?>&recommended=1&wx_store_id=<?php echo $this->_var['store']['store_id']; ?>"/><label class="field_notice">此链接主要是方便用户在微信内推广专用</label></p>
                                    
                                </td>
                            </tr>
                              <tr>
                                <th class="width2">热门商品链接:</th>
                                <td>
                                    <p class="td_block"><input style="width:400px;"  type="text" class="text width_normal" value="<?php echo $this->_var['site_url']; ?>/index.php?app=store&act=search&id=<?php echo $this->_var['store']['store_id']; ?>&order=views desc&wx_store_id=<?php echo $this->_var['store']['store_id']; ?>"/><label class="field_notice">此链接主要是方便用户在微信内推广专用</label></p>
                                </td>
                            </tr>
                             <tr>
                                <th class="width2">店铺二维码:</th>
                                <td>
                                    <p class="td_block"><input style="width:330px;" id="store_code" type="text" class="text width_normal" name="store_code" value="<?php echo htmlspecialchars($this->_var['store']['store_code']); ?>"/><label class="field_notice">请输入店铺二维码链接,不填使用默认,图片尺寸280*280</label></p>
                                </td>
                            </tr>
                            
                              <tr>
                                <th class="width2">最新商品图标:</th>
                                <td>
                                    <p class="td_block"><input style="width:330px;" id="store_new_images" type="text" class="text width_normal" name="store_new_images" value="<?php echo htmlspecialchars($this->_var['store']['store_new_images']); ?>"/><label class="field_notice">请输入最新商品图标链接,不填使用默认,图片尺寸120*120</label></p>
                                </td>
                            </tr>
                              <tr>
                                <th class="width2">推荐商品图标:</th>
                                <td>
                                    <p class="td_block"><input style="width:330px;" id="store_recommend_images" type="text" class="text width_normal" name="store_recommend_images" value="<?php echo htmlspecialchars($this->_var['store']['store_recommend_images']); ?>"/><label class="field_notice">请输入推荐商品图标链接,不填使用默认,图片尺寸120*120</label></p>
                                </td>
                            </tr>
                              <tr>
                                <th class="width2">热门商品图标:</th>
                                <td>
                                    <p class="td_block"><input style="width:330px;" id="store_hot_images" type="text" class="text width_normal" name="store_hot_images" value="<?php echo htmlspecialchars($this->_var['store']['store_hot_images']); ?>"/><label class="field_notice">请输入热门商品图标链接,不填使用默认,图片尺寸120*120</label></p>
                                </td>
                            </tr>
                            
                            
                            <tr>
                                <th class="width2">店铺名称:</th>
                                <td>
                                    <p class="td_block"><input id="store_name" type="text" class="text width_normal" name="store_name" value="<?php echo htmlspecialchars($this->_var['store']['store_name']); ?>"/><label class="field_notice">店铺名称</label></p>
                                  <!--  <b class="padding1">*</b><a href="<?php echo url('app=store&id=' . $this->_var['store']['store_id']. ''); ?>" target="_blank" class="btn1">我的店铺首页</a>-->
                                </td>
                            </tr>
                            <tr>
                                <th>所在地区:</th>
                                <td><div id="region">
                                    <input type="hidden" name="region_id" value="<?php echo $this->_var['store']['region_id']; ?>" class="mls_id" />
                                    <input type="hidden" name="region_name" value="<?php echo htmlspecialchars($this->_var['store']['region_name']); ?>" class="mls_names" />
                                    <?php if ($this->_var['store']['store_id']): ?>
                                    <span><?php echo htmlspecialchars($this->_var['store']['region_name']); ?></span>
                                    <input type="button" value="编辑" class="edit_region" />
                                    <select style="display:none">
                                      <option>请选择...</option>
                                      <?php echo $this->html_options(array('options'=>$this->_var['regions'])); ?>
                                    </select>
                                    <?php else: ?>
                                    <select class="select">
                                      <option>请选择...</option>
                                      <?php echo $this->html_options(array('options'=>$this->_var['regions'])); ?>
                                    </select>
                                    <?php endif; ?></div>
                                </td>
                            </tr>
                            <tr>
                                <th>详细地址:</th>
                                <td>
                                    <p class="td_block"><input type="text" name="address" class="text width_normal" id="address" value="<?php echo htmlspecialchars($this->_var['store']['address']); ?>" /><span class="field_notice">不必重复填写所在地区</span></p>
                                </td>
                            </tr>
                            <tr>
                                <th>联系电话:</th>
                                <td><input name="tel" type="text" class="text width_normal" id="tel" value="<?php echo htmlspecialchars($this->_var['store']['tel']); ?>" /></td>
                            </tr>
                            <tr>
                                  <th>联系QQ:</th>
                                  <td><input name="im_qq" type="text" class="text width_normal" id="im_qq" value="<?php echo htmlspecialchars($this->_var['store']['im_qq']); ?>" /></td>
                            </tr>
                            <tr>
                                  <th>阿里旺旺:</th>
                                  <td><input name="im_ww" type="text" class="text width_normal" id="im_ww" value="<?php echo htmlspecialchars($this->_var['store']['im_ww']); ?>" /></td>
                            </tr>
                           <!-- <tr>
                                  <th>MSN在线通:</th>
                                  <td><?php if ($this->_var['store']['im_msn']): ?><?php echo htmlspecialchars($this->_var['store']['im_msn']); ?> <a target="_blank" href="<?php echo url('app=my_store&act=drop_im_msn'); ?>">注销</a><?php else: ?><a target="_blank" href="<?php echo $this->_var['msn_active_url']; ?>">激活我的msn账号</a><span class="padding1">激活后将显示在店铺信息栏里</span><?php endif; ?></td>
                             </tr>
                             <?php if ($this->_var['store']['functions']['groupbuy']): ?>
							 <tr>
                                  <th>开启团购:</th>
                                  <td>
								      <input id="enable_groupbuy_0" type="radio" name="enable_groupbuy" <?php if (! $this->_var['store']['enable_groupbuy']): ?>checked<?php endif; ?> value="0" />
                                      <label for="enable_groupbuy_0">否</label>
                                      <input id="enable_groupbuy_1" type="radio" name="enable_groupbuy" <?php if ($this->_var['store']['enable_groupbuy']): ?>checked<?php endif; ?> value="1" />
                                      <label for="enable_groupbuy_1">是</label>
                                  </td>
                             </tr>
                             <?php endif; ?>-->
                             <?php if ($this->_var['store']['functions']['enable_radar']): ?>
                             
                             <tr>
                                  <th>启用全网比价:</th>
                                  <td><label>
					                 <input type="radio" name="enable_radar" value="1" <?php if ($this->_var['store']['enable_radar']): ?>checked="checked"<?php endif; ?> />
					                是</label>
					                <label>
					                <input type="radio" name="enable_radar" value="0" <?php if (! $this->_var['store']['enable_radar']): ?>checked="checked"<?php endif; ?> />
					                否</label></td>
                             </tr>
                             
                             <?php endif; ?>
                             <tr>
                                <th class="align3">店铺简介:</th>
                                <td><div class="editor"><div>
                                    <textarea name="description" id="description" style="width:100%; height:350px;"><?php echo htmlspecialchars($this->_var['store']['description']); ?></textarea></div>
                                   <div style=" position: relative; top: 10px; z-index: 5;"><a class="btn3" id="open_editor_uploader">上传图片</a>
                                   <div class="upload_con" id="editor_uploader" style="display:none">
                                            <div class="upload_con_top"></div>
                                            <div class="upload_wrap">
                                                <ul>
                                                    <li>
                                                        <div id="divSwfuploadContainer">
                                                            <div id="divButtonContainer">
                                                                <span id="editor_upload_button"></span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li><iframe src="index.php?app=comupload&act=view_iframe&id=<?php echo $this->_var['id']; ?>&belong=<?php echo $this->_var['belong']; ?>&instance=desc_image" width="86" height="30" scrolling="no" frameborder="0"></iframe></li>
                                                    <li id="open_editor_remote" class="btn4">远程地址</li>
                                                </ul>
                                                <div id="editor_remote" class="upload_file" style="display:none">
                                                <iframe src="index.php?app=comupload&act=view_remote&id=<?php echo $this->_var['id']; ?>&belong=<?php echo $this->_var['belong']; ?>&instance=desc_image" width="272" height="39" scrolling="no" frameborder="0"></iframe>
                                                </div>
                                                <div id="editor_upload_progress"></div>
                                                <div class="upload_txt">
                                                    <span>支持JPEG和静态的GIF格式图片，不支持GIF动画图片，上传图片大小不能超过100KB.浏览文件时可以按住ctrl或shift键多选,<font style="color:red">如果上传错误,可能因为您的图片大小大于100KB,可以<a style="color:blue;" target="_blank" href="http://www.baidu.com/s?tn=monline_5_dg&ie=utf-8&bs=%E6%89%B9%E9%87%8F%E5%A4%84%E7%90%86%E5%B7%A5%E5%85%B7%E7%9A%84%E9%93%BE%E6%8E%A5&f=3&rsv_bp=1&rsv_spt=1&wd=%E5%9C%A8%E7%BA%BF%E6%89%B9%E9%87%8F%E5%A4%84%E7%90%86%E5%9B%BE%E7%89%87%E5%A4%A7%E5%B0%8F&rsv_sug3=9&rsv_sug1=9&rsv_sug4=234&oq=%E5%9C%A8%E7%BA%BF%E6%89%B9%E9%87%8F%E5%A4%84%E7%90%86&rsp=1&rsv_sug5=0&rsv_sug=0&rsv_sug2=0&inputT=6540">点击此处</a>进行图片批量处理</font></span>
                                                </div>

                                            </div>
                                            <div class="upload_con_bottom"></div>
                                        </div>
                                    </div>
                                    <ul id="desc_images" class="preview">
                                        <?php $_from = $this->_var['files_belong_store']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'file');if (count($_from)):
    foreach ($_from AS $this->_var['file']):
?>
                                        <li ectype="handle_pic" file_name="<?php echo htmlspecialchars($this->_var['file']['file_name']); ?>" file_path="<?php echo $this->_var['file']['file_path']; ?>" file_id="<?php echo $this->_var['file']['file_id']; ?>">
                                        <input type="hidden" name="file_id[]" value="<?php echo $this->_var['file']['file_id']; ?>">
                                            <div class="pic">
                                            <img src="<?php echo $this->_var['site_url']; ?>/<?php echo $this->_var['file']['file_path']; ?>" width="50" height="50" alt="<?php echo htmlspecialchars($this->_var['file']['file_name']); ?>" title="<?php echo htmlspecialchars($this->_var['file']['file_name']); ?>" /></div>
                                            <div ectype="handler" class="bg">
                                            <img src="<?php echo $this->_var['site_url']; ?>/<?php echo $this->_var['file']['file_path']; ?>" width="50" height="50" alt="<?php echo htmlspecialchars($this->_var['file']['file_name']); ?>" title="<?php echo htmlspecialchars($this->_var['file']['file_name']); ?>" />
                                                <p class="operation">
                                                    <a href="javascript:void(0);" class="cut_in" ectype="insert_editor" ecm_title="插入编辑器"></a>
                                                    <span class="delete" ectype="drop_image" ecm_title="删除"></span>
                                                </p>
                                                <p title="<?php echo htmlspecialchars($this->_var['file']['file_name']); ?>" class="name"><?php echo htmlspecialchars($this->_var['file']['file_name']); ?></p>
                                            </div>
                                        </li>
                                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    </ul>
                                    <div class="clear"></div>
                                    </div>
                                    <div class="issuance"><input type="submit" class="btn" value="提交" /></div>
                                 </td>
                             </tr>
                         </table></form>
          </div>
                </div>

            </div>

        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
</div>
<?php echo $this->fetch('footer.html'); ?>
