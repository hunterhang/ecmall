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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />

<script type="text/javascript" src="index.php?act=jslang"></script>
<script type="text/javascript" src="/js/jquery.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'ecmall.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/nav.js'; ?>" charset="utf-8"></script>
<link href="/themes/mall/default/styles/wxmall/css/order.css" type="text/css" rel="stylesheet" />
<link href="/themes/mall/default/styles/wxmall/css/common.css" type="text/css" rel="stylesheet" />
<link href="/themes/mall/default/styles/wxmall/css/address.css" type="text/css" rel="stylesheet" />
<!--<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/select.js'; ?>" charset="utf-8"></script>-->
<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/jquery-1.8.0.min.js'; ?>" charset="utf-8"></script>

<script type="text/javascript">
//<!CDATA[
var SITE_URL = "<?php echo $this->_var['site_url']; ?>";
var REAL_SITE_URL = "<?php echo $this->_var['real_site_url']; ?>";
var PRICE_FORMAT = '<?php echo $this->_var['price_format']; ?>';

//]]>
</script>


<body class="gray">
<form method="post" id="order_form">
    <div class="fixed">
        
        <div class="header header2">
			<a href="javascript:history.back(-1);" class="back2_pre"></a>
            确认下单
        </div>    
    </div>
       <?php echo $this->fetch('wxorder.shipping.html'); ?>
   
 
         <script type="text/javascript">
          function postscript_activation(tt){
          	if (!tt.name)
          	{
          		tt.value    = '';
          		tt.name = 'postscript';
          	}

          }
           </script>
   <div class="orderlist">
   <ul>
     <li>给卖家的附言</li>
     <li>  <textarea  class="com_text" id="postscript" placeholder="选填，可以告诉卖家您对商品的特殊需求，如颜色、尺码等" onclick="postscript_activation(this);"></textarea></li>
   </ul>
  </div>
 
    <div class="orderlist">
        <ul>
        	<li>店铺：<a href="<?php echo url('app=store&id=' . $this->_var['goods_info']['store_id']. ''); ?>" ><?php echo htmlspecialchars($this->_var['goods_info']['store_name']); ?></a></li>
         <?php $_from = $this->_var['goods_info']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
        		<li>
             <a  href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>">	<img src="<?php echo $this->_var['goods']['goods_image']; ?>" /></a>
                <p>  <a  href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>"><?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?></a></p>
                <p>单价：<?php echo price_format($this->_var['goods']['price']); ?></p>
                <p>数量：<?php echo $this->_var['goods']['quantity']; ?>件<strong><?php echo price_format($this->_var['goods']['subtotal']); ?></strong></p>
            </li>
         <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
       <span style="margin-left:10px;"> 配送方式：</span>
           <?php $_from = $this->_var['shipping_methods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'shipping_method');$this->_foreach['shipping_select'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['shipping_select']['total'] > 0):
    foreach ($_from AS $this->_var['shipping_method']):
        $this->_foreach['shipping_select']['iteration']++;
?>
            <li shipping_id="<?php echo $this->_var['shipping_method']['shipping_id']; ?>">
            <input type="radio" name="shipping_id" value="<?php echo $this->_var['shipping_method']['shipping_id']; ?>" />
             <?php echo htmlspecialchars($this->_var['shipping_method']['shipping_name']); ?>
             配送费用:&nbsp;<span class="money" ectype="shipping_fee">&yen; 0.00</span>
            </li>
             <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            <li>合计：<strong id="order_amount2"><?php echo price_format($this->_var['goods_info']['amount']); ?></strong></li>
        </ul>
    </div>
    <p class="total_price">实付款：<strong id="order_amount"><?php echo price_format($this->_var['goods_info']['amount']); ?></strong></p>
    <a href="javascript:void($('#order_form').submit());" class="submit_btn">提交订单</a>
  </form >
<?php echo $this->fetch('wxfooter.html'); ?>
