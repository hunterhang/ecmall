<script type="text/javascript">
<!--//<![CDATA[
$(function(){
    <?php echo $this->_var['payment']['onconfig']; ?>
});
//]]>-->
</script>
<ul class="tab">
    <li class="active"><?php if ($_GET['act'] == config): ?>配置支付方式<?php else: ?>安装支付方式<?php endif; ?></li>
</ul>
<div class="eject_con">
<?php if ($_GET['code'] == 'alipay'): ?>
	<div class="tan_btn">
    	<a target="_blank" href="http://jingyan.baidu.com/article/27fa7326f52aa746f9271f6d.html">支付宝邮箱绑定教程</a>
    </div>
    <?php endif; ?>
    <div class="info_table_wrap">
        <form method="post" action="index.php?app=my_payment&amp;act=<?php echo $_GET['act']; ?>&amp;code=<?php echo $_GET['code']; ?>&amp;payment_id=<?php echo $_GET['payment_id']; ?>" target="my_payment">
        <ul class="info_table">
            <li>
                <h4>名称:</h4>
                <p class="new_style"><?php echo htmlspecialchars($this->_var['payment']['name']); ?></p>
            </li>
           <li>
                <h4>简介</h4>
                <p><textarea class="text" name="payment_desc"><?php echo htmlspecialchars($this->_var['payment']['payment_desc']); ?></textarea><span>该信息将在用户下单时被看到</span></p>
            </li>
             <?php if ($_GET['code'] == 'cod'): ?>
            <li><h4></h4><p><a target="_blank" href="index.php?app=my_shipping" style="color:#39BAEA;">点击去设置货到付款地区</a></p></li>
            <?php endif; ?>
            <?php if ($_GET['code'] == 'bank'): ?>
            <li>
                <h4>图片链接:</h4>
                <p>
                    <input name="bank_images" value="<?php echo $this->_var['payment']['bank_images']; ?>" type="text" style="width:200px;" ><font style="color:red;">可不填,用于填写资质证明链接,提高信用度。</font>
                </p>
            </li>
            <?php endif; ?>
            <li>
                <h4>启用:</h4>
                <p>
                     <?php echo $this->html_radios(array('options'=>$this->_var['yes_or_no'],'checked'=>$this->_var['payment']['enabled'],'name'=>'enabled')); ?>
                </p>
            </li>
            <li>
                <h4>排序:</h4>
                <p><input type="text" class="text width2" value="<?php echo $this->_var['payment']['sort_order']; ?>" name="sort_order"/><font>数字越小,用户选择付款方式时排越前面。</font></p>
            </li>
            <?php $_from = $this->_var['payment']['config']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('conf', 'info');if (count($_from)):
    foreach ($_from AS $this->_var['conf'] => $this->_var['info']):
?>
            
            <?php if ($this->_var['conf'] != 'alipay_key' && $this->_var['conf'] != 'alipay_partner' && $this->_var['conf'] != 'alipay_service'): ?>
            
            <li>
                <h4><?php echo $this->_var['info']['text']; ?>:</h4>
                <p><?php if ($this->_var['info']['type'] == 'text'): ?> 
                <input type="text" name="config[<?php echo $this->_var['conf']; ?>]" id="ctrl_<?php echo $this->_var['conf']; ?>" value="<?php echo $this->_var['config'][$this->_var['conf']]; ?>" size="<?php echo $this->_var['info']['size']; ?>" onfocus="<?php echo $this->_var['info']['onfocus']; ?>" onchange="<?php echo $this->_var['info']['onchange']; ?>" onblur="<?php echo $this->_var['info']['onblur']; ?>" class="text"/>
                <?php elseif ($this->_var['info']['type'] == 'select'): ?>
                <select name="config[<?php echo $this->_var['conf']; ?>]" id="ctrl_<?php echo $this->_var['conf']; ?>" onchange="<?php echo $this->_var['info']['onchange']; ?>" class="width8 padding4">
                       <?php echo $this->html_options(array('options'=>$this->_var['info']['items'],'selected'=>$this->_var['config'][$this->_var['conf']])); ?>
                 </select>
                 <?php elseif ($this->_var['info']['type'] == 'textarea'): ?>
                 <textarea cols="<?php echo $this->_var['info']['cols']; ?>" rows="<?php echo $this->_var['info']['rows']; ?>" name="config[<?php echo $this->_var['conf']; ?>]" id="ctrl_<?php echo $this->_var['conf']; ?>" onfocus="<?php echo $this->_var['info']['onfocus']; ?>" onchange="<?php echo $this->_var['info']['onchange']; ?>" onblur="<?php echo $this->_var['info']['onblur']; ?>" class="text" ><?php echo $this->_var['config'][$this->_var['conf']]; ?></textarea>
                 <?php elseif ($this->_var['info']['type'] == 'radio'): ?>
                       <?php echo $this->html_radios(array('options'=>$this->_var['info']['items'],'checked'=>$this->_var['config'][$this->_var['conf']],'name'=>$this->_var['info']['name'])); ?>
                 <?php elseif ($this->_var['info']['type'] == 'checkbox'): ?>
                    <?php echo $this->html_checkbox(array('options'=>$this->_var['info']['items'],'checked'=>$this->_var['config'][$this->_var['conf']],'name'=>$this->_var['info']['name'])); ?>
                 <?php endif; ?>
                 <span><?php echo $this->_var['info']['desc']; ?></span>
                 </p>
            </li>
            <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            <?php if ($this->_var['payment']['is_online']): ?>
            <li>
                <h4>区别码:</h4>
                <p><input type="text" name="config[pcode]" value="<?php echo $this->_var['config']['pcode']; ?>" size="3" class="text" /><span>正常情况下可留空，仅当支付时频繁出错时使用</span></p>
            </li>
            <?php endif; ?>
        </ul>
        <div class="submit"><input type="submit" class="btn" value="提交" /></div>
        </form>
    </div>
</div>