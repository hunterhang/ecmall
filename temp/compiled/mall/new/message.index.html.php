<?php echo $this->fetch('member.header.html'); ?>
<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/jquery-1.8.0.min.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'addmess.js'; ?>" charset="utf-8"></script>
<link href="<?php echo $this->res_base . "/" . 'keyword/css/keyword.css'; ?>" rel="stylesheet" type="text/css" />
<style>
.borline td {padding:10px 0px;}
.ware_list th {text-align:left;}
.kg{overflow:hidden;padding:20px 85px;border-bottom:#eee solid 1px;}
.h_left{display:block;float:left;margin-right:40px;line-height:40px;}
</style>


<script>
$(function(){
	$('input[name="is_message"]').change(function(){
		$.post('index.php?app=wechat&act=checked_message',{num:$(this).val()},function(data){
			
			if(data==1)
			{
				alert('操作成功!');
			}else
			{
				alert('操作失败!');
			}
		});
	
	});
})
</script>

<div class="content">
    <?php echo $this->fetch('member.menu.html'); ?>
    <div id="right">
          
            <div class="wrap">
            
               <div class="kg">
               <!-- <h3 style="color:#666;" class="h_left">
                <input name="is_message" <?php if ($this->_var['info']['isno_message'] == '1'): ?>checked<?php endif; ?> type="radio" value="1" style="margin-right:5px;" >开启消息回复 <input   <?php if ($this->_var['info']['isno_message'] == '0'): ?>checked<?php endif; ?> name="is_message" type="radio" value="0"  style="margin-right:5px;" >关闭消息回复 
                </h3>-->
                 <h3 style="color:#666;" class="h_left remind">
             <a target="_blank" href="#" style="margin:0 5px 0 0;" class="btn1"><span class="pic1">查看图片外链教程</span></a>
                <a target="_blank" href="#" style="margin:0;" class="btn1"> <span class="pic3">自动回复教程</span></a>
               </h3>
                </div>
                
                               
                            <div class="content-right" style="padding-top:20px;">
	
                            </div>
                             
                   
            </div>
            <div class="clear"></div>
        </div>
        
        
          
        <div class="showimg" style="display:none">
	<div class="stit">
    	<span>上传图片</span>
        <a href="javascript:zsc_close();"><img src="<?php echo $this->res_base . "/" . 'keyword/images/addpageup_06.jpg'; ?>" /></a>
    </div>
    <div class="sup">
	<input type="button" value="上传图片" class="uploadbtn"/>
    <form action="index.php?app=wechat&act=ajaxupload" method="post" id="zsc_myform" enctype="multipart/form-data" target="yframe">
    	<input type="file" value="上传图片" class="uploadbtn" style="position:absolute; top:75px; left:20px; filter:alpha(pacity=0);opacity:0; z-index:999;" onchange="zsc_upload()" name="image" />图片尺寸320*200，图片大小不超过100k。
        <input type="hidden" name="sub" value="submit" /> 
    </form>
	<iframe name="yframe" src="index.php?app=wechat&act=ajaxupload" style="border:none; display:none;"></iframe>
    </div>
    <div class="imgbox">
   
    </div>
    <div class="sbottom"><input type="button" class="submit" id="zsc_surebtn" /></div>
     
    <span class="loadsubmit" >正在上传...</span>
</div>
<div class="zhe" style="display:none"></div>
        
        
        <div class="clear"></div>
    
</div>
<?php echo $this->fetch('footer.html'); ?>
