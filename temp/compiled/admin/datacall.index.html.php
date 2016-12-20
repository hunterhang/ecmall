<?php echo $this->fetch('header.html'); ?>
<div id="rightTop">
    <p>数据调用</p>
    <ul class="subnav">
        <li><span>管理</span></li>
        <li><a class="btn3" href="index.php?module=datacall&amp;act=add">新增商品调用</a></li>
    </ul>
</div>

<div class="tdare">
    <table width="100%" cellspacing="0" class="dataTable">
        <?php if ($this->_var['data']): ?>
        <tr class="tatr1">
            <td width="20" class="firstCell"><input id="checkall_1" type="checkbox" class="checkall"/></td>
            <td>数据调用描述</td>
            <td>所属类型</td>
            <td class="handler">操作</td>
        </tr>
        <?php endif; ?>
        <?php $_from = $this->_var['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'val');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['val']):
?>
        <tr class="tatr2">
            <td width="20" class="firstCell">
            <input type="checkbox" class="checkitem" value="<?php echo $this->_var['key']; ?>" />
            </td>
            <td><?php echo htmlspecialchars($this->_var['val']['description']); ?></td>
            <td class="table_center"><?php if ($this->_var['val']['type'] == 'goods'): ?>商品数据<?php endif; ?></td>
            <td class="handler">
            <a href="index.php?module=datacall&amp;act=edit&amp;id=<?php echo $this->_var['key']; ?>">编辑</a>
                |
                <a href="javascript:if(confirm('您确定要删除它吗？'))window.location = 'index.php?module=datacall&amp;act=drop&amp;id=<?php echo $this->_var['key']; ?>';">删除</a>  </td>
        </tr>
        <?php endforeach; else: ?>
        <tr class="no_data">
            <td colspan="4">没有符合条件的记录</td>
        </tr>
        <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <tfoot>
            <tr>
            <?php if ($this->_var['data']): ?>
                <td width="20" class="firstCell"><label for="checkall1"><input id="checkall_2" type="checkbox" class="checkall"></label></td>
                <td colspan="3" id="batchAction">
                    <span class="all_checkbox"><label for="checkall_2">全选</label></span>&nbsp;&nbsp;
                    <input class="formbtn batchButton" type="button" value="删除" name="id" uri="index.php?module=datacall&act=drop" presubmit="confirm('您确定要删除它吗？');" />
                </td>
            <?php endif; ?>
            </tr>
        </tfoot>
    </table>

</div>
<?php echo $this->fetch('footer.html'); ?>