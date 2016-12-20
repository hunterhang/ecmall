<?php echo $this->fetch('header.html'); ?>
<div id="rightTop">
  <p>用户充值</p>
  <ul class="subnav">
    <li><span>管理</span></li>
   <!-- <li><a class="btn1" href="index.php?app=user&amp;act=add">新增</a></li>-->
  </ul>
</div>

<div class="mrightTop">
  <div class="fontl">
    <form method="get">
       <div class="left">
          <input type="hidden" name="app" value="indent" />
          <input type="hidden" name="act" value="index" />
        会员名:
          <input class="queryInput" type="text" name="user_name" value="<?php echo htmlspecialchars($_GET['user_name']); ?>" />
         状态:
          <select class="querySelect" name="status"><?php echo $this->html_options(array('options'=>$this->_var['status_options'],'selected'=>$_GET['status'])); ?>
          </select>
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
      <td width="20" class="firstCell"><input type="checkbox" class="checkall" /></td>
      <td>订单名称</td>
      <td><span ectype="order_by" fieldname="user_name">充值用户</span></td>
      <td>订单号</td>
      <td><span ectype="order_by" fieldname="money">金额</span></td>
      <td><span ectype="order_by" fieldname="add_time">充值时间</span></td>
      <td><span ectype="order_by" fieldname="status">状态</span></td>
      <td class="handler">操作</td>
    </tr>
    <?php endif; ?>
    <?php $_from = $this->_var['indents']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'indent');if (count($_from)):
    foreach ($_from AS $this->_var['indent']):
?>
    <tr class="tatr2">
      <td class="firstCell"><input type="checkbox" class="checkitem" value="<?php echo $this->_var['indent']['id']; ?>" /></td>
      <td><?php echo $this->_var['indent']['title']; ?></td>
      <td><?php echo $this->_var['indent']['user_name']; ?></td>
      <td><?php echo $this->_var['indent']['out_trade_no']; ?></td>
      <td><?php echo $this->_var['indent']['money']; ?></td>
      <td><?php echo local_date("Y-m-d H:i:s",$this->_var['indent']['add_time']); ?></td>
      <td> 
       <?php if ($this->_var['indent']['status'] == 0): ?>
       <font style="color:red;">未付款</font>
       <?php elseif ($this->_var['indent']['status'] == 1): ?>
        <font style="color:blue;"> 已付款,待确认</font>
       <?php elseif ($this->_var['indent']['status'] == 2): ?>
         <font style="color:green;">完成</font>
       <?php endif; ?>
      </td>
      <td class="handler">
      <span style="width: 100px">
          <?php if ($this->_var['indent']['status'] == 0): ?>
          <a href="javascript:drop_confirm('是否确定入金?', 'index.php?app=indent&amp;act=sents&amp;user_id=<?php echo $this->_var['indent']['user_id']; ?>&amp;money=<?php echo $this->_var['indent']['money']; ?>&amp;id=<?php echo $this->_var['indent']['id']; ?>');">入金</a>|
       <?php elseif ($this->_var['indent']['status'] == 1): ?>
       <a href="javascript:drop_confirm('是否已经确定?', 'index.php?app=indent&amp;act=sent&amp;user_id=<?php echo $this->_var['indent']['user_id']; ?>&amp;id=<?php echo $this->_var['indent']['id']; ?>');">待确认</a>|
       <?php elseif ($this->_var['indent']['status'] == 2): ?>
        完成|
       <?php endif; ?>
      <a href="javascript:drop_confirm('是否删除该条充值记录?', 'index.php?app=indent&amp;act=drop&amp;id=<?php echo $this->_var['indent']['id']; ?>');">删除</a>
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
      <input class="formbtn batchButton" type="button" value="删除" name="id" uri="index.php?app=indent&act=drop" presubmit="confirm('您确定要删除它吗？');" />
    </div>
    <div class="pageLinks"><?php echo $this->fetch('page.bottom.html'); ?></div>
    <div class="clear"></div>
  </div>
  <?php endif; ?>
</div>
<?php echo $this->fetch('footer.html'); ?>