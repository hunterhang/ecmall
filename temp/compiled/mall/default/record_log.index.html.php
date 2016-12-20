<?php echo $this->fetch('member.header.html'); ?>
<div class="content">
    <div class="totline"></div><div class="botline"></div>
    <?php echo $this->fetch('member.menu.html'); ?>
    <div id="right">

          <?php echo $this->fetch('make_money.submenu.html'); ?>

        <div class="wrap">
           

            <div class="public table">
                <table class="table_head_line">
                    <?php if ($this->_var['tuijian_logs']): ?>
                    <tr class="line_bold">
                        <th colspan="4"></th>
                    </tr>
                    <tr class="line tr_color">
                        <th>好友名称</th>
                        <th class="width3">充值的金额</th>
                         <th class="width3">返还的积分</th>
                          <th class="width3">充值时间</th>
                    </tr>
                    <?php endif; ?>
                    <?php $_from = $this->_var['tuijian_logs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'tuijian_log');if (count($_from)):
    foreach ($_from AS $this->_var['tuijian_log']):
?>
                    <tr class="line tr_align">
                        <td><?php echo $this->_var['tuijian_log']['user_name']; ?></td>
                         <td><?php echo $this->_var['tuijian_log']['price']; ?></td>
                          <td><?php echo $this->_var['tuijian_log']['jifen']; ?></td>
                        <td><?php echo local_date("Y-m-d H:i",$this->_var['tuijian_log']['add_time']); ?></td>
                    </tr>
                    <?php endforeach; else: ?>
                    <tr>
                        <td colspan="4" class="member_no_records padding6">对不起您推荐的好友还没充值，<a href="index.php?app=make_money">点击去推荐吧.</a></td>
                    </tr>
                    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </table>
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
<iframe id='iframe_post' name="iframe_post" frameborder="0" width="0" height="0">
</iframe>
<?php echo $this->fetch('footer.html'); ?>
