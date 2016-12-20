<?php if ($this->_var['payform']['online']): ?>
  <h3>正在连接支付网关, 请稍等...</h3>
  <form action="<?php echo $this->_var['payform']['gateway']; ?>" id="payform" method="<?php echo $this->_var['payform']['method']; ?>" style="display:none">
  <?php $_from = $this->_var['payform']['params']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('_k', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['_k'] => $this->_var['value']):
?>
    <input type="hidden" name="<?php echo $this->_var['_k']; ?>" value="<?php echo $this->_var['value']; ?>" />
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </form>
  <script type="text/javascript">
      document.getElementById('payform').submit();
  </script>
<?php else: ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo $this->_var['page_seo']; ?>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7 charset=<?php echo $this->_var['charset']; ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_var['charset']; ?>" />
<link href="/themes/mall/default/styles/wxmall/css/common.css" rel="stylesheet"  type="text/css"/>
</head>

<body>
<style>
.w_info{background:#f3f3f3; padding:15px 10px; border-bottom:#eee solid 1px; margin-top:50px;}
.w_info h2{padding-bottom:5px;}
.w_tit{color:#555; font-weight:bold; padding:0 10px; font-size:16px;}
.w_tit i{color:#777; font-weight:normal;font-size:14px; font-style:normal; margin-left:5px;}
.w_info span{display:block; border-top:#ddd solid 1px;padding-top:5px;}
.w_sbtn{width:100%; padding:10px 0;}
.info_table textarea{border:#bbb solid 1px; width:100%;}
.info_table td{padding:5px 10px;}
</style>
<div class="w_info">
       <div class="fixed">
        
        <div class="header header2">
			<a href="<?php echo url('app=buyer_order&act=index'); ?>" class="back2_pre"></a>
            线下支付
        </div>  
    </div>
    <h2>支付方式简介</h2>
    <span>  <?php echo $this->_var['payform']['desc']; ?></span>
      <?php if ($this->_var['payment']['bank_images']): ?>
    <img src="<?php echo $this->_var['payment']['bank_images']; ?>" style="width:100%; height:120px; margin-top:5px;">
    <?php endif; ?>
</div>

  <form class="info_table" id="pay_message_form" action="index.php?app=cashier&act=offline_pay&order_id=<?php echo $this->_var['order']['order_id']; ?>" method="POST">
  <table width="100%" border="0">
    <tr>
      <td class="w_tit">请输入支付信息<i>(如:转账的账号,时间等）</i></td>
    </tr>
    <tr>
      <td><textarea name="pay_message" style=" height:100px;"><?php echo htmlspecialchars($this->_var['order']['pay_message']); ?></textarea></td>
    </tr>
    <tr>	
      <td><input type="submit"  value="提交" class="red_btn w_sbtn"/></td>
    </tr>
  </table>
</form>
</body>
</html>

<?php endif; ?>
