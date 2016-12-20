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
<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/jquery-1.8.0.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'ecmall.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'cart.js'; ?>" charset="utf-8"></script>
</head>
<body class="gray">

    <div class="fixed">
        
        <div class="header header2">
			<a href="javascript:history.back(-1);" class="back2_index"></a>
            购物车
            <div class="oprate">
              <!--  <a href="javascript:;" class="white_btn">删除</a>
                <a href="javascript:;" class="white_btn">全选</a>-->
            </div>
        </div>    
    </div>

   
    
     <?php $_from = $this->_var['carts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('store_id', 'cart');if (count($_from)):
    foreach ($_from AS $this->_var['store_id'] => $this->_var['cart']):
?>
    <div class="goods_list">
    	<ul>店铺: <a href="<?php echo url('app=store&id=' . $this->_var['store_id']. ''); ?>"><?php echo htmlspecialchars($this->_var['cart']['store_name']); ?></a>
    	     <?php $_from = $this->_var['cart']['goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
            <li id="cart_item_<?php echo $this->_var['goods']['rec_id']; ?>">
            	<div href="#" class="detail">
                  <!--  <input type="checkbox" class="c_check"/>-->
                   <a href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>"> <img src="<?php echo $this->_var['goods']['goods_image']; ?>" /></a>
                    <p class="c_info"><?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?></p>
                    <p><?php echo htmlspecialchars($this->_var['goods']['specification']); ?></p>
                    <p class="c_oprate">
                        <span class="price">价格：<strong><?php echo price_format($this->_var['goods']['price']); ?></strong></span>
                      <!--  <span class="white_btn" onclick="decrease_quantity();">-</span>-->
                        <span class="white_btn" onclick="decrease_quantity(<?php echo $this->_var['goods']['rec_id']; ?>);">-</span>
                        
                        <input type="text" id="input_item_<?php echo $this->_var['goods']['rec_id']; ?>"  value="<?php echo $this->_var['goods']['quantity']; ?>" orig="<?php echo $this->_var['goods']['quantity']; ?>"  class="addtext"  id="input_item"  onkeyup="change_quantity(<?php echo $this->_var['store_id']; ?>, <?php echo $this->_var['goods']['rec_id']; ?>, <?php echo $this->_var['goods']['spec_id']; ?>, this);"  changed="<?php echo $this->_var['goods']['quantity']; ?>"/>
                       <!-- <span class="white_btn" onclick="add_quantity();">+</span>-->
                        <span class="white_btn" onclick="add_quantity(<?php echo $this->_var['goods']['rec_id']; ?>);">+</span>
                       <a href="#" onclick="drop_cart_item(<?php echo $this->_var['store_id']; ?>, <?php echo $this->_var['goods']['rec_id']; ?>);"> <span class="close"><img src="/themes/mall/default/styles/wxmall/images/close.jpg" style="border:none; width:20px;height:20px;margin:0 0 5px 0;" ></span></a>
                    </p>
               
                </div>
                  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </li>
               <div class="count">
                    <a>合计(不含运费): <strong id='cart<?php echo $this->_var['store_id']; ?>_amount'><?php echo price_format($this->_var['cart']['amount']); ?></strong></a>
                    <a href="<?php echo url('app=order&goods=cart&store_id=' . $this->_var['store_id']. ''); ?>" class="jie">去结算</a>
                </div>
        </ul>
    </div>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    
    
    
    
    
    
    
</body>
    
</body>
</html>

  
