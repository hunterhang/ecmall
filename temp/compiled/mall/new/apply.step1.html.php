

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo $this->_var['site_url']; ?>/" />

<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7 charset=<?php echo $this->_var['charset']; ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_var['charset']; ?>" />
<?php echo $this->_var['page_seo']; ?>
<meta name="author" content="" />
<meta name="generator" content="" />
<meta name="copyright" content="" />
<link href="<?php echo $this->res_base . "/" . 'css/new/w_common.css'; ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->res_base . "/" . 'css/new/new.css'; ?>" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/new/jquery-1.8.0.min.js'; ?>" charset="utf-8"></script>
</head>
<?php echo $this->fetch('new_headero.html'); ?>
<link href="<?php echo $this->res_base . "/" . 'css/ecmall.css'; ?>" rel="stylesheet" type="text/css" />
<script src="http://mallweb.changxiao.cn/js/jquery.js"></script>
<script src="<?php echo $this->res_base . "/" . 'js/nav.js'; ?>"></script>
<script src="<?php echo $this->res_base . "/" . 'js/select.js'; ?>"></script>
<div class="content">
    <div class="module_common">
        <h2></h2>
        <div class="wrap">
            <div class="wrap_child">

                <div class="module_new_shop">

                    <div class="chart">
                        <div class="pos_x1 bg_a2" title="1. 选择店铺类型"></div>
                        <div class="pos_x2 bg_b1" title="2. 填写店主和店铺信息"></div>
                        <div class="pos_x3 bg_c" title="3. 完成"></div>
                    </div>

                    <div class="grade_shop">
                        <table>
                        <?php $_from = $this->_var['sgrades']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'sgrade');if (count($_from)):
    foreach ($_from AS $this->_var['sgrade']):
?>
                            <tr>
                                <th><?php echo $this->_var['sgrade']['grade_name']; ?></th>
                                <td class="padding1 width5">
                                    <p>上传商品: <span class="fontColor1"><?php echo $this->_var['sgrade']['goods_limit']; ?> 款</span></p>
                                    <p>商城模板数: <span class="fontColor1"><?php echo $this->_var['sgrade']['skin_limit']; ?> 套</span></p>
                                    <p>收&nbsp;费&nbsp;标&nbsp;准 : <span class="fontColor2"><?php echo $this->_var['sgrade']['charge']; ?></span></p>
                                  
                                </td>
                                <td class="width4">
                                	<?php if ($this->_var['sgrade'] [ 'dnum' ] > 0): ?>
                                        淘宝商品导入:<span class="fontColor2"> 支持</span>
                                        <br/>
                                    <?php else: ?>
                                        &nbsp;
                                    <?php endif; ?>
                                   <?php if ($this->_var['sgrade'] [ 'dnum' ] > 1): ?>
                                        微信互动功能:<span class="fontColor1"> 6 种</span>
                                    <?php else: ?>
                                        &nbsp;
                                    <?php endif; ?>
                                </td>
                                <td class="width6 padding2">
                                	<?php if ($this->_var['sgrade'] [ 'dnum' ] > 2): ?>
                                        团购功能:<span class="fontColor2"> 支持</span>
                                        <br/>
                                        独立手机APP生成:<span class="fontColor2"> 支持</span>
                                    <?php else: ?>
                                        &nbsp;
                                    <?php endif; ?>
                                </td>
                                <td><a href="<?php echo url('app=apply&step=2&id=' . $this->_var['sgrade']['grade_id']. ''); ?>" class="shop_btn">立即开店</a></td>
                            </tr>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>

</div>
<?php echo $this->fetch('footer.html'); ?>
