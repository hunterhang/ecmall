
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo $this->_var['site_url']; ?>/" />

<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7 charset=<?php echo $this->_var['charset']; ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_var['charset']; ?>" />
<?php echo $this->_var['page_seo']; ?>

<meta name="author" content="" />
<meta name="generator" content="" />
<meta name="copyright" content="" />
<link href="<?php echo $this->res_base . "/" . 'css/ecmall.css'; ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->res_base . "/" . 'css/w_common.css'; ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->res_base . "/" . 'css/log-reg.css'; ?>" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="index.php?act=jslang"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'jquery.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'ecmall.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/nav.js'; ?>" charset="utf-8"></script>

<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/jquery-1.8.0.min.js'; ?>" charset="utf-8"></script>
<script>
$(function(){
	$(".sao").hover(function(){
		$(".code").toggle();
		})
	})
$(function(){
	$(".menu_li").hover(function(){
		$(this).find(".sub_menu").toggle();
		$(this).find(".menu_list").toggleClass("cur");
		})
	})
</script>
<?php echo $this->_var['_head_tags']; ?>
</head>
<body>
<div class="auto">
    <div class="header auto">
    	<div class="top_bar">
            
            <div class="code" style="display:none"><img src="<?php echo $this->res_base . "/" . 'images/code.png'; ?>" /></div>
        </div>
        <div class="logo"><img src="<?php echo $this->res_base . "/" . 'images/logo.jpg'; ?>" /></div>
        <div class="headerLinks"><?php if (! $this->_var['visitor']['user_id']): ?>
            <a href="<?php echo url('app=member&act=login&ret_url=' . $this->_var['ret_url']. ''); ?>">登录</a>
            <a href="<?php echo url('app=member&act=register&ret_url=' . $this->_var['ret_url']. ''); ?>">注册</a>
            <?php else: ?>
           <a><?php echo htmlspecialchars($this->_var['visitor']['user_name']); ?></a> <a href="<?php echo url('app=member&act=logout'); ?>">退出</a>
            <a  href="<?php echo url('app=member'); ?>">用户中心</a>
            <?php endif; ?>
        </div>
    </div>
<div class="auto">
        <ul class="nav">
            <li class="menu_li">
               
                </ol>
            </li>
        </ul>
    </div>
