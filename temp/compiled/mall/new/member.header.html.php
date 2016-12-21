
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo $this->_var['site_url']; ?>/" />

<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7 charset=<?php echo $this->_var['charset']; ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_var['charset']; ?>" />
<?php echo $this->_var['page_seo']; ?>

<meta name="copyright" content="" />
<meta name="author" content="" />
<link href="<?php echo $this->res_base . "/" . 'css/user.css'; ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->res_base . "/" . 'css/new.css'; ?>" rel="stylesheet" type="text/css" />

<link href="<?php echo $this->res_base . "/" . 'css/new/w_common.css'; ?>" rel="stylesheet" type="text/css" />


<script type="text/javascript">
//<!CDATA[
var SITE_URL = "<?php echo $this->_var['site_url']; ?>";
var SITE_IMAGE_URL = "<?php echo $this->_var['site_image_url']; ?>";
var REAL_SITE_URL = "<?php echo $this->_var['real_site_url']; ?>";
var PRICE_FORMAT = '<?php echo $this->_var['price_format']; ?>';
//]]>
</script>
<script type="text/javascript" src="index.php?act=jslang"></script>
<script type="text/javascript" src="/js/jquery.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'ecmall.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'member.js'; ?>" charset="utf-8"></script>

<script type="text/javascript">
$(function(){
    $('#left h1 span,h2.title a.fold').click(function(){
        if($(this).hasClass('span_close')){
            $(this).removeClass('span_close');
            $(this).addClass('span_open');
            this.title = 'open';
            closeSubmenu($(this).parent());
        }
        else{
            $(this).removeClass('span_open');
            $(this).addClass('span_close');
            this.title = 'close';
            openSubmenu($(this).parent());
        }
    });

    var span = $("#child_nav");
    span.hover(function(){
        $("#float_layer:not(:animated)").show();
    }, function(){
        $("#float_layer").hide();
    });
});
function closeSubmenu(h1){
    h1.next('ul').css('display', 'none');
}
function openSubmenu(h1){
    h1.next('ul').css('display', '');
}
</script>
<?php echo $this->_var['_head_tags']; ?>
</head>
<body>


<div class="header_bg">
	<div class="header auto">
        <a href="index.php"" class="logo"><img title="<?php echo $this->_var['site_title']; ?>" src="<?php echo $this->_var['site_logo']; ?>"></a>
        <div class="headerLinks">
            小畅客服：<a href="http://wpa.qq.com/msgrd?v=3&uin=10086&site=qq&menu=yes" target="_blank"><img style="margin-right:10px;" title="联系微信商城" alt="联系微信商城" src="<?php echo $this->res_base . "/" . 'images/pa_002.gif'; ?>" border="0"></a>
            问题解答：<a href="http://wpa.qq.com/msgrd?v=3&uin=10086&site=qq&menu=yes" target="_blank"><img style="margin-right:10px;" title="联系微信商城" alt="联系微信商城" src="<?php echo $this->res_base . "/" . 'images/pa.gif'; ?>" border="0"></a>
            
        </div>
    </div>
</div>
<div class="nav">
    <ul class="auto">     
         
      <?php if (! $this->_var['visitor']['user_id']): ?>
            <form class="login_panel" action="<?php echo url('app=member&act=login'); ?>" method="post">
            	<li class="menu_li">用户名：<input type="text" class="l_text" name="user_name"/></li>
            	<li class="menu_li">密码：<input type="password"  class="l_text" name="password"/></li>
            	<li class="menu_li"><input type="submit" value="登录" class="lr_btn"/><input onclick="window.location.href='<?php echo url('app=member&act=register&ret_url=' . $this->_var['ret_url']. ''); ?>';" type="button" value="注册" class="lr_btn"/></li>
        	</form>
        <?php else: ?>
           <li class="menu_li logined">欢迎您！
              <a href="<?php echo url('app=member'); ?>"><?php echo htmlspecialchars($this->_var['visitor']['user_name']); ?></a>
              <a href="<?php echo url('app=member'); ?>">管理中心</a>
              <a href="<?php echo url('app=member&act=logout'); ?>">退出</a>
           </li>
        <?php endif; ?>
    </ul>
</div>


