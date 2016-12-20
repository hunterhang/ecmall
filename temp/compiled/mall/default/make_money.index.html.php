<?php echo $this->fetch('member.header.html'); ?>
<style type="text/css">
.user_name {position: relative; bottom: 18px; margin-left:5px;}
.msgWrap {
    border-top: 1px solid #EEEEEE;
    line-height: 24px;
}
.msgWrap h3 {
    color: #333333;
    font-size: 14px;
    font-weight: bold;
    line-height: 30px;
    padding: 10px 0;
}
.msgWrap p {
    font-size: 14px;
    line-height: 30px;
}
.msgWrap  .textarea {
    border: 1px solid #CCCCCC;
    color: #999999;
    float: left;
    line-height: 20px;
    margin-top: 5px;
    padding: 5px;
    resize: none;
    width: 500px;
}
.table td{padding:2px 0;}
</style>
<div class="content">
    <div class="totline"></div><div class="botline"></div>
    <?php echo $this->fetch('member.menu.html'); ?>
    <div id="right">
        <?php echo $this->fetch('make_money.submenu.html'); ?>
        <div class="msgWrap">

            <div class="table">
             <div class="information">
             <div class="info individual">
                          <table>
                                <tr>
                                    <td><h3><font style="color:red;">我的积分：<?php echo $this->_var['info']['jifen']; ?></font><span style="color:#666; font-size:12px; margin-left:20px;">(积分可兑换现金，1积分=1元，满百可提现</span></h3>
                                    </td>
                                </tr> 
                                <tr>     
                                    <td>方式一：邀请好友注册并充值</td>
                                </tr>
                                <tr>
                                    <td>通过您的专属邀请链接推荐1名好友注册并充值，该好友充值金额返回25%</td>
                                </tr>
                                <tr>
                                    <td><font style="color:red;">窍门1：</font>将微信商城分享给你的微博好友 </td>
                                </tr>
                                 <tr>
                                    <td><div id="msg" class="textarea" style="color:#999; height:60px;">微信商城，让你的微信公众号无所不能！微网站，微信会员卡，微商城，微团购，微信自定义菜单，优惠券，刮刮卡，大转盘抽奖，开宝箱，砸金蛋。微信营销管理平台,免费注册，限时体验中！，限时体验中！<?php echo $this->_var['site_url']; ?>/index.php?app=member&act=register&t=<?php echo $this->_var['user_id']; ?></div></td>
                                </tr>
                                  <tr>
                                    <td>请不要更改自己的邀请链接，以免无法获得积分奖励  </td>
                                </tr>
                                <tr>
                                <td>  <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare" data="{'url':<?php echo $this->_var['site_url']; ?>/index.php?app=member&act=register&t=<?php echo $this->_var['user_id']; ?>">
                    <span class="bds_more">分享到：</span>
                    <a class="bds_qzone"></a>
                    <a class="bds_tsina"></a>
                    <a class="bds_tqq"></a>
                    <a class="bds_renren"></a>
                    <a class="bds_t163"></a>
                    </div>
                    <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6847210" ></script>
                    <script type="text/javascript" id="bdshell_js"></script>
                    <script type="text/javascript">
   
					var aaa = document.getElementById('msg').innerHTML;
                    aaa = aaa.replace("amp;","");
                    aaa = aaa.replace("amp;","");
					
                    var bds_config = {
                    'comment':aaa,//顶部评论
                    'bdText':aaa,//中间内容
                    'bdDesc':aaa, //底下摘要
                    'bdPic':SITE_URL+'/themes/mall/default/styles/default/images/logo.jpg'//图片
                    //'bdComment':document.getElementById('msg').innerHTML
                    };
                    document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
                    </script></td>
                                </tr>
                                 <tr>
                                    <td><font style="color:red;">窍门2：</font>将您的专用邀请链接通过QQ或MSN发送给好友 </td>
                                </tr>
                                 <tr>
                                    <td><div class="textarea" style="color:#999;height:60px;">微信商城，让你的微信公众号无所不能！微网站，微信会员卡，微商城，微团购，微信自定义菜单，优惠券，刮刮卡，大转盘抽奖，开宝箱，砸金蛋。微信营销管理平台,免费注册，限时体验中！<?php echo $this->_var['site_url']; ?>/index.php?app=member&act=register&t=<?php echo $this->_var['user_id']; ?></div></td>
                                </tr>
                                <tr>
                                <td>还可以将专用邀请链接贴到QQ签名、论坛签名等位置让更多的好友看到 </td>
                                </tr>
                           </table>
                </div>
              </div>
            </div>
        </div>
        <div class="clear"></div>
        <div class="adorn_right1"></div>
        <div class="adorn_right2"></div>
        <div class="adorn_right3"></div>
        <div class="adorn_right4"></div>
    </div>
    <div class="clear"></div>
</div>
<div class="clear"></div>
<iframe id='iframe_post' name="iframe_post" frameborder="0" width="0" height="0">
</iframe>
<?php echo $this->fetch('footer.html'); ?>
