<?php echo $this->fetch('header.html'); ?>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'search_goods.js'; ?>" charset="utf-8"></script>
<script type="text/javascript">
var upimg   = '<?php echo $this->res_base . "/" . 'images/up.gif'; ?>';
var downimg = '<?php echo $this->res_base . "/" . 'images/down.gif'; ?>';
imgUping = new Image();
imgUping.src = upimg;
</script>

<?php echo $this->fetch('curlocal.html'); ?>
<div class="content">
    <?php if ($this->_var['goods_list']): ?>
    <div class="left">
        <div class="module_sidebar">
            <h2><b>商品分类</b></h2>
            <div class="wrap">
                <div class="wrap_child">
                    <div class="side_textlist">
                        <ul ectype="ul_category">
                            <?php $_from = $this->_var['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'category');$this->_foreach['fe_category'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_category']['total'] > 0):
    foreach ($_from AS $this->_var['category']):
        $this->_foreach['fe_category']['iteration']++;
?>
                            <?php if ($this->_foreach['fe_category']['iteration'] <= 10): ?>
                            <li><a href="javascript:void(0);" id="<?php echo $this->_var['category']['cate_id']; ?>"><?php echo htmlspecialchars($this->_var['category']['cate_name']); ?></a>(<?php echo $this->_var['category']['count']; ?>)</li>
                            <?php else: ?>
                            <li style="display:none"><a href="javascript:void(0);" id="<?php echo $this->_var['category']['cate_id']; ?>"><?php echo htmlspecialchars($this->_var['category']['cate_name']); ?></a></li>
                            <?php endif; ?>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </ul>
                    </div>
                    <?php if ($this->_var['category_count'] > 10): ?>
                    <div class="more"><input type="button" class="brands_btn" value="查看全部分类" id="show_category" /></div>
                    <?php endif; ?>
                </div>
            </div>

            <?php if (! $this->_var['filters']['brand']): ?>
            <h2><b>按品牌</b></h2>
            <div class="wrap">
                <div class="wrap_child">
                    <div class="side_textlist">
                        <ul ectype="ul_brand">
                            <?php $_from = $this->_var['brands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'row');$this->_foreach['fe_brand'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_brand']['total'] > 0):
    foreach ($_from AS $this->_var['row']):
        $this->_foreach['fe_brand']['iteration']++;
?>
                            <?php if ($this->_foreach['fe_brand']['iteration'] <= 10): ?>
                            <li><a href="javascript:void(0);" title="<?php echo $this->_var['row']['brand']; ?>" id="<?php echo urlencode($this->_var['row']['brand']); ?>"><?php echo htmlspecialchars($this->_var['row']['brand']); ?></a> (<?php echo $this->_var['row']['count']; ?>)</li>
                            <?php else: ?>
                            <li style="display:none"><a href="javascript:void(0);" title="<?php echo $this->_var['row']['brand']; ?>" id="<?php echo urlencode($this->_var['row']['brand']); ?>"><?php echo htmlspecialchars($this->_var['row']['brand']); ?></a> (<?php echo $this->_var['row']['count']; ?>)</li>
                            <?php endif; ?>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </ul>
                    </div>
                    <?php if ($this->_var['brand_count'] > 10): ?>
                    <div class="more"><input type="button" class="brands_btn" value="查看全部品牌" id="show_brand" /></div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>

            <h2><b>按价格</b></h2>
            <div class="wrap">
                <div class="wrap_child">
                    <div class="side_textlist">
                        <ul ectype="ul_price">
                            <?php $_from = $this->_var['price_intervals']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'row');if (count($_from)):
    foreach ($_from AS $this->_var['row']):
