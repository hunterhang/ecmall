<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo $this->_var['site_url']; ?>/" />

<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7 charset=<?php echo $this->_var['charset']; ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_var['charset']; ?>" />
<title>资费 - 微信商城,微信商城不开通就晚了</title>
<meta name="author" content="" />
<meta name="generator" content="" />
<meta name="copyright" content="" />
<link href="<?php echo $this->res_base . "/" . 'css/ecmall.css'; ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->res_base . "/" . 'css/new/w_common.css'; ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->res_base . "/" . 'css/new/new.css'; ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->res_base . "/" . 'css/new/price.css'; ?>" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="index.php?act=jslang"></script>
<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/jquery-1.8.0.min.js'; ?>" charset="utf-8"></script>
<?php echo $this->_var['_head_tags']; ?>
<script type="text/javascript" src="http://mallweb.changxiao.cn/js/new/jquery.carouFredSel-6.0.4-packed.js" charset="utf-8"></script>
<script type="text/javascript">
  $(function() {

	  $('#carousel ul').carouFredSel({
		  prev: '#prev',
		  next: '#next',
		  pagination: "#pager",
		  scroll: 1000
	  });

  });
</script>
</head>
<body>

<?php echo $this->fetch('new_headero.html'); ?>
    <div class="auto">
    	<h2 class="price_tit">▌商城会员功能资费表</h2>
        <div class="price_table">
            <table border="0" width="100%" class="price" cellspacing="0">
              <thead>
                <tr>
                    <td class="tip" style="background-color:#F2FCE6;border-bottom:3px solid #4DA94C;">会员等级</td>
                    <td style="background-color:#F2FCE6;border-bottom:3px solid #4DA94C;"><strong>体验版</strong></td>
                    <td style="background-color:#F2FCE6;border-bottom:3px solid #4DA94C;"><strong>基础版</strong></td>
                    <td style="background-color:#F2FCE6;border-bottom:3px solid #4DA94C;"><strong>VIP1</strong></td>
                    <td style="background-color:#F2FCE6;border-bottom:3px solid #4DA94C;"><strong>VIP2</strong></td>
                    <td style="background-color:#F2FCE6;border-bottom:3px solid #4DA94C;"><strong>VIP3</strong></td>
                    <td style="background-color:#F2FCE6;border-bottom:3px solid #4DA94C;"><strong>VIP4</strong></td>
                    <td style="background-color:#F2FCE6;border-bottom:3px solid #4DA94C;"><strong>VIP5</strong></td>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td class="tip">商品管理</td>
                    <td>上传商品10款</td>
                    <td>上传商品25款</td>
                    <td>上传商品50款</td>
                    <td>上传商品300款</td>
                    <td>上传商品500款</td>
                    <td>上传商品800款</td>
                    <td>上传商品1500款</td>
                </tr>
                <tr>
                    <td class="tip">商城模板数</td>
                    <td>1套</td>
                    <td>2套</td>
                    <td>5套</td>
                    <td>10套</td>
                    <td>11套</td>
                    <td>11套</td>
                    <td>11套</td>
                </tr>
                <tr class="prices">
                    <td class="tip">收费标准</td>
                    <td><strong>100</strong>元/月</td>
                    <td><strong>200</strong>元/季度</td>
                    <td><strong>400</strong>元/年</td>
                    <td><strong>800</strong>元/年</td>
                    <td><strong>1200</strong>元/年</td>
                    <td><strong>1800</strong>元/年</td>
                    <td><strong>3000</strong>元/年</td>
                </tr>
                   <!--<tr>
                    <td class="tip" style="background-color:#F2FCE6;border-bottom:3px solid #4DA94C;border-top:3px solid #4DA94C;">互动活动</td>
                    <td style="background-color:#F2FCE6;border-bottom:3px solid #4DA94C;border-top:3px solid #4DA94C;"></td>
                    <td style="background-color:#F2FCE6;border-bottom:3px solid #4DA94C;border-top:3px solid #4DA94C;"></td>
                    <td style="background-color:#F2FCE6;border-bottom:3px solid #4DA94C;border-top:3px solid #4DA94C;"></td>
                    <td style="background-color:#F2FCE6;border-bottom:3px solid #4DA94C;border-top:3px solid #4DA94C;"></td>
                    <td style="background-color:#F2FCE6;border-bottom:3px solid #4DA94C;border-top:3px solid #4DA94C;"></td>
                    <td style="background-color:#F2FCE6;border-bottom:3px solid #4DA94C;border-top:3px solid #4DA94C;"></td>
                    <td style="background-color:#F2FCE6;border-bottom:3px solid #4DA94C;border-top:3px solid #4DA94C;"></td>
                </tr>
                 
                 <tr>
                    <td class="tip">大转盘活动</td>
                    <td><img src="/themes/mall/new/styles/default/images/error.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/error.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/error.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                </tr>
                
                 <tr>
                    <td class="tip">刮刮卡活动</td>
                    <td><img src="/themes/mall/new/styles/default/images/error.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/error.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/error.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                </tr>
                 <tr>
                    <td class="tip">喜翻牌活动</td>
                    <td><img src="/themes/mall/new/styles/default/images/error.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/error.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/error.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                </tr>
                 <tr>
                    <td class="tip">开宝箱活动</td>
                    <td><img src="/themes/mall/new/styles/default/images/error.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/error.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/error.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                </tr>
                 <tr>
                    <td class="tip">砸金蛋活动</td>
                    <td><img src="/themes/mall/new/styles/default/images/error.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/error.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/error.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                </tr>
                
                  <tr>
                    <td class="tip" style="border-bottom:3px solid #4DA94C;">博饼汇活动</td>
                    <td style="border-bottom:3px solid #4DA94C;"><img src="/themes/mall/new/styles/default/images/error.gif" ></td>
                    <td style="border-bottom:3px solid #4DA94C;"><img src="/themes/mall/new/styles/default/images/error.gif"></td>
                    <td style="border-bottom:3px solid #4DA94C;"><img src="/themes/mall/new/styles/default/images/error.gif" ></td>
                    <td style="border-bottom:3px solid #4DA94C;"><img src="/themes/mall/new/styles/default/images/checkbox.gif" ></td>
                    <td style="border-bottom:3px solid #4DA94C;"><img src="/themes/mall/new/styles/default/images/checkbox.gif" ></td>
                    <td style="border-bottom:3px solid #4DA94C;"><img src="/themes/mall/new/styles/default/images/checkbox.gif" ></td>
                    <td style="border-bottom:3px solid #4DA94C;"><img src="/themes/mall/new/styles/default/images/checkbox.gif" ></td>
                </tr>
                <tr>
                    <td class="tip" style="background-color:#F2FCE6;border-bottom:3px solid #4DA94C;">高级功能</td>
                    <td style="background-color:#F2FCE6;border-bottom:3px solid #4DA94C;"></td>
                    <td style="background-color:#F2FCE6;border-bottom:3px solid #4DA94C;"></td>
                    <td style="background-color:#F2FCE6;border-bottom:3px solid #4DA94C;"></td>
                    <td style="background-color:#F2FCE6;border-bottom:3px solid #4DA94C;"></td>
                    <td style="background-color:#F2FCE6;border-bottom:3px solid #4DA94C;"></td>
                    <td style="background-color:#F2FCE6;border-bottom:3px solid #4DA94C;"></td>
                    <td style="background-color:#F2FCE6;border-bottom:3px solid #4DA94C;"></td>
                </tr>
                <tr>
                    <td class="tip">快捷菜单（在线客服&nbsp;&nbsp;&nbsp;一键拨号）</td>
                    <td><img src="/themes/mall/new/styles/default/images/error.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/error.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/error.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                </tr>
                <tr>
                    <td class="tip">团购功能</td>
                    <td><img src="/themes/mall/new/styles/default/images/error.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/error.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/error.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/error.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                </tr>
                 <tr>
                    <td class="tip">拍卖功能</td>
                    <td><img src="/themes/mall/new/styles/default/images/error.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/error.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/error.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/error.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                </tr>
                <tr>
                    <td class="tip">Android安装版APP<img src="/themes/mall/new/styles/default/images/icon_new.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/error.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/error.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/error.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/error.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                </tr>
                <tr>
                    <td class="tip">iphone安装版APP<img src="/themes/mall/new/styles/default/images/icon_new.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/error.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/error.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/error.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/error.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                </tr>
                   <tr>
                    <td class="tip">ipad安装版APP<img src="/themes/mall/new/styles/default/images/icon_new.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/error.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/error.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/error.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/error.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                </tr>-->
                
                
                
                <tr>
                    <td class="tip" style="background-color:#F2FCE6;border-bottom:3px solid #4DA94C;border-top:3px solid #4DA94C;">基础功能</td>
                    <td style="background-color:#F2FCE6;border-bottom:3px solid #4DA94C;border-top:3px solid #4DA94C;"></td>
                    <td style="background-color:#F2FCE6;border-bottom:3px solid #4DA94C;border-top:3px solid #4DA94C;"></td>
                    <td style="background-color:#F2FCE6;border-bottom:3px solid #4DA94C;border-top:3px solid #4DA94C;"></td>
                    <td style="background-color:#F2FCE6;border-bottom:3px solid #4DA94C;border-top:3px solid #4DA94C;"></td>
                    <td style="background-color:#F2FCE6;border-bottom:3px solid #4DA94C;border-top:3px solid #4DA94C;"></td>
                    <td style="background-color:#F2FCE6;border-bottom:3px solid #4DA94C;border-top:3px solid #4DA94C;"></td>
                    <td style="background-color:#F2FCE6;border-bottom:3px solid #4DA94C;border-top:3px solid #4DA94C;"></td>
                </tr>
                <tr>
                	<td class="tip">订单管理</td>
                	<td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                </tr>
                <tr>
                	<td class="tip">商城管理</td>
                	<td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                </tr>
                <tr>
                	<td class="tip">支付管理</td>
                	<td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                </tr>
                <tr>
                	<td class="tip">配送管理</td>
                	<td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                </tr>
                <tr>
                	<td class="tip">文章管理</td>
                	<td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                </tr>
                <tr>
                	<td class="tip">广告管理</td>
                	<td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                </tr>
                <tr>
                	<td class="tip">淘宝产品导入</td>
                	<td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                </tr>
                <tr>
                	<td class="tip">自定义菜单</td>
                	<td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                    <td><img src="/themes/mall/new/styles/default/images/checkbox.gif"></td>
                </tr>
              </tbody>
          </table>
          <ul class="reminder">
    <li>微商城为自助式平台，用户可自己操作完成，即时开通;</li>
    <li>VIP等级可随时提升，补差价即可;</li>
   <!-- <li>不同VIP等级商城功能是一致的，主要是产品发布数及模板数不同。</li>-->
   <li>VIP2以上含有高级模板(含VIP2)。</li>
