<?php echo $this->fetch('member.header.html'); ?>
<?php echo $this->_var['images_upload']; ?>

<style>
.box_arr .table_btn {width: 222px;}
.box_arr .table_btn a {float: left;}
.box_arr .table_btn a.disable_spec { background: url(<?php echo $this->res_base . "/" . 'images/member/btn.gif'; ?>) repeat 0 -1018px; float: right; }
.dialog_body{border:0px;}
.add_spec .add_link {color:#919191;}
.add_spec .add_link:hover {color:red;}
add_spec h2 {padding-left: 10px;}
.width7{width: 250px;}
.f_l{float:left;}
.mls_id {width: 0; filter: alpha(opacity=0);opacity: 0;}
</style>
<script type="text/javascript">
//<!CDATA[
var SPEC = <?php echo $this->_var['goods']['spec_json']; ?>;


function add_uploadedfile(file_data)
{
    if(file_data.instance == 'goods_image'){
        $('#goods_images').append('<li ectype="handle_pic" file_id="'+ file_data.file_id +'" thumbnail="<?php echo $this->_var['site_url']; ?>/'+ file_data.thumbnail +'"><input type="hidden" value="'+ file_data.file_id +'" name="goods_file_id[]"/><div class="pic"><img src="<?php echo $this->_var['site_url']; ?>/'+ file_data.thumbnail +'" width="55" height="55" alt="" /><div ectype="handler" class="bg"><p class="operation"><span class="cut_in" ectype="set_cover" ecm_title="预览"></span><span class="delete" ectype="drop_image" ecm_title="删除"></span></p></div></div></li>');
                trigger_uploader();
        if($('#big_goods_image').attr('src') == '<?php echo $this->_var['goods']['default_goods_image']; ?>'){
            set_cover(file_data.file_id);
        }
        if(GOODS_SWFU.getStats().files_queued == 0){
            window.setTimeout(function(){
                $('#uploader').hide();
                $('#open_uploader').find('.show').attr('class','hide');
            },4000);
        }
    }else if(file_data.instance == 'desc_image'){
        $('#desc_images').append('<li file_name="'+ file_data.file_name +'" file_path="'+ file_data.file_path +'" ectype="handle_pic" file_id="'+ file_data.file_id +'"><input type="hidden" name="desc_file_id[]" value="'+ file_data.file_id +'"><div class="pic" style="z-index: 2;"><img src="<?php echo $this->_var['site_url']; ?>/'+ file_data.file_path +'" width="50" height="50" alt="'+ file_data.file_name +'" /></div><div ectype="handler" class="bg" style="z-index: 3;display:none"><img src="<?php echo $this->_var['site_url']; ?>/'+ file_data.file_path +'" width="50" height="50" alt="'+ file_data.file_name +'" /><p class="operation"><a href="javascript:void(0);" class="cut_in" ectype="insert_editor" ecm_title="插入编辑器"></a><span class="delete" ectype="drop_image" ecm_title="删除"></span></p><p class="name">'+ file_data.file_name +'</p></div></li>');
                trigger_uploader();
        if(EDITOR_SWFU.getStats().files_queued == 0){
            window.setTimeout(function(){
                $('#editor_uploader').hide();
            },5000);
        }
    }
}


function set_cover(file_id){
    if(typeof(file_id) == 'undefined'){
        $('#big_goods_image').attr('src','<?php echo $this->_var['goods']['default_goods_image']; ?>');
        return;
    }
    var obj = $('*[file_id="'+ file_id +'"]');
    $('*[file_id="'+ file_id +'"]').clone(true).prependTo('#goods_images');
    $('*[ectype="handler"]').hide();
    $('#big_goods_image').attr('src',obj.attr('thumbnail'));
    obj.remove();
}

$(function(){
     $('#goods_form').validate({
        errorPlacement: function(error, element){
            $(element).next('.field_notice').hide();
            $(element).after(error);
        },
        success       : function(label){
            label.addClass('validate_right').text('OK!');
        },
        onkeyup : false,
        rules : {
            goods_name : {
                required   : true
            },
            price      : {
                number     : true,
                required : true,
                min : 0
            },
            stock      : {
                digits    : true
            },
            cate_id    : {
                remote   : {
                    url  : 'index.php?app=my_goods&act=check_mgcate',
                    type : 'get',
                    data : {
                        cate_id : function(){
                            return $('#cate_id').val();
                        }
                    }
                }
            }
        },
        messages : {
            goods_name  : {
                required   : '商品名称不能为空'
            },
            price       : {
                number     : '此项仅能为数字',
                required : '价格不能为空',
                min : '价格必须大于或等于零'
            },
            stock       : {
                digits  : '此项仅能为数字'
            },
            cate_id     : {
                remote  : '请选择商品分类（必须选到最后一级）'
            }
        }
    });
    // init cover
    set_cover($("#goods_images li:first-child").attr('file_id'));

    // init spec
    spec_update();
});
//]]>
</script>
<div class="content">
  <div class="totline"></div>
  <div class="botline"></div>
  <?php echo $this->fetch('member.menu.html'); ?>
  <div id="right">
        <div class="wrap">
            <div class="public" style="height:700px;">
                <form method="post" id="goods_form">
                    <div class="information_index">
                        <div class="add_wrap" style="display:none;">
                            <div class="assort">
                                <p class="txt">商品分类: </p>
                                <p class="select" id="gcategory">
                                    <?php if ($this->_var['goods']['cate_id']): ?>
                                    <span class="f_l"><?php echo htmlspecialchars($this->_var['goods']['cate_name']); ?></span>
                                    <a class="edit_gcategory btn" href="javascript:;">编辑</a>
                                    <select style="display:none">
                                        <option>请选择...</option>
                                        <?php echo $this->html_options(array('options'=>$this->_var['mgcategories'])); ?>
                                    </select>
                                    <?php else: ?>
                                    <select>
                                        <option>请选择...</option>
                                        <?php echo $this->html_options(array('options'=>$this->_var['mgcategories'])); ?>
                                    </select>
                                    <?php endif; ?>
                                    <input type="text" id="cate_id" name="cate_id" value="<?php echo $this->_var['goods']['cate_id']; ?>" class="mls_id" />
                                    <input type="hidden" name="cate_name" value="<?php echo htmlspecialchars($this->_var['goods']['cate_name']); ?>" class="mls_names" />
                                </p>
                            </div>
                        </div>
                        
                        <h4>首页轮播图&nbsp;&nbsp;&nbsp;(<font style="color:red;">图片大小推荐640*400</font>)</h4>
                        <div class="add_wrap">

                            <div class="pic_list">
                                <div class="big_pic"><img id="big_goods_image" src="<?php echo $this->_var['goods']['default_goods_image']; ?>" width="300" height="300" alt="" /></div>
                                <div class="small_pic">
                                    <ul id="goods_images">
                                        <?php $_from = $this->_var['goods_images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_iamge');if (count($_from)):
    foreach ($_from AS $this->_var['goods_iamge']):
?>
                                        <li ectype="handle_pic" file_id="<?php echo $this->_var['goods_iamge']['file_id']; ?>" thumbnail="<?php echo $this->_var['site_url']; ?>/<?php echo $this->_var['goods_iamge']['thumbnail']; ?>">
                                        <input type="hidden" name="goods_file_id[]" value="<?php echo $this->_var['goods_iamge']['file_id']; ?>">
                                        <div class="pic">
                                            <img src="<?php echo $this->_var['site_url']; ?>/<?php echo $this->_var['goods_iamge']['thumbnail']; ?>" width="55" height="55" />
                                            <div ectype="handler" class="bg">
                                                    <p class="operation">
                                                        <span class="cut_in" ectype="set_cover" ecm_title="预览"></span>
                                                        <span class="delete" ectype="drop_image" ecm_title="删除"></span>
                                                    </p>
                                            </div>
                                        </div>
                                        </li>
                                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    </ul>
                                    <div class="clear"></div>
                                </div>
                                <div class="upload_btn">
                                    <div class="upload" id="open_uploader"><b class="hide">上传图片</b></div>
                                    <div class="upload_con" id="uploader" style="display:none">
                                        <div class="upload_con_top"></div>
                                        <div class="upload_wrap">

                                            <ul>
                                                <li class="btn1">
                                                <div id="divSwfuploadContainer">
                                                    <div id="divButtonContainer">
                                                        <span id="spanButtonPlaceholder"></span>
                                                    </div>
                                                </div>
                                                </li>
                                                <li><iframe src="index.php?app=comupload&act=view_iframe&id=<?php echo $this->_var['id']; ?>&belong=<?php echo $this->_var['belong']; ?>&instance=goods_image" width="86" height="30" scrolling="no" frameborder="0"></iframe></li>
                                                <li id="open_remote" class="btn2">远程地址</li>
                                            </ul>
                                            <div id="remote" class="upload_file" style="display:none">
                                            <iframe src="index.php?app=comupload&act=view_remote&id=<?php echo $this->_var['id']; ?>&belong=<?php echo $this->_var['belong']; ?>&instance=goods_image" width="272" height="39" scrolling="no" frameborder="0"></iframe>
                                            </div>
                                            <div id="goods_upload_progress"></div>
                                            <div class="upload_txt">
                                                <span>支持JPEG和静态的GIF格式图片，不支持GIF动画图片，上传图片大小不能超过100KB.浏览文件时可以按住ctrl或shift键多选,<font style="color:red">如果上传错误,可能因为您的图片大小大于100KB,可以<a style="color:blue;" target="_blank" href="http://www.baidu.com/s?tn=monline_5_dg&ie=utf-8&bs=%E6%89%B9%E9%87%8F%E5%A4%84%E7%90%86%E5%B7%A5%E5%85%B7%E7%9A%84%E9%93%BE%E6%8E%A5&f=3&rsv_bp=1&rsv_spt=1&wd=%E5%9C%A8%E7%BA%BF%E6%89%B9%E9%87%8F%E5%A4%84%E7%90%86%E5%9B%BE%E7%89%87%E5%A4%A7%E5%B0%8F&rsv_sug3=9&rsv_sug1=9&rsv_sug4=234&oq=%E5%9C%A8%E7%BA%BF%E6%89%B9%E9%87%8F%E5%A4%84%E7%90%86&rsp=1&rsv_sug5=0&rsv_sug=0&rsv_sug2=0&inputT=6540">点击此处</a>进行图片批量处理</font></span>
                                            </div>

                                        </div>
                                        <div class="upload_con_bottom"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="products">
                         
                            </div>
                            <div class="clear"></div>
                        </div>

                              <div class="add_bewrite" style="display:none;">
                            <h5>商品描述</h5>
                            <div class="add_wrap">
                                <div class="editor">
                                    <div>
                                    <textarea name="description" id="description"  style="width:100%; height:400px;">
                                    <?php echo htmlspecialchars($this->_var['goods']['description']); ?>
                                    </textarea>
                                    </div>
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
                                                    <li id="open_editor_remote" class="btn2">远程地址</li>
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
                               
                                    <div class="clear"></div>
                                </div>
                                <div class="issuance"><input type="submit" class="btn" value="提交" /></div>
                            </div>
                        </div>
                        
                    </div>
                </form>
            </div>
            <div class="wrap_bottom"></div>
        </div>

        <div class="clear"></div>
        <div class="adorn_right1"></div>
        <div class="adorn_right2"></div>
        <div class="adorn_right3"></div>
        <div class="adorn_right4"></div>
    </div>
    <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>
