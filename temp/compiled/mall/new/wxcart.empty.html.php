<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $this->_var['page_seo']; ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />


<link href="/themes/mall/default/styles/wxmall/css/common.css" type="text/css" rel="stylesheet" />
<link href="/themes/mall/default/styles/wxmall/css/sp_cart.css" type="text/css" rel="stylesheet" />
<!--<script type="text/javascript" src="themes/mall/default/styles/wxmall/js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'ecmall.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'cart.js'; ?>" charset="utf-8"></script>-->
</head>
<body class="gray">

    <div class="fixed">
        
        <div class="header header2">
			<a href="<?php if($_SESSION['wxstore_id']){echo "index.php?app=store&id=".$_SESSION['wxstore_id'];}else{echo "javascript:history.back(-1);";}?>" class="back2_index"></a>
            购物车
            <div class="oprate">
              <!--  <a href="javascript:;" class="white_btn">删除</a>
                <a href="javascript:;" class="white_btn">全选</a>-->
            </div>
        </div>    
    </div>
    
    <div class="null" >
        <p><img src="/themes/mall/default/styles/wxmall/images/cart_null.png" /></p>
        <p>你的购物车是空的<br />现在就去购物吧~</p>
        <p><a href="<?php if($_SESSION['wxstore_id']){echo "index.php?app=store&id=".$_SESSION['wxstore_id'];}else{echo "javascript:history.back(-1);";}?>" class="white_btn">去购物<?php echo $this->_var['store_id']; ?></a></p>
    </div>
    
    
    
    
    
    
    
</body>
    
</body>
</html>

    