</ul>
        </div>
    	<h2 class="price_tit">▌多套商城模板任你选</h2>
        <div style="background:#f5f5f5; overflow:hidden;border:#E2E2E2 solid 1px;">
            <div id="carousel" class="muban">
                  <ul>
                      <li><a href="javascript:;"><img src="/mall/mb1.jpg"/></a></li>
                      <li><a href="javascript:;"><img src="/mall/mb2.jpg"/></a></li>
                      <li><a href="javascript:;"><img src="/mall/mb3.jpg"/></a></li>
                      <li><a href="javascript:;"><img src="/mall/mb4.jpg"/></a></li>
                      <li><a href="javascript:;"><img src="/mall/mb5.jpg"/></a></li>
                      <li><a href="javascript:;"><img src="/mall/mb1.jpg"/></a></li>				
                  </ul>
                  <div class="clearfix"></div>
                  <a id="prev" class="prev" href="#"> < </a>
                  <a id="next" class="next" href="#"> > </a>
            </div>
        </div>
        <h2 class="price_tit">▌功能演示操作流程</h2>
        <div style="background:#f5f5f5; overflow:hidden;border:#E2E2E2 solid 1px;">
        	<img src="/mall/buzou.jpg" />
        </div>
    </div>

    <?php echo $this->fetch('new_footero.html'); ?>

</body>
</html>

