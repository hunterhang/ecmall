<?php echo $this->fetch('member.header.html'); ?>
<style>
.borline td {padding:10px 0px;}
.ware_list th {text-align:left;}
.information .info th{width:120px;}
.information .info .msg_box{
 border: 1px solid #CCCCCC;
    color: #FF0000;
    padding: 5px;
    position: absolute;
    right: 90px;
    top: 105px;
    width: 300px;
}
.information .info .msg_box2{
 border: 1px solid #CCCCCC;
    color: #FF0000;
    padding: 5px;
    position: absolute;
    right: 90px;
    top: 196px;
    width: 300px;
}
</style>

<div class="content">
    <?php echo $this->fetch('member.menu.html'); ?>
    <div id="right">
          
            <div class="wrap">
                <div class="public">
                <form method="post" enctype="multipart/form-data" id="profile_form">
                    <div class="information">
                     
                        <div class="info individual">
                            <table>
                                
                                <tr>
                                    <th style="text-align:right;"><font style="color:red;">*</font>公共账号名称:</th>
                                    <td><input type="text" class="text width_normal" name="wxname" value="<?php echo $this->_var['wechat']['wxname']; ?>" /></td>
                                </tr>
                                <tr>
                                    <th style="text-align:right;"><font style="color:red;">*</font>微信号:</th>
                                    <td><input type="text" class="text width_normal" name="weixin" value="<?php echo $this->_var['wechat']['weixin']; ?>" /></td>
                                </tr>
                                <tr>
                                    <th style="text-align:right;"><font style="color:red;" >*</font>TOKEN:</th>
                                    <td><input type="text" class="text width_normal" name="token" value="<?php echo $this->_var['wechat']['token']; ?>" /><font style="color:red;" class="msg_box">请使用字母和数字组成,字段长度为6-11，请勿填写中文或全数字,或者其它特殊字符！请认真填写,填写完后不可修改。例：changxiao123</font></td>
                                </tr>
                    <?php if ($this->_var['wechat']): ?>
                          <tr>
                             <th style="text-align:right;">接口URL:</th>
                             <td style="color:red;"><?php echo $this->_var['site_url']; ?>/index.php?app=weixin&token=<?php echo $this->_var['wechat']['token']; ?></td>
                          </tr>
                    <?php else: ?>
                       
                    <?php endif; ?>  
                                <tr>
                                    <th style="text-align:right;"><font style="color:red;" >*</font>微信号类型:</th>
                                    <td>普通微信号<input <?php if ($this->_var['wechat']['wx_type'] == '0'): ?> checked  <?php endif; ?>  checked type="radio"  name="wx_type" value="0" /> &nbsp;&nbsp;高级微信号<input type="radio"  <?php if ($this->_var['wechat']['wx_type'] == '1'): ?> checked  <?php endif; ?>  name="wx_type" value="1" /><font style="color:red;" class="msg_box2">请根据自己的微信号选择类型,否则造成部分功能不能使用。<br><font style="color:blue;">普通微信号</font>:订阅号以及服务号(未开通高级接口)。<font style="color:blue;"><br>高级微信号</font>:服务号并且通过微信认证(含有高级接口)</font></td>
                                </tr>
                            
                             <tr>
                                    <th></th>
                                    <td><input type="submit" class="btn" value="保存修改" /></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </form>
                </div>
                <div class="wrap_bottom"></div>
            </div>

            <div class="clear"></div>
            <div class="adorn_right1"></div>
            <div class="adorn_right2"></div>
            <div class="adorn_right3"></div>
            <div class="adorn_right4"></div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php echo $this->fetch('footer.html'); ?>
