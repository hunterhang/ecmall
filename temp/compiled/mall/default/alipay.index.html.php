<?php echo $this->fetch('member.header.html'); ?>
<style>
.borline td {padding:10px 0px;}
.ware_list th {text-align:left;}
</style>

<div class="content">
    <?php echo $this->fetch('member.menu.html'); ?>
    <div id="right">
          
            <div class="wrap">
                <div class="public">
                <form method="post" action="index.php?app=alipay&act=post" enctype="multipart/form-data" id="profile_form">
                    <div class="information">
                     
                        <div class="info individual">
                            <table>
                                
                                <tr>
                                    <th style="text-align:right;">账号余额:</th>
                                    <td><font style="color:red;"><?php echo $this->_var['info']['money']; ?></font>元</td>
                                </tr>
                                <tr>
                                    <th style="text-align:right;">充值金额:</th>
                                    <td><input type="text" class="text width_normal" name="money" value="800" />
                                    充值联系客服</td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>&nbsp;</td>
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
