<?php echo $this->fetch('member.header.html'); ?>
<style>
.borline td {padding:10px 0px;}
.ware_list th {text-align:left;}

*{margin:0; padding:0;}
.fare{border-collapse: collapse; font-size:12px;width: 768px;margin: 0 auto;padding: 30px 0;overflow: hidden; border-bottom:1px solid #DCDCDC;}
.fare th{border-top: 1px solid #DCDCDC;color: #333;width: 145px;padding:10px 0;}
.fare td{border-top: 1px solid #DCDCDC;color: #A1A1A1;padding:10px 0;}
.fare td span{color:#333;}
.fare td strong{color: #F97429; font-weight:normal;}
.alipay_btn_bg{	
	background:-webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #fff), color-stop(100%, #e7e7e7));
	background:-webkit-linear-gradient(top, #fff, #e7e7e7);
	background:-moz-linear-gradient(top, #fff, #e7e7e7);
	background:-ms-linear-gradient(top, #fff, #e7e7e7);
	background:-o-linear-gradient(top, #fff, #e7e7e7);
	background:linear-gradient(top, #fff, #e7e7e7);
	width:210px;height:55px;border:#ccc solid 1px;border-radius:5px;
	over-flow:hidden;
}
</style>

<script>
function checked()
{
	$('#money').val($('#grade_'+$('#grade_id').val()).val());
}

</script>

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
                                
                                
                                  <!--<tr>
                                    <th style="text-align:right;">选择会员等级:</th>
                                    <td>
                                    <select id='grade_id' name="grade_id" class="text width_normal" onchange="checked();">
                                    <option value="0">
                                    ----请选择vip等级----
                                    </option>
                                      <?php $_from = $this->_var['sgrades']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'sgrade');$this->_foreach['fe_sgrade'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_sgrade']['total'] > 0):
    foreach ($_from AS $this->_var['sgrade']):
        $this->_foreach['fe_sgrade']['iteration']++;
?>
                                  <option value="<?php echo $this->_var['sgrade']['grade_id']; ?>" >
                                 <?php echo htmlspecialchars($this->_var['sgrade']['grade_name']); ?>
                                    </option>
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    </select>&nbsp;请选择要充值的vip等级</td>
                                </tr>
                                 <input type="hidden" id='grade_0' value="">
                                    <?php $_from = $this->_var['sgrades']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'sgrade');$this->_foreach['fe_sgrade'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_sgrade']['total'] > 0):
    foreach ($_from AS $this->_var['sgrade']):
        $this->_foreach['fe_sgrade']['iteration']++;
?>
                                       <input type="hidden" id='grade_<?php echo $this->_var['sgrade']['grade_id']; ?>' value="<?php echo $this->_var['sgrade']['price']; ?>">
                              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                -->
                                
                                <tr>
                                    <th style="text-align:right;">充值金额:</th>
                                    <td><input type="text" class="text width_normal" id='money' name="money" value="" /></td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td><div class="alipay_btn_bg"><button  style="color:#3E3E3E;text-align:center; text-align:center; background:url(<?php echo $this->res_base . "/" . 'images/alipay.png'; ?>) no-repeat 5px center; border:none;  padding: 17px 15px 17px 60px; cursor:pointer; font-size:16px;" type="submit">支付宝充值到余额</button></div><!--<input type="submit" class="btn" value="确定充值" />--></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <input value="alipay" type="hidden" name="alipay">
                </form>
                <!--<table class="fare">
	<tbody>
	<tr><h3 style="padding:0 70px;">商城会员VIP价格详细表</h3><br></tr>
	  <?php $_from = $this->_var['sgrades']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'sgrade');$this->_foreach['fe_sgrade'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_sgrade']['total'] > 0):
    foreach ($_from AS $this->_var['sgrade']):
        $this->_foreach['fe_sgrade']['iteration']++;
?>
    	<tr>
        	<th><?php echo htmlspecialchars($this->_var['sgrade']['grade_name']); ?></th>
            <td>
            	商品发布位:<span> <?php echo $this->_var['sgrade']['goods_limit']; ?> 个</span>
            	<br />
                商城模板数: <span> <?php echo $this->_var['sgrade']['skin_limit']; ?> 套</span>
                <br />
                收&nbsp;费&nbsp;标&nbsp;准:<strong> <?php echo $this->_var['sgrade']['charge']; ?></strong>
            </td>
            <td>
            	<?php if ($this->_var['sgrade'] [ 'dnum' ] > 0): ?>
                	淘宝商品导入:<span> 支持</span>
                    <br/>
                <?php else: ?>
                	&nbsp;
                <?php endif; ?>
            	<?php if ($this->_var['sgrade'] [ 'dnum' ] > 1): ?>
                	微信互动功能:<span> 6 种</span>
                <?php else: ?>
                	&nbsp;
                <?php endif; ?>
            </td>
            <td>
            	<?php if ($this->_var['sgrade'] [ 'dnum' ] > 2): ?>
                    团购功能:<span> 支持</span>
                    <br/>
                      拍卖功能:<span> 支持</span>
                    <br/>
                    独立手机APP生成:<span> 支持</span>
                <?php else: ?>
                	&nbsp;
                <?php endif; ?>
            </td>
        </tr>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
       
    </tbody>
</table>-->
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
