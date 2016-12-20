<style type="text/css">
.eject_con .adds li h4 {float: left; width: 90px; color: #646665; font-weight: normal; font-size: 12px; line-height: 26px;}
.grey {color:#666;}
.mt6 {margin-top:6px;}
.grey a{color:#9719a0;}
</style>
<ul class="tab">
    <li class="active">导入</li>
</ul>
<!--<div class="content1">
<form method="post" action="index.php?app=seller_order&amp;act=cancel_order&amp;order_id=<?php echo $this->_var['order_id']; ?>" target="seller_order">
 <p id="warning">
   <span id="warning_info"></span>
 </p>
    <dl>
        <dt>请选择文件:<input type="file" name="csv" id="csv" /></dt>
        <dd>
            <div class="li"><input type="radio" name="charset" value="utf-8" checked="checked" id="d1" />
                <label for="d1">utf-8 </label></div>
            <div class="li"><input type="radio" name="charset" value="gbk" id="d2" />
                 <label for="d2">gbk</label></div>
            <div class="li"><input type="radio" name="charset" value="big5" id="d3"/> <label for="d3">big5</label></div>
        </dd>
    </dl>
    <div class="btn">
        <input type="submit" id="confirm_button" class="btn1" value="确认" />
        <input type="button" id="cancel_button" class="btn2" value="取消" />
    </div>
</form>
</div>-->
<div class="eject_con">
    <div class="adds">
        <form  target="pop_warning" method="post" action="index.php?app=my_category&act=import" enctype="multipart/form-data">
        <div id="warning"></div>
        <ul>
            <li>
                 <h3 class="width">请选择文件: </h3>
                 <p> <input type="file" name="csv" id="csv" /></p>
            </li>
            <li>
                <h4>请选择文件编码:</h4>
                <p>
                <label>
                <input type="radio" name="charset" value="utf-8" checked="checked" class="mt6" />
                <span>utf-8</span></label>
                <label>
                <input type="radio" name="charset" value="gbk" />
                <span>gbk</span></label>
                <label>
                <input type="radio" name="charset" value="big5" />
                <span>big5</span></label></p><br />
            </li>
            <li> <p class="space1"><?php echo $this->_var['note_for_import']; ?></p></li>
            <li>
                <h3>文件格式:</h3>
                <p class="grey mt6">csv文件</p>
            </li>
            <?php if ($_GET['app'] == 'my_category'): ?>
            <li>
                <h3>CSV样例下载:</h3>
                <p class="grey mt6">
                    <a href="index.php?app=my_category&act=csv_sample&charset=utf-8">utf-8</a>
                    <a href="index.php?app=my_category&act=csv_sample&charset=gbk">gbk</a>
                    <a href="index.php?app=my_category&act=csv_sample&charset=big5">big5</a>
                </p>
            </li>
            <?php endif; ?>
        </ul>
        <div class="submit"><input type="submit" class="btn" value="确认" /></div>
        </form>
    </div>
</div>