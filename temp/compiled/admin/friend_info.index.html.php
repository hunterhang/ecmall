<?php echo $this->fetch('header.html'); ?>
<div id="rightTop">
  <p>推荐好友详细</p>
  <ul class="subnav">

   
   <li><a class="btn1" href="javascript:history.go(-1);">返回</a></li>
  </ul>
</div>

<div class="mrightTop">
  <div class="fontl">

  </div>
  <div class="fontr"><?php echo $this->fetch('page.top.html'); ?></div>
</div>
<div class="tdare">
  <table width="100%" cellspacing="0" class="dataTable">
    <?php if ($this->_var['friend_info']): ?>
    <tr class="tatr1">
      <td width="20" class="firstCell"><!--<input type="checkbox" class="checkall" />--></td>
      <td>用户ID</td>
      <td>用户名称</td>
       <td>余额</td>
      <td>积分</td>
      <td  class="handler">注册时间</td>
    </tr>
    <?php endif; ?>
    <?php $_from = $this->_var['friend_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'indent');if (count($_from)):
    foreach ($_from AS $this->_var['indent']):
?>
    <tr class="tatr2">
      <td class="firstCell"><?php echo $this->_var['indent']['id']; ?></td>
      <td><?php echo $this->_var['indent']['user_id']; ?></td>
      <td><?php echo $this->_var['indent']['user_name']; ?></td>
      <td><?php echo $this->_var['indent']['money']; ?></td>
      <td><?php echo $this->_var['indent']['jifen']; ?></td>
      <td style="width:150px"  class="handler">
 <?php echo local_date("Y-m-d H:i",$this->_var['indent']['reg_time']); ?>
      </td>
    </tr>
    <?php endforeach; else: ?>
    <tr class="no_data">
      <td colspan="10">没有符合条件的记录</td>
    </tr>
    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </table>

</div>
<?php echo $this->fetch('footer.html'); ?>