<?php echo $this->fetch('header.html'); ?>
<?php echo $this->fetch('curlocal.html'); ?>
<div class="content">
    <div class="left">
        <div class="module_sidebar">
            <h2><b>文章分类</b></h2>
            <div class="wrap">
                <div class="wrap_child">
                    <div class="classify_list">
                        <ul>
                            <?php $_from = $this->_var['acategories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'acategory');if (count($_from)):
    foreach ($_from AS $this->_var['acategory']):
?>
                            <li><a href="<?php echo url('app=article&cate_id=' . $this->_var['acategory']['cate_id']. ''); ?>"><?php echo htmlspecialchars($this->_var['acategory']['cate_name']); ?></a></li>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <h2><b>最新文章</b></h2>
            <div class="wrap">
                <div class="wrap_child">
                    <div class="side_textlist">
                        <ul>
                            <?php $_from = $this->_var['new_articles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'new_article');if (count($_from)):
    foreach ($_from AS $this->_var['new_article']):
?>
                            <li><a <?php if ($this->_var['new_article']['link']): ?>target="_blank"<?php endif; ?> href="<?php echo url('app=article&act=view&article_id=' . $this->_var['new_article']['article_id']. ''); ?>"><?php echo htmlspecialchars($this->_var['new_article']['title']); ?></a></li>
                            <?php endforeach; else: ?>
                            <li>暂无新文章</li>
                            <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="right">
        <div class="shop_text_list">
            <div class="ornament1"></div>
            <div class="ornament2"></div>
            <table>
                <tr>
                    <th class="align1" colspan="2">
                        <div class="table_title">
                        </div>
                        <div class="top_page">
                            <?php echo $this->fetch('page.top2.html'); ?>
                        </div>
                    </th>
                </tr>
                <?php $_from = $this->_var['articles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'article');if (count($_from)):
    foreach ($_from AS $this->_var['article']):
?>
                <tr>
                    <td><a <?php if ($this->_var['article']['link']): ?>target="_blank"<?php endif; ?> href="<?php echo url('app=article&act=view&article_id=' . $this->_var['article']['article_id']. ''); ?>" class="lebioa"><?php echo htmlspecialchars($this->_var['article']['title']); ?></a></td>
                    <td class="width9"><?php echo local_date("Y-m-d H:i",$this->_var['article']['add_time']); ?></td>
                </tr>
                <?php endforeach; else: ?>
                <tr>
                  <td align="center" colspan="2">没有符合条件的记录</td>
                </tr>
                <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </table>
        </div>

        <?php echo $this->fetch('page.bottom.html'); ?>
    </div>
</div>
<?php echo $this->fetch('footer.html'); ?>