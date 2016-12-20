<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<meta content="width=device-width,minimum-scale=1.0,maximum-scale=1.0" name="viewport">
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<?php echo $this->_var['page_seo']; ?>
<link type="text/css" rel="stylesheet" href="/themes/store/default2/styles/default/css/index.css">
<link type="text/css" rel="stylesheet" href="/themes/store/default2/styles/default/css/flexslider.css">
<script type="text/javascript" src="/themes/store/default2/styles/default/js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="/themes/store/default2/styles/default/js/jquery.flexslider.js"></script>
<script type="text/javascript" src="/themes/store/default2/styles/default/js/iscroll.js"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'ecmall.js'; ?>" charset="utf-8"></script>
</head>

<body>
<script>
$(window).load(function(){	
	$('.flexslider').flexslider({
    	animation: "slide"
    });
});
</script>
<div class="auto">
  	
	<div class="header">
    	<a href="javascript:void(0);" class="logo"><img src="<?php echo $this->_var['store']['store_logo']; ?>" height="40"></a>   
        <div class="nav">
            <ul>
                <li class="menu"><a href="javascript:;"><img src="/themes/store/default2/styles/default/images/nav_1.png"></a></li>
                <li class="user"><a href="javascript:void(0);"><img src="/themes/store/default2/styles/default/images/nav_2.png"></a></li>
                <li class="car"><a href="javascript:void(0);"><img src="/themes/store/default2/styles/default/images/nav_3.png"></a></li>
            </ul>
        </div>
        
        
        
        <div id="sub_menu_bg">
            <div class="sub_menu" id="sub_menu" >
                <div  id="scroller">
                      <ul id="thelist">
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
                         <a href="javascript:;" class="code"><img src="/themes/store/default2/styles/default/images/code.png"/>店铺二维码</a>
                         <a href="javascript:void(0);" class="fav"><img src="/themes/store/default2/styles/default/images/favorite.png"/>收藏本店</a>
                      </div>
                      
                      <div class="shop_info">
                            <img src="<?php if ($this->_var['store']['store_code']): ?><?php echo $this->_var['store']['store_code']; ?><?php else: ?>/themes/store/default/styles/default/images/code.jpg<?php endif; ?>" class="shop_code"/>
                            <p class="shop_name">店铺ID：<?php echo htmlspecialchars($this->_var['store']['store_name']); ?></p>
                            <p class="shop_detail">
                                <span>信用度：<strong>  <?php if ($this->_var['store']['credit_value'] >= 0): ?><img src="<?php echo $this->_var['store']['credit_image']; ?>" alt="" /><?php endif; ?></strong></span><br />
                                <span>商品数量：<?php echo $this->_var['store']['goods_count']; ?></span>
                            </p>
                      </div>
                  </div>
                  <div class="arrow">>></div>
                  
                  <div class="fav_msg">
                        <img src="/themes/store/default2/styles/default/images/favorite1.png" /><span id='collect'>收藏成功！</span>
                  </div>
            </div>
        </div>
        <script>
			$(function(){
				publicmain();
			});	
			
			$(window).resize(function(){
				publicmain();
			});
			
			function publicmain(){
				var h = document.documentElement.clientHeight;
				$('#sub_menu_bg').css({'height':h});
			}
		</script>   
        
     
        
        
         
        
        <form class="searchBar">    
          <form id="" name="" method="get" action="index.php">
            <input type="hidden" name="app" value="store" />
             <input type="hidden" name="act" value="search" />
             <input type="hidden" name="id" value="<?php echo $this->_var['store']['store_id']; ?>" />
                <input type="text" name="keyword" placeholder="搜搜看吧" class="search_text" /><input type="button" value="搜索" class="search_btn" />
                 </form>
        </form>
        
	</div>
	
	<script>


	$(function(){
	//导航
	$(".menu").click(function(){
		$(".sub_menu,#sub_menu_bg").css({'width':270});
		$(".shade,.arrow").show();
		})
	$(".arrow").click(function(){
		$(".sub_menu,#sub_menu_bg").css({'width':0});
		$(".shade,.arrow").hide();
		})
	//显示（关闭）二维码等店铺信息
	$(".code").click(function(){
		$(".shop_info").slideToggle();
		})
	//加入收藏

	})

</script>
	
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
    
    
    
    <div class="main_sort">
    	<ul>
    	 <li> 
    	  <a href="javascript:void(0);">
                	<img src="<?php if ($this->_var['store']['store_new_images']): ?><?php echo $this->_var['store']['store_new_images']; ?> <?php else: ?>/themes/store/default/styles/default/images/sort_icon1.png <?php endif; ?> " />
            </a> 
         </li>
        	
         <li>
        	<a href="javascript:void(0);">
          <img src="<?php if ($this->_var['store']['store_recommend_images']): ?><?php echo $this->_var['store']['store_recommend_images']; ?> <?php else: ?>/themes/store/default/styles/default/images/sort_icon2.png <?php endif; ?>" />
            </a></li>
        	<li>
        	<a href="javascript:void(0);">     	
             	<img src="<?php if ($this->_var['store']['store_hot_images']): ?><?php echo $this->_var['store']['store_hot_images']; ?> <?php else: ?>/themes/store/default/styles/default/images/sort_icon3.png <?php endif; ?>" />              
            </a>
            </li>
               <?php $_from = $this->_var['store']['store_gcates_image']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'gcategory');if (count($_from)):
    foreach ($_from AS $this->_var['gcategory']):
?>
        		<li><a href="javascript:void(0);">
            
                	<img  src=" <?php if ($this->_var['gcategory']['cate_images']): ?><?php echo $this->_var['gcategory']['cate_images']; ?><?php else: ?>/themes/store/default/styles/default/images/sort_icon3.png<?php endif; ?>" />
            </a> </li>
               <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

        </ul>
    </div>
    <div class="border_line"></div>
    
    
     <?php if ($this->_var['recommended_goods']): ?>
    <div class="blocks">
    	<h2>橱窗推荐</h2>
    	<ul>	
    	  <?php $_from = $this->_var['recommended_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'rgoods');if (count($_from)):
    foreach ($_from AS $this->_var['rgoods']):
?>
        	<li><a href="javascript:void(0);">
        	<img src="<?php echo $this->_var['rgoods']['default_image']; ?>"></a>
        	</li>
        	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        	
        </ul>
    </div>
    <div class="border_line"></div>
     <?php endif; ?>
     
       <?php if ($this->_var['new_goods']): ?>
    <div class="blocks">
    	<h2>新品上市</h2>
    	<ul>
    	 <?php $_from = $this->_var['new_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ngoods');if (count($_from)):
    foreach ($_from AS $this->_var['ngoods']):
?>
        	<li><a href="javascript:void(0);"><img src="<?php echo $this->_var['ngoods']['default_image']; ?>"></a></li>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul>
    </div>
      <?php endif; ?>
</div>
    <div class="footer">
    	<p>
        	<a href="javascript:void(0);">商铺首页</a>|
            <a href="javascript:void(0);">会员中心</a>|
            <a href="#">关于我们</a>
        </p>
        <p>Copyright &copy;2014 </p>
    </div>
   <div class="shade"></div>

</body>
</html>
