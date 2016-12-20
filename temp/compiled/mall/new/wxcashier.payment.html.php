<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />

<?php echo $this->_var['page_seo']; ?>
<link href="/themes/mall/default/styles/wxmall/css/common.css" type="text/css" rel="stylesheet" />
<link href="/themes/mall/default/styles/wxmall/css/comment.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="index.php?act=jslang"></script>
<script type="text/javascript" src="/js/jquery.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'ecmall.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/nav.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/jquery-1.8.0.min.js'; ?>" charset="utf-8"></script>
<script type="text/javascript">
//<!CDATA[
var SITE_URL = "<?php echo $this->_var['site_url']; ?>";
var REAL_SITE_URL = "<?php echo $this->_var['real_site_url']; ?>";
var PRICE_FORMAT = '<?php echo $this->_var['price_format']; ?>';

$(function(){
    var select_list = document.getElementById("select_list");
    var float_list = document.getElementById("float_list");
    select_list.onmouseover = function () {
        float_list.style.display = "block";
    };
    select_list.onmouseout = function () {
        float_list.style.display = "none";
    };
});
//]]>
</script>

<?php echo $this->_var['_head_tags']; ?>
<!--<editmode></editmode>-->
</head>
<style>
.pay_con{margin-top:70px; overflow:hidden; text-align:center;text-align:left;}
.pay_con .succeed{margin-bottom:10px;  overflow:hidden;padding:0 10px;}
.pay_con .succeed img{float:left; width:110px; margin-right:10px;}
.pay_con .succeed  h4{margin:25px 0 5px 0; font-size:18px; font-weight:normal;}
.pay_con .order_info{clear: both;margin: 5px; padding: 10px;}
.pay_con .order_info p{font-size:14px; font-weight:bold; margin:5px 0;}
.pay_con .order_info span{color:#b20005;}
.pay_con .buy .pay_way p{float:left; vertical-align:middle; height:50px; line-height:50px;}
.pay_con .buy .pay_way p .radio{margin-top:18px;}
.pay_con .buy .pay_way dt{background:#eee;padding:6px 10px; font-size:16px; margin:5px 0; border-left:#b20005 solid 5px; font-weight:bold; color:#444;}
.pay_con .buy .pay_way dd{padding:6px 10px;margin:5px 0; border-bottom:#ddd dashed 1px; overflow:hidden;}
.pay_con .buy .pay_way dd:last-child{border:none;}
.pay_con .red_btn,.pay_con .white_btn{padding:7px 10px; width:120px; display:block; margin-left:10px; text-align:center; float:left;}
</style>  
</head>
<body>

    <div class="fixed">
        
        <div class="header header2">
			<a href="<?php echo url('app=buyer_order&act=index'); ?>" class="back2_pre"></a>
            选择付款方式
        </div>  
    </div>
      <form action="index.php?app=cashier&act=goto_pay&order_id=<?php echo $this->_var['order']['order_id']; ?>" method="POST" id="goto_pay">
    
    <div class="pay_con">
    	<div class="succeed">
        	<img src="<?php echo $this->_var['site_url']; ?>/themes/mall/default/styles/default/images/clue_on.gif"/>
        	<h4>订单提交成功！</h4>
        	<p>您的订单已成功生成，选择您想用的支付方式进行支付</p>
        </div>
        <div class="order_info">
            <p>订单号：<span><?php echo $this->_var['order']['order_sn']; ?></span></p>
            <p>订单总价：<span><?php echo price_format($this->_var['order']['order_amount']); ?></span></p>
        </div>
        <div class="buy">
            <dl class="pay_way">
                <dt>选择支付方式并付款</dt>
                  <?php if ($this->_var['payments']['online']): ?>
                    <?php $_from = $this->_var['payments']['online']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'payment');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['payment']):
?>
                 <dd>
                    <p><input type="radio" name="payment_id" checked value="<?php echo $this->_var['payment']['payment_id']; ?>"  id="payment_<?php echo $this->_var['payment']['payment_code']; ?>" class="radio"></p>
                    <p><label for="payment_alipay"><img src="<?php echo $this->_var['site_url']; ?>/includes/payments/<?php echo $this->_var['payment']['payment_code']; ?>/logo.gif"></label></p>
                    <p>（在线支付）</p>
                </dd>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                <?php endif; ?>
                <?php if ($this->_var['payments']['offline']): ?>

                    <?php $_from = $this->_var['payments']['offline']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'payment');if (count($_from)):
    foreach ($_from AS $this->_var['payment']):
?>
                     <dd>
                    <p><input type="radio" name="payment_id" value="<?php echo $this->_var['payment']['payment_id']; ?>"  id="payment_<?php echo $this->_var['payment']['payment_code']; ?>" class="radio"></p>
                    <p><label for="payment_alipay"><img src="<?php echo $this->_var['site_url']; ?>/includes/payments/<?php echo $this->_var['payment']['payment_code']; ?>/logo.gif"></label></p>
                    <p>（线下支付）</p>
                   </dd>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  
                <?php endif; ?>
                 
             </dl>                
        </div>
        <a class="red_btn" href="javascript:$('#goto_pay').submit();">确认支付</a><!--<a class="white_btn" href="#">查看订单</a>-->
    </div>
      </form>
<?php echo $this->fetch('wxfooter.html'); ?>