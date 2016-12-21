<?php 
$agent = $_SERVER['HTTP_USER_AGENT'];
if(strpos($agent,"MicroMessenger")) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo $this->_var['site_url']; ?>/" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />

<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7 charset=<?php echo $this->_var['charset']; ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_var['charset']; ?>" />

<?php echo $this->_var['page_seo']; ?>
<link href="/themes/mall/default/styles/wxmall/css/common.css" type="text/css" rel="stylesheet" />
<link href="/themes/mall/default/styles/wxmall/css/bookmark.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="/js/jquery.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'ecmall.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'member.js'; ?>" charset="utf-8"></script>
<script type="text/javascript">
//<!CDATA[
var SITE_URL = "<?php echo $this->_var['site_url']; ?>";
var REAL_SITE_URL = "<?php echo $this->_var['real_site_url']; ?>";
var PRICE_FORMAT = '<?php echo $this->_var['price_format']; ?>';
//]]>
</script>
<?php echo $this->_var['_head_tags']; ?>
</head>

<body class="gray">

    <div class="fixed">
        
        <div class="header header2">
			<a href="javascript:history.back(-1);" class="back2_pre"></a>
            <?php echo $this->_var['head_msg']; ?>
        </div>  
    </div>
    <div class="mark"> 
        <div class="bm_con">
            <div class="marklist">
                <ul>
			  <br>
                 <li style="text-align:center;"><?php echo $this->_var['message']; ?>
                  <?php if ($this->_var['err_file']): ?>
                <b style="clear: both; float: left; font-size: 15px;">Error File: <strong><?php echo $this->_var['err_file']; ?></strong> at <strong><?php echo $this->_var['err_line']; ?></strong> line.</b>
                <?php endif; ?>
                <?php if ($this->_var['icon'] != "notice"): ?>
                <font style="clear: both; display:block; margin:0 0 0 50px;">
                <?php $_from = $this->_var['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                        <a style="color:#aaa;" href="<?php echo $this->_var['item']['href']; ?>">>> <?php echo $this->_var['item']['text']; ?></a><br />
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </font>
                <?php endif; ?>
                 </li>
                </ul>
            </div>
        </div>
 
    </div>
<script type="text/javascript">
//<!CDATA[
<?php if ($this->_var['redirect']): ?>
window.setTimeout("<?php echo $this->_var['redirect']; ?>", 1000);
<?php endif; ?>
//]]>
</script>
<?php echo $this->fetch('wxfooter.html'); ?>

<?php 
}else
{
?>
<?php echo $this->fetch('member.header.html'); ?>
<div class="content">
    <div class="particular">
        <div class="particular_wrap">
            <div class="<?php if ($this->_var['icon'] == "notice"): ?>success<?php else: ?>defeated<?php endif; ?> gai">
                <span></span>
                <b style="float: left; width:380px;"><?php echo $this->_var['message']; ?></b>
                <?php if ($this->_var['err_file']): ?>
                <b style="clear: both; float: left; font-size: 15px;">Error File: <strong><?php echo $this->_var['err_file']; ?></strong> at <strong><?php echo $this->_var['err_line']; ?></strong> line.</b>
                <?php endif; ?>
                <?php if ($this->_var['icon'] != "notice"): ?>
                <font style="clear: both; display:block; margin:0 0 0 50px;">
                <?php $_from = $this->_var['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                        <a style="color:#aaa;" href="<?php echo $this->_var['item']['href']; ?>">>> <?php echo $this->_var['item']['text']; ?></a><br />
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </font>
                <?php endif; ?>
                <div style="clear:both"></div>
            </div>
        </div>
        <div class="clear"></div>
        <div class="adorn_right1"></div>
        <div class="adorn_right2"></div>
        <div class="adorn_right3"></div>
        <div class="adorn_right4"></div>
    </div>
    <div class="clear"></div>
</div>
<script type="text/javascript">
//<!CDATA[
<?php if ($this->_var['redirect']): ?>
window.setTimeout("<?php echo $this->_var['redirect']; ?>", 1000);
<?php endif; ?>
//]]>
</script>
<?php echo $this->fetch('footer.html'); ?>

<?php } ?>

<script>
	var h = document.documentElement.clientHeight;
	h = (h-113-180)/2;
	$('.gai').css('padding',h+'px 0');
</script>