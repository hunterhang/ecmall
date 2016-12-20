<?php echo $this->fetch('header.html'); ?>
<div id="rightTop">
  <p>用户提现</p>
  <ul class="subnav">
    <li><span>管理</span></li>
   <!-- <li><a class="btn1" href="index.php?app=user&amp;act=add">新增</a></li>-->
  </ul>
</div>

<div class="mrightTop">
  <div class="fontl">
    <form method="get">
       <div class="left">
          <input type="hidden" name="app" value="jifen" />
          <input type="hidden" name="act" value="index" />
        会员名:
          <input class="queryInput" type="text" name="user_name" value="<?php echo htmlspecialchars($_GET['user_name']); ?>" />
          <input type="submit" class="formbtn" value="查询" />
      </div>
      <?php if ($this->_var['filtered']): ?>
      <a class="left formbtn1" href="index.php?app=indent">撤销检索</a>
      <?php endif; ?>
    </form>
  </div>
  <div class="fontr"><?php echo $this->fetch('page.top.html'); ?></div>
</div>
<div class="tdare">
  <table width="100%" cellspacing="0" class="dataTable">
    <?php if ($this->_var['indents']): ?>
    <tr class="tatr1">
      <td width="20" class="firstCell"><!--<input type="checkbox" class="checkall" />--></td>
      <td>用户ID</td>
      <td>用户名称</td>
      <td>积分</td>
      <td>推荐的好友</td>
      <td>好友充值记录</span></td>
      <td class="handler">操作</td>
    </tr>
    <?php endif; ?>
    <?php $_from = $this->_var['indents']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'indent');if (count($_from)):
    foreach ($_from AS $this->_var['indent']):
?>
    <tr class="tatr2">
      <td class="firstCell"><?php echo $this->_var['indent']['id']; ?></td>
      <td><?php echo $this->_var['indent']['user_id']; ?></td>
      <td><?php echo $this->_var['indent']['user_name']; ?></td>
      <td><?php echo $this->_var['indent']['jifen']; ?></td>
      <td><a href="index.php?app=indent&amp;act=friend_info&amp;user_id=<?php echo $this->_var['indent']['user_id']; ?>">好友详细</a></td>
      <td><a href="index.php?app=indent&amp;act=alipay_info&amp;user_id=<?php echo $this->_var['indent']['user_id']; ?>">充值记录</a></td>
      <td class="handler">
      <span style="width: 100px">
          <?php if ($this->_var['indent']['jifen'] > 0): ?>
         <a href="index.php?app=indent&amp;act=get_jifen&amp;user_id=<?php echo $this->_var['indent']['user_id']; ?>">提现</a>
       <?php elseif ($this->_var['indent']['status'] == 0): ?>
       提现
       <?php endif; ?>

      </span>
      </td>
    </tr>
    <?php endforeach; else: ?>
    <tr class="no_data">
      <td colspan="10">没有符合条件的记录</td>
    </tr>
    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </table>
  <?php if ($this->_var['indents']): ?>
  <div id="dataFuncs">
    <div id="batchAction" class="left paddingT15"> &nbsp;&nbsp;
    
    </div>
    <div class="pageLinks"><?php echo $this->fetch('page.bottom.html'); ?></div>
    <div class="clear"></div>
  </div>
  <?php endif; ?>
</div>
<?php echo $this->fetch('footer.html'); ?>