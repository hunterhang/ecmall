<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<?php echo $this->_var['page_seo']; ?>
<link href="/themes/store/default/styles/default/css/common.css" rel="stylesheet" type="text/css" />
<link href="/themes/store/default/styles/default/css/flexslider.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/themes/store/default/styles/default/js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="/themes/store/default/styles/default/js/jquery.flexslider.js"></script>
<script type="text/javascript" src="/themes/store/default/styles/default/js/sub_menu.js"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'ecmall.js'; ?>" charset="utf-8"></script>

</head>

<body>

 <?php echo $this->fetch('header.html'); ?>
      <div class="paixu">
            <span class="red_btn">排序</span>
            <a href="index.php?app=store&act=search&id=<?php echo $this->_var['store']['store_id']; ?>&keyword=<?php echo $this->_var['keyword']; ?>&cate_id=<?php echo $this->_var['cate_id']; ?>&order=comments desc" class="white_btn <?php if ($this->_var['sort'] == '4'): ?>cur<?php endif; ?>">销量<i></i></a>
            <a href="index.php?app=store&act=search&id=<?php echo $this->_var['store']['store_id']; ?>&keyword=<?php echo $this->_var['keyword']; ?>&cate_id=<?php echo $this->_var['cate_id']; ?>&order=add_time desc" class="white_btn <?php if ($this->_var['sort'] == '1'): ?>cur<?php endif; ?>">新品<i></i></a>
            <a href="index.php?app=store&act=search&id=<?php echo $this->_var['store']['store_id']; ?>&keyword=<?php echo $this->_var['keyword']; ?>&cate_id=<?php echo $this->_var['cate_id']; ?>&order=price desc" class="white_btn <?php if ($this->_var['sort'] == '2'): ?>cur<?php endif; ?>">价格<i></i></a>
            <a href="index.php?app=store&act=search&id=<?php echo $this->_var['store']['store_id']; ?>&keyword=<?php echo $this->_var['keyword']; ?>&cate_id=<?php echo $this->_var['cate_id']; ?>&order=views desc" class="white_btn <?php if ($this->_var['sort'] == '3'): ?>cur<?php endif; ?>">人气<i></i></a>
        </div>
  
    <div class="lists lists1">
    	<ul>
    	  <?php if ($this->_var['searched_goods']): ?>
    	     <?php $_from = $this->_var['searched_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'sgoods');if (count($_from)):
    foreach ($_from AS $this->_var['sgoods']):
?>
            <a href="<?php echo url('app=goods&id=' . $this->_var['sgoods']['goods_id']. ''); ?>">
            <li>
            <img src="<?php echo $this->_var['sgoods']['default_image']; ?>" />
            <p><?php echo htmlspecialchars($this->_var['sgoods']['goods_name']); ?></p>
            <span><?php echo price_format($this->_var['sgoods']['price']); ?></span>
            </li>
            </a>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          <?php else: ?>
           很抱歉! 没有找到相关商品
           <?php endif; ?>
        </ul>
    </div>
    
    
    <div class="page">
    	 <?php echo $this->fetch('page.bottom.html'); ?>
    </div>
       <?php echo $this->fetch('footer.html'); ?>
</body>
</html>