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
<script>
$(window).load(function(){
	$('.flexslider').flexslider({
    	animation: "slide"
    });
});
</script>
</head>

<body>
   <?php echo $this->fetch('header.html'); ?>

    
    <section class="slider">
        <div class="flexslider">
            <ul class="slides">
                    <?php $_from = $this->_var['goods_images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_iamge');if (count($_from)):
    foreach ($_from AS $this->_var['goods_iamge']):
?>
                <li>
                     <img height="200px"  src="<?php echo $this->_var['site_url']; ?>/<?php echo $this->_var['goods_iamge']['image_url']; ?>"/>
                </li>
                   <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

            </ul>
        </div>
    </section>
    
    
    <div class="sort">
    	<ul>
        	<a href="index.php?app=store&act=search&id=<?php echo $this->_var['store']['store_id']; ?>&order=add_time desc">
            	<li>
                	<img src="<?php if ($this->_var['store']['store_new_images']): ?><?php echo $this->_var['store']['store_new_images']; ?> <?php else: ?>/themes/store/default/styles/default/images/sort_icon1.png <?php endif; ?> " />
                    <span>最新商品</span>
                </li>
            </a>
        	<a href="index.php?app=store&act=search&id=<?php echo $this->_var['store']['store_id']; ?>&recommended=1">
            	<li>
                	<img src="<?php if ($this->_var['store']['store_recommend_images']): ?><?php echo $this->_var['store']['store_recommend_images']; ?> <?php else: ?>/themes/store/default/styles/default/images/sort_icon2.png <?php endif; ?>" />
                    <span>推荐商品</span>
                </li>
            </a>
        	<a href="index.php?app=store&act=search&id=<?php echo $this->_var['store']['store_id']; ?>&order=views desc">
            	<li>
                	<img src="<?php if ($this->_var['store']['store_hot_images']): ?><?php echo $this->_var['store']['store_hot_images']; ?> <?php else: ?>/themes/store/default/styles/default/images/sort_icon3.png <?php endif; ?>" />
                    <span>热门商品</span>
                </li>
            </a>
             <?php $_from = $this->_var['store']['store_gcates_image']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'gcategory');if (count($_from)):
    foreach ($_from AS $this->_var['gcategory']):
?>
           
        	<a href="<?php echo url('app=store&id=' . $this->_var['store']['store_id']. '&act=search&cate_id=' . $this->_var['gcategory']['cate_id']. ''); ?>">
            	<li>
                	<img  src=" <?php if ($this->_var['gcategory']['cate_images']): ?><?php echo $this->_var['gcategory']['cate_images']; ?><?php else: ?>/themes/store/default/styles/default/images/sort_icon3.png<?php endif; ?>" />
                    <span><?php echo htmlspecialchars($this->_var['gcategory']['cate_name']); ?></span>
                </li>
            </a>
               <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        	
        </ul>
    </div>
    
    
	 <?php if ($this->_var['recommended_goods']): ?>
    <div class="lists">
    	<h2>橱窗推荐<a href="index.php?app=store&act=search&id=<?php echo $this->_var['store']['store_id']; ?>&recommended=1">more+</a></h2>
    	<ul>
		<?php $_from = $this->_var['recommended_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'rgoods');if (count($_from)):
    foreach ($_from AS $this->_var['rgoods']):
?>
        	<a href="<?php echo url('app=goods&id=' . $this->_var['rgoods']['goods_id']. ''); ?>">
           		<li>
                	<img src="<?php echo $this->_var['rgoods']['default_image']; ?>" />
                    <p><?php echo htmlspecialchars($this->_var['rgoods']['goods_name']); ?></p>
                    <span><?php echo price_format($this->_var['rgoods']['price']); ?></span>
                </li>
            </a>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        
        </ul>
    </div>
     <?php endif; ?>
	 
	   <?php if ($this->_var['new_goods']): ?>
    <div class="lists">
    	<h2>新品上市<a href="index.php?app=store&act=search&id=<?php echo $this->_var['store']['store_id']; ?>&order=add_time desc">more+</a></h2>
    	<ul>
		 <?php $_from = $this->_var['new_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ngoods');if (count($_from)):
    foreach ($_from AS $this->_var['ngoods']):
?>
        	<a href="<?php echo url('app=goods&id=' . $this->_var['ngoods']['goods_id']. ''); ?>">
           		<li>
                	<img src="<?php echo $this->_var['ngoods']['default_image']; ?>" />
                    <p><?php echo htmlspecialchars($this->_var['ngoods']['goods_name']); ?></p>
                    <span><?php echo price_format($this->_var['ngoods']['price']); ?></span>
                </li>
            </a>
			 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      
        </ul>
    </div>
     <?php endif; ?>
    
       <?php echo $this->fetch('footer.html'); ?>
</body>
</html>
               