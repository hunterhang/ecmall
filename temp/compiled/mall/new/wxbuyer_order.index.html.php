<?php echo $this->fetch('wxheader.html'); ?>
<?php echo $this->_var['_head_tags']; ?>
<body class="gray" style="overflow-x:hidden;">

    <div class="fixed">
        
        <div class="header header2">
        <a href="<?php if($_SESSION['wxstore_id']){echo "index.php?app=store&id=".$_SESSION['wxstore_id'];}else{echo "javascript:history.back(-1);";}?>"
         class="back2_index"></a>
            个人中心
           <a href="/index.php?app=my_favorite" class="bookmark"></a>
        </div>    
    </div>
    
    <div class="user_header">
    	<div class="user_photo">
        	<a href="<?php echo url('app=buyer_order&act=index'); ?>"><img src="/themes/mall/default/styles/wxmall/images/user.jpg" /></a>
        </div>
        <span class="user_name">
     您好,欢迎。<a href="index.php?app=member&act=wxlogout" style="color:#999;margin-left:5px;">退出</a>
        </span>
    	<div class="order_panel">
            <ul class="orders">
                <a href="<?php echo url('app=buyer_order&act=index&type=pending'); ?>">
                    <li>
                        <span class="num  <?php if ($this->_var['type'] == pending): ?> on <?php endif; ?>"><?php echo $this->_var['pending_count']; ?></span>
                        <span>待付款</span>
                    </li>
                </a>
                <a href="<?php echo url('app=buyer_order&act=index&type=accepted'); ?>">
                    <li>
                        <span class="num <?php if ($this->_var['type'] == accepted): ?> on <?php endif; ?>"><?php echo $this->_var['accepted_count']; ?></span>
                        <span>待发货</span>
                        <b></b>
                    </li>
                </a>
                <a href="<?php echo url('app=buyer_order&act=index&type=shipped'); ?>">
                    <li>
                        <span class="num <?php if ($this->_var['type'] == shipped): ?> on <?php endif; ?>"><?php echo $this->_var['shipped_count']; ?></span>
                        <span>待收货</span>
                        <b></b>
                    </li>
                </a>
                <a href="<?php echo url('app=buyer_order&act=index&type=finished'); ?>">
                    <li>
                        <span class="num <?php if ($this->_var['type'] == finished): ?> on <?php endif; ?>"><?php echo $this->_var['finished_count']; ?></span>
                        <span>已完成</span>
                        <b></b>
                    </li>
                </a>
            </ul>
        </div>
        <div class="set_address"><a href="index.php?app=my_address" id="address_text"></a></div>
        <script>
        $(function(){
			$(".set_address").click(function(){
				if($('#address_text').text()=='')
				{
				$('#address_text').text('收货地址管理');
				}else{
				$('#address_text').text('');
				}
				})
			})
        </script>
    </div>
   
    
    
	 
    
                
                
                 <div class="u_order">
                 <?php $_from = $this->_var['orders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'order');if (count($_from)):
    foreach ($_from AS $this->_var['order']):
?>
              <div class="orderbox">
        	<h2><span><i></i><?php echo htmlspecialchars($this->_var['order']['seller_name']); ?></span><b>订单状态:<font style="color:#b20005;"><?php echo call_user_func("order_status",$this->_var['order']['status']); ?><?php if ($this->_var['order']['evaluation_status']): ?>,&nbsp;已评价<?php endif; ?></font></b></h2>
          
                  <?php $_from = $this->_var['order']['order_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
                  <div class="detail">
               <a href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>"> <img src="<?php echo $this->_var['goods']['goods_image']; ?>" /></a>
                <p class="title"><?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?></p>
                <p>​<?php echo htmlspecialchars($this->_var['goods']['specification']); ?>​</p>​
                <p>价格：<strong><?php echo price_format($this->_var['goods']['price']); ?></strong><span>数量：<?php echo $this->_var['goods']['quantity']; ?></span></p>
                </div>
                   <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                   
                    <?php if ($this->_var['order']['payment_name']): ?>
                    
                   <?php endif; ?>
                    <p class="opr">
                    <a class="white_btn" href="<?php echo url('app=buyer_order&act=evaluate&order_id=' . $this->_var['order']['order_id']. ''); ?>" id="order<?php echo $this->_var['order']['order_id']; ?>_evaluate"<?php if ($this->_var['order']['status'] != ORDER_FINISHED || $this->_var['order']['evaluation_status'] != 0): ?> style="display:none"<?php endif; ?>>我要评价</a>
                            <a href="<?php echo url('app=cashier&order_id=' . $this->_var['order']['order_id']. ''); ?>"  id="order<?php echo $this->_var['order']['order_id']; ?>_action_pay"<?php if ($this->_var['order']['status'] != ORDER_PENDING): ?> style="display:none"<?php endif; ?> class="white_btn">付款</a>
                            <input type="button" value="确认收货" class="white_btn" ectype="dialog" dialog_id="buyer_order_confirm_order" dialog_width="100%" dialog_title="确认收货" uri="index.php?app=buyer_order&amp;act=confirm_order&order_id=<?php echo $this->_var['order']['order_id']; ?>&ajax"  id="order<?php echo $this->_var['order']['order_id']; ?>_action_confirm"<?php if ($this->_var['order']['status'] != ORDER_SHIPPED || $this->_var['order']['payment_code'] == 'cod'): ?> style="display:none"<?php endif; ?> />
                            <input type="button" value="取消订单" class="white_btn" ectype="dialog" dialog_width="100%" dialog_title="取消订单" dialog_id="buyer_order_cancel_order" uri="index.php?app=buyer_order&amp;act=cancel_order&order_id=<?php echo $this->_var['order']['order_id']; ?>&ajax"  id="order<?php echo $this->_var['order']['order_id']; ?>_action_cancel"<?php if ($this->_var['order']['status'] != ORDER_PENDING && $this->_var['order']['status'] != ORDER_SUBMITTED): ?> style="display:none"<?php endif; ?> />
                            <a href="<?php echo url('app=buyer_order&act=view&order_id=' . $this->_var['order']['order_id']. ''); ?>"  class="white_btn">查看订单</a>
                   </p>
                   </div>
                    <?php endforeach; else: ?>
                    
  <div class="null" style="display:none; margin-top:120px;">
        <p><img src="/themes/mall/default/styles/wxmall/images/order_null.png" /></p>
        <p>你没有订单信息~</p>
        <p><a href="javascript:history.back(-1);" class="white_btn">去购物</a></p>
    </div>
                    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                  </div>
                    
       
  
    <div class="page">
    	  <?php echo $this->fetch('member.page.bottom.html'); ?>
    </div>
  
    
    
    <iframe id='iframe_post' name="iframe_post" src="about:blank" frameborder="0" width="0" height="0"></iframe>
<?php echo $this->fetch('wxfooter.html'); ?>