?>
                            <li><a href="javascript:void(0);" title="<?php echo $this->_var['row']['min']; ?> - <?php echo $this->_var['row']['max']; ?>"><?php echo price_format($this->_var['row']['min']); ?> - <?php echo price_format($this->_var['row']['max']); ?></a> (<?php echo $this->_var['row']['count']; ?>)</li>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            <li style="display:none"><input type="text" size="5" /> - <input type="text" size="5" /> <input type="button" id="search_by_price" value="提交" /></li>
                        </ul>
                    </div>
                    <div class="more"><input type="button" class="brands_btn" value="自定义价格区间" id="set_price_interval" /></div>
                </div>
            </div>

            <?php if (! $this->_var['filters']['region_id']): ?>
            <h2><b>按地区</b></h2>
            <div class="wrap">
                <div class="wrap_child">
                    <div class="side_textlist">
                        <ul ectype="ul_region">
                            <?php $_from = $this->_var['regions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'row');$this->_foreach['fe_region'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_region']['total'] > 0):
    foreach ($_from AS $this->_var['row']):
        $this->_foreach['fe_region']['iteration']++;
?>
                            <?php if ($this->_foreach['fe_region']['iteration'] <= 10): ?>
                            <li><a href="javascript:void(0);" id="<?php echo $this->_var['row']['region_id']; ?>" title="<?php echo htmlspecialchars($this->_var['row']['region_name']); ?>"><?php echo htmlspecialchars($this->_var['row']['region_name']); ?></a> (<?php echo $this->_var['row']['count']; ?>)</li>
                            <?php else: ?>
                            <li style="display:none"><a href="javascript:void(0);" id="<?php echo $this->_var['row']['region_id']; ?>" title="<?php echo $this->_var['row']['region_name']; ?>"><?php echo htmlspecialchars($this->_var['row']['region_name']); ?></a> (<?php echo $this->_var['row']['count']; ?>)</li>
                            <?php endif; ?>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </ul>
                    </div>
                    <?php if ($this->_var['region_count'] > 10): ?>
                    <div class="more"><input type="button" class="brands_btn" value="查看所有地区" id="show_region" /></div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="right">
        <div class="module_filter">
            <div class="module_filter_line">
                <ul class="module_filter_nav" ectype="ul_filter">
                    <?php $_from = $this->_var['filters']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'filter');if (count($_from)):
    foreach ($_from AS $this->_var['filter']):
?>
                    <li class="normal" ectype="li_filter">
                        <span class="txt"><?php echo $this->_var['filter']['name']; ?>: <?php echo $this->_var['filter']['value']; ?></span>
                        <span class="ico"><img src="<?php echo $this->res_base . "/" . 'images/delete.gif'; ?>" title="<?php echo $this->_var['filter']['key']; ?>" /></span>
                    </li>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    <?php if (! $this->_var['filters']['brand']): ?>
                    <li class="normal" ectype="dropdown_filter_title" ecvalue="brand">
                        <span class="txt">品牌: <a href="javascript:void(0);">请选择</a></span>
                        <span class="ico"><img src="<?php echo $this->res_base . "/" . 'images/down.gif'; ?>" /></span>
                    </li>
                    <?php endif; ?>
                    <li class="normal" ectype="dropdown_filter_title" ecvalue="price">
                        <span class="txt">价格: <a href="javascript:void(0);">请选择</a></span>
                        <span class="ico"><img src="<?php echo $this->res_base . "/" . 'images/down.gif'; ?>" /></span>
                    </li>
                    <?php if (! $this->_var['filters']['region_id']): ?>
                    <li class="normal" ectype="dropdown_filter_title" ecvalue="region">
                        <span class="txt">所在地区: <a href="javascript:void(0);">请选择</a></span>
                        <span class="ico"><img src="<?php echo $this->res_base . "/" . 'images/down.gif'; ?>" /></span>
                    </li>
                    <?php endif; ?>
                </ul>

                <?php if (! $this->_var['filters']['brand']): ?>
                <div class="contain_list" ectype="dropdown_filter_content" ecvalue="brand" style="display:none">
                    <ul ectype="ul_brand">
                        <?php $_from = $this->_var['brands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'row');if (count($_from)):
    foreach ($_from AS $this->_var['row']):
?>
                        <li><a href="javascript:void(0);" title="<?php echo $this->_var['row']['brand']; ?>" id="<?php echo urlencode($this->_var['row']['brand']); ?>"><?php echo htmlspecialchars($this->_var['row']['brand']); ?> (<?php echo $this->_var['row']['count']; ?>)</a></li>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </ul>
                </div>
                <?php endif; ?>
                <div class="contain_list" ectype="dropdown_filter_content" ecvalue="price" style="display:none">
                    <ul ectype="ul_price">
                        <?php $_from = $this->_var['price_intervals']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'row');if (count($_from)):
    foreach ($_from AS $this->_var['row']):
