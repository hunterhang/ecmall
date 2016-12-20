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
        <div class="article_wrap">
            <div class="article_con">
                <h1><?php echo htmlspecialchars($this->_var['article']['title']); ?></h1>
                <h2><?php echo local_date("Y-m-d H:i",$this->_var['article']['add_time']); ?></h2>
                <div class="default">
                    <?php if ($this->_var['article']['store_id']): ?>
                    <?php echo html_filter($this->_var['article']['content']); ?>
                    <?php else: ?>
                    <?php echo $this->_var['article']['content']; ?>
                    <?php endif; ?>
                </div>

                <div class="more_article">
                    <h3>上一篇: <?php if ($this->_var['pre_article']): ?><a target="<?php echo $this->_var['pre_article']['target']; ?>" href="<?php echo url('app=article&act=view&article_id=' . $this->_var['pre_article']['article_id']. ''); ?>"><?php echo htmlspecialchars($this->_var['pre_article']['title']); ?></a> <span><?php echo local_date("Y-m-d H:i",$this->_var['pre_article']['add_time']); ?></span><?php else: ?>没有符合条件的记录<?php endif; ?></h3>
                    <h3>下一篇: <?php if ($this->_var['next_article']): ?><a target="<?php echo $this->_var['next_article']['target']; ?>" href="<?php echo url('app=article&act=view&article_id=' . $this->_var['next_article']['article_id']. ''); ?>"><?php echo htmlspecialchars($this->_var['next_article']['title']); ?></a> <span><?php echo local_date("Y-m-d H:i",$this->_var['next_article']['add_time']); ?></span><?php else: ?>没有符合条件的记录<?php endif; ?></h3>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->fetch('footer.html'); ?>