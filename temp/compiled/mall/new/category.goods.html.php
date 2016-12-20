<?php echo $this->fetch('header.html'); ?>
<?php echo $this->fetch('curlocal.html'); ?>
<div class="content">
    <div class="commodity_assort">
        <div class="module_sidebar">
            <h2><b class="category" title="CATEGORY商品分类"></b></h2>
            <div class="wrap">
                <div class="wrap_child">
                    <div class="recommend">
                        <dl class="shop_assort">
                            <?php $_from = $this->_var['gcategorys']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'gcategory');if (count($_from)):
    foreach ($_from AS $this->_var['gcategory']):
?>
                            <dt class="bg_color1"><a href="<?php echo url('app=search&cate_id=' . $this->_var['gcategory']['id']. ''); ?>"><?php echo htmlspecialchars($this->_var['gcategory']['value']); ?></a></dt>
                            <dd>
                                <?php $_from = $this->_var['gcategory']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');if (count($_from)):
    foreach ($_from AS $this->_var['child']):
?>
                                <a href="<?php echo url('app=search&cate_id=' . $this->_var['child']['id']. ''); ?>"><?php echo htmlspecialchars($this->_var['child']['value']); ?></a>
                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            </dd>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ad_sidebar_list" area="right" widget_type="area">
        <?php $this->display_widgets(array('page'=>'gcategory','area'=>'right')); ?>
    </div>
</div>
<?php echo $this->fetch('footer.html'); ?>