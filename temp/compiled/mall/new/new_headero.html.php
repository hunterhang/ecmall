
<script type="text/javascript" src="index.php?act=jslang"></script>

 <!--<div class="topbar">
	<div class="auto">
		<a href="index.php"><img src="<?php echo $this->res_base . "/" . 'images/new/cxlogo.png'; ?> " />— 微信商城专业技术服务接入</a>
    </div>
</div>-->
<div>
<div class="header_bg">
	<div class="header auto">
        <a href="index.php"" class="logo"><img title="<?php echo $this->_var['site_title']; ?>" src="<?php echo $this->_var['site_logo']; ?>"></a>
        <div class="headerLinks">
            小畅客服：<a href="http://wpa.qq.com/msgrd?v=3&uin=10086&site=qq&menu=yes" target="_blank"><img style="margin-right:10px;" title="联系微信商城" alt="联系微信商城" src="<?php echo $this->res_base . "/" . 'images/pa_002.gif'; ?>" border="0"></a>
            问题解答：<a href="http://wpa.qq.com/msgrd?v=3&uin=10086&site=qq&menu=yes" target="_blank"><img style="margin-right:10px;" title="联系微信商城" alt="联系微信商城" src="<?php echo $this->res_base . "/" . 'images/pa.gif'; ?>" border="0"></a>
            
        </div>
    </div>
</div>
</div>
<div class="nav">
    <ul class="auto">     
    
      
            <form class="login_panel" action="<?php echo url('app=member&act=login'); ?>" method="post">
            	<li class="menu_li">用户名：<input type="text" class="l_text" name="user_name"/></li>
            	<li class="menu_li">密码：<input type="password"  class="l_text" name="password"/></li>
            	<li class="menu_li"><input type="submit" value="登录" class="lr_btn"/><input onclick="window.location.href='<?php echo url('app=member&act=register&ret_url=' . $this->_var['ret_url']. ''); ?>';" type="button" value="注册" class="lr_btn"/></li>
        	</form>
        
           <li class="menu_li logined">欢迎您！
              <a href="<?php echo url('app=member'); ?>"><?php echo htmlspecialchars($this->_var['visitor']['user_name']); ?></a>
              <a href="<?php echo url('app=member'); ?>">管理中心</a>
                  <a href="<?php echo url('app=apply'); ?>">申请入驻</a>
              <a href="<?php echo url('app=member&act=logout'); ?>">退出</a>
           </li>
        
         
    </ul>
</div>



       