?>
                        <li><a href="javascript:void(0);" title="<?php echo $this->_var['row']['min']; ?> - <?php echo $this->_var['row']['max']; ?>"><?php echo price_format($this->_var['row']['min']); ?> - <?php echo price_format($this->_var['row']['max']); ?> (<?php echo $this->_var['row']['count']; ?>)</a></li>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </ul>
                </div>
                <?php if (! $this->_var['filters']['region_id']): ?>
                <div class="contain_list" ectype="dropdown_filter_content" ecvalue="region" style="display:none">
                    <ul ectype="ul_region">
                        <?php $_from = $this->_var['regions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'row');if (count($_from)):
    foreach ($_from AS $this->_var['row']):
?>
                        <li><a href="javascript:void(0);" id="<?php echo $this->_var['row']['region_id']; ?>" title="<?php echo htmlspecialchars($this->_var['row']['region_name']); ?>"><?php echo htmlspecialchars($this->_var['row']['region_name']); ?> (<?php echo $this->_var['row']['count']; ?>)</a></li>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </ul>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="shop_con_list">
            <h2>
                <div class="ornament1"></div>
                <div class="ornament2"></div>
                <div class="h2_wrap">
                    <div class="table_title">
                        <p class="title">显示:</p>
                        <p class="list_ico" ectype="display_mode" ecvalue="list" title="以列表显示"></p>
                        <p class="squares_ico" ectype="display_mode" ecvalue="squares" title="以方格显示"></p>
                        <p class="line_ico"></p>
                        <p class="title">排序:</p>
                        <p><select ectype="order_by"><?php echo $this->html_options(array('options'=>$this->_var['orders'],'selected'=>$_GET['order'])); ?></select></p>
                    </div>
                    <div class="top_page">
                        <?php echo $this->fetch('page.top.html'); ?>
                    </div>
                </div>
            </h2>

            <div class="<?php echo $this->_var['display_mode']; ?>" ectype="current_display_mode">
                <?php if ($this->_var['goods_list']): ?>
                <ul class="list_pic">
                    <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
                    <li>
                        <p><a href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>" target="_blank"><img src="<?php echo $this->_var['goods']['default_image']; ?>" /></a></p>
                        <h3>
                            <span class="text_link">
                                <span class="depict">
                                    <a href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>" target="_blank"><?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?></a>
                                </span>
                                <span class="info">
                                    <span>店铺名称: <?php echo htmlspecialchars($this->_var['goods']['store_name']); ?></span>
                                    <span class="fontColor5"><?php echo htmlspecialchars($this->_var['goods']['grade_name']); ?></span>
                                </span>
                            </span>
                            <span class="price"><?php echo price_format($this->_var['goods']['price']); ?></span>
                            <b>已售: <?php echo ($this->_var['goods']['sales'] == '') ? '0' : $this->_var['goods']['sales']; ?> 件 | <a href="<?php echo url('app=goods&act=comments&id=' . $this->_var['goods']['goods_id']. ''); ?>" target="_blank"><?php echo ($this->_var['goods']['comments'] == '') ? '0' : $this->_var['goods']['comments']; ?> 评论</a></b>
                        </h3>
                    </li>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

                    <div class="clear"></div>
                </ul>
                <?php else: ?>
                <div id="no_results">很抱歉! 没有找到相关商品</div>
                <?php endif; ?>
            </div>
        </div>

        <div class="shop_list_page">
            <?php echo $this->fetch('page.bottom.html'); ?>
        </div>
    </div>
    <?php else: ?>
    <div class="module_common">
        <p class="no_info">很抱歉! 没有找到相关商品</p>
    </div>
    <?php endif; ?>
</div>

<?php echo $this->fetch('footer.html'); ?>
