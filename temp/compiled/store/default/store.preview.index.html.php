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
   

    <div class="fixed">
        
        <div class="header">
              <div class="logo">
                <a href="<?php echo url('app=store&act=index_preview&id=' . $this->_var['store']['store_id']. ''); ?>"><img src="<?php echo $this->_var['store']['store_logo']; ?>" width="133" height="40"/></a>
              </div>
              <div class="nav">
                  <ul>
                      <li class="menu"><a href="javascript:;"></a></li>
                      <li class="user"><a href="javascript:void(0);"></a></li>
                      <li class="car"><a href="javascript:void(0);"></a></li>
                  </ul>
              </div>
              
              <div class="sub_menu">
                    <ul>
                        <li>
                            <a href="javascript:void(0);">最新商品</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">推荐商品</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">热门商品</a>
                        </li>
                           <?php $_from = $this->_var['store']['store_gcates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'gcategory');if (count($_from)):
    foreach ($_from AS $this->_var['gcategory']):
?>
                        <li>
                            <a href="javascript:void(0);"><?php echo htmlspecialchars($this->_var['gcategory']['value']); ?></a>
                        </li>
                           <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        
                    </ul>
                    <div class="fun">
                       <a href="javascript:;" class="code"><img src="/themes/store/default/styles/default/images/code.png"/>店铺二维码</a>
                       <a href="javascript:void(0);" class="fav"><img src="/themes/store/default/styles/default/images/favorite.png"/>收藏本店</a>
                    </div>
              </div>
              
              <div class="shop_info">
              		<img src="<?php if ($this->_var['store']['store_code']): ?><?php echo $this->_var['store']['store_code']; ?><?php else: ?>/themes/store/default/styles/default/images/code.jpg<?php endif; ?>" class="shop_code"/>
                    <p class="shop_name">店铺ID：<?php echo htmlspecialchars($this->_var['store']['store_name']); ?></p>
                    <p class="shop_detail">
                        <span>信用度：<strong>  <?php if ($this->_var['store']['credit_value'] >= 0): ?><img src="<?php echo $this->_var['store']['credit_image']; ?>" alt="" /><?php endif; ?></strong></span><br />
                        <span>商品数量：<?php echo $this->_var['store']['goods_count']; ?></span>
                    </p>
                    <a href="javascript:;" class="back">返回上一页</a>
              </div>
              
              <div class="fav_msg">
              		<img src="/themes/store/default/styles/default/images/favorite.png" /><span id='collect'>收藏成功！</span>
              </div>
        </div>    
        
        <div class="searchBar">
           <form id="" name="" method="get" action="index.php">
            <input type="hidden" name="app" value="store" />
             <input type="hidden" name="act" value="search" />
             <input type="hidden" name="id" value="<?php echo $this->_var['store']['store_id']; ?>" />
            <input name="keyword"  type="text" placeholder="搜搜看吧" class="search_text" /><input type="button" value="搜索" class="search_btn" />
             </form>
        </div>
    </div>

    
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
        	<a href="javascript:void(0);">
            	<li>
                	<img src="<?php if ($this->_var['store']['store_new_images']): ?><?php echo $this->_var['store']['store_new_images']; ?> <?php else: ?>/themes/store/default/styles/default/images/sort_icon1.png <?php endif; ?>" />
                    <span>最新商品</span>
                </li>
            </a>
        	<a href="javascript:void(0);">
            	<li>
                	<img src="<?php if ($this->_var['store']['store_recommend_images']): ?><?php echo $this->_var['store']['store_recommend_images']; ?> <?php else: ?>/themes/store/default/styles/default/images/sort_icon2.png <?php endif; ?>" />
                    <span>推荐商品</span>
                </li>
            </a>
        	<a href="javascript:void(0);">
            	<li>
                	<img src="<?php if ($this->_var['store']['store_hot_images']): ?><?php echo $this->_var['store']['store_hot_images']; ?> <?php else: ?>/themes/store/default/styles/default/images/sort_icon3.png <?php endif; ?>" />
                    <span>热门商品</span>
                </li>
            </a>
             <?php $_from = $this->_var['store']['store_gcates_image']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'gcategory');if (count($_from)):
    foreach ($_from AS $this->_var['gcategory']):
?>
           
        	<a href="javascript:void(0);">
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
    	<h2>橱窗推荐<a href="javascript:void(0);">more+</a></h2>
    	<ul>
		<?php $_from = $this->_var['recommended_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'rgoods');if (count($_from)):
    foreach ($_from AS $this->_var['rgoods']):
?>
        	<a href="javascript:void(0);">
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
    	<h2>新品上市<a href="javascript:void(0);">more+</a></h2>
    	<ul>
		 <?php $_from = $this->_var['new_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ngoods');if (count($_from)):
    foreach ($_from AS $this->_var['ngoods']):
?>
        	<a href="javascript:void(0);">
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
    
        <div class="footer">
    	<p>
        	<a href="#">商铺首页</a>|
            <a href="#">会员中心</a>|
            <a href="#">关于我们</a>
        </p>
        <p>Copyright &copy;2014 </p>
    </div> 
</body>
</html>
               