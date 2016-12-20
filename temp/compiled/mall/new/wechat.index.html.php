<?php echo $this->fetch('member.header.html'); ?>

<style>
.borline td {padding:10px 0px;}
.ware_list th {text-align:left;}
.information{padding-bottom:0;}
.information .info th{width:120px;}
.alertbox .msg_box{
    padding: 5px;
}
.alertbox .msg_box2{
    padding: 5px;
}
.alertbox .msg_box3{
 overflow:hidden;
    padding: 5px;
	line-height:30px;
	position:relative;
}
.alertbox .msg_box3 p{display:block; height:30px; font-size:12px;}
.alertbox .msg_box3 p b{font-weight:normal; color:#f00;}
.alertbox .msg_box3 p span{color:#333; font-size:14px;}
.alertbox .msg_box3 .btn1{position:absolute; right:0; top:5px;}
.alertbox{padding:20px; border-top:#eee solid 1px;}
</style>

<?php if ($this->_var['wechat']['token'] == ''): ?>
<script type="text/javascript">
//注册表单验证
$(function(){
 jQuery.validator.addMethod("checkusername", function(value, element) {
    return this.optional(element) || /^(\d|[a-zA-Z])*((\d[a-zA-Z])|([a-zA-Z]\d))(\d|[a-zA-Z])*$/.test(value);
    }, "只能英文字母加数字,不能有中文,特殊符号和空格");
    $('#profile_form').validate({
        errorPlacement: function(error, element){
            var error_td = element.parent('td');
            error_td.find('.field_notice').hide();
            error_td.append(error);
        },
        success       : function(label){
            label.addClass('validate_right').text('OK!');
        },
        onkeyup: false,
        rules : {
            wxname : {
                required : true,
                
            },
            weixin : {
                required : true
            },
            token : {
                required : true,
                rangelength:[6,11] ,
                 checkusername:true
            }
            
        },
        messages : {
            wxname : {
                required : '请输入公共账号名称'
            },
             weixin : {
                required : '请输入微信号'
            },
             token : {
                required : '请输入Token',
                rangelength:"字母+数字，6-11位数"
               // minlength: "字母+数字，6-11位数",
               // maxlength: "字母+数字，6-11位数"
            }
        }
    });
});
</script>
<?php else: ?>
<script type="text/javascript">
//注册表单验证
$(function(){
 jQuery.validator.addMethod("checkusername", function(value, element) {
    return this.optional(element) || /^(\d|[a-zA-Z])*((\d[a-zA-Z])|([a-zA-Z]\d))(\d|[a-zA-Z])*$/.test(value);
    }, "只能英文字母加数字,不能有中文,特殊符号和空格");
    $('#profile_form').validate({
        errorPlacement: function(error, element){
            var error_td = element.parent('td');
            error_td.find('.field_notice').hide();
            error_td.append(error);
        },
        success       : function(label){
            label.addClass('validate_right').text('OK!');
        },
        onkeyup: false,
        rules : {
            wxname : {
                required : true,
                
            },
            weixin : {
                required : true
            }
            
        },
        messages : {
            wxname : {
                required : '请输入公共账号名称'
            },
             weixin : {
                required : '请输入微信号'
            }
        }
    });
});
</script>
  <?php endif; ?>  
<div class="content">
    <?php echo $this->fetch('member.menu.html'); ?>
    <div id="right">
      <h4 style=" font-weight:normal; border-bottom:#eee solid 1px; padding:5px 5px 5px 20px; font-size:16px; height:60px;line-height: 60px; overflow:hidden;" class="remind">请使用360,火狐或者谷歌浏览器，否则部分功能不兼容</h4> 
            <div class="wrap">
                <div class="public">
                <form method="post" enctype="multipart/form-data" id="profile_form">
                    <div class="information">
                     
                        <div class="info individual">
                            <table>
                              
                                <tr>
                                    <th style="text-align:right;"><font style="color:red;">*</font>公众号名称:</th>
                                    <td><input type="text" class="text width_normal" name="wxname" value="<?php echo $this->_var['wechat']['wxname']; ?>" />
                                    <a target="_blank" href="/mall/gzpic.jpg" style="color:#85c401">（什么是公众号名称？）</a>
                                    <label class="field_notice"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="text-align:right;"><font style="color:red;">*</font>微信号:</th>
                                    <td><input type="text" class="text width_normal" name="weixin" value="<?php echo $this->_var['wechat']['weixin']; ?>" />
                                    <a target="_blank" href="/mall/gzpic.jpg" style="color:#85c401">（什么是微信号？）</a>
                                    <label class="field_notice"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="text-align:right;"><font style="color:red;" >*</font>Token:</th>
                                    <td><input maxlength="11" type="text" onkeyup="value=value.replace(/[\s]/g,'')" class="text width_normal" name="token" value="<?php echo $this->_var['wechat']['token']; ?>" />
                                    <a target="_blank" href="/mall/gzpic.jpg" style="color:#85c401">（什么是Token？）</a>
                                    <label style="color:#9c9c9c;">保存后不能修改</label>
                                    </td>
                                </tr>
                    <?php if ($this->_var['wechat']): ?>
                          <tr>
                             <th style="text-align:right;">接口URL:</th>
                             <td style="color:red;"><?php echo $this->_var['site_url']; ?>/index.php?app=weixin&token=<?php echo $this->_var['wechat']['token']; ?></td>
                          </tr>
                    <?php else: ?>
                       
                    <?php endif; ?>  
                                <tr>
                                    <th style="text-align:right;"><font style="color:red;" >*</font>微信号类型:</th>
                                    <td>
                                    <input onclick="zclick(0);" <?php if ($this->_var['wechat']['wx_type'] == '0'): ?> checked  <?php endif; ?> checked type="radio"  name="wx_type" value="0" />&nbsp;订阅号 &nbsp;&nbsp;
                                    <input onclick="zclick(2);" <?php if ($this->_var['wechat']['wx_type'] == '2'): ?> checked  <?php endif; ?> type="radio"  name="wx_type" value="2" />&nbsp;服务号 &nbsp;&nbsp;
                                    <input onclick="zclick(1);" type="radio" <?php if ($this->_var['wechat']['wx_type'] == '1'): ?> checked <?php endif; ?>  name="wx_type" value="1" />&nbsp;微信认证的服务号
                                    
                                    </td>
                                </tr>
                            	<tr id="zfw">
                                    <th style="text-align:right;">微信认证的服务号<br/>授权回调页面域名:</th>
                                    <td>
                                        <input type="text" class="text width_normal" value="xxxx.com"/>
                                        <a target="_blank" href="/mall/shouquan.jpg" style="color:#85c401">（如何设置网页授权）</a>
                                    </td>
                                 </tr>
                             <tr>
                                    <th></th>
                                    <td><input type="submit" class="btn" value="保存修改" /><input type="botton" class="btn" value="微信接口" onclick="zhelp('<?php echo $this->_var['wechat']['token']; ?>');" style="margin-left:20px; text-align:center; line-height:32px;" /></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </form>
                </div>
                <div class="wrap_bottom"></div>
                <div class="alertbox">
                	<div class="public_index">
                        <div class="information_index">
                            <h3 class="title">微信接口绑定步骤
                                <p style="color:red">（ 第一次绑定微信接口，请一定仔细参照以下步骤 ）</p>
                            </h3>
                            <div class="tipsbody">
                                <div class="tb_con">
                                    <div class="tb_con_c">
                                        <ol class="steps_t">
                                            <li>
                                                <div style="position:absolute; top:0; left:-10px; height:20px; width:20px; background:#fff;"></div>
                                                <div class="stepsimg">1</div>
                                                <div class="stepsa"><a style="width:180px;" class="btn pos3" target="_blank" href="http://jingyan.baidu.com/article/e75057f2b1ecbdebc91a89f3.html"><span class="pic1">微信公众号注册流程</span></a>
                                                </div>
                                                <div class="stepstxt">无公众号者请点击查看/ 有公众号者，本步骤可跳过</div>
                                            </li>
                                            <li>
                                                <div class="stepsimg">2</div>
                                                <div class="stepsa"><a style="width:180px;" class="btn pos3" target="_blank" href="/mall/gzpic.jpg"><span class="pic2">填写基本信息</span></a></div>
                                                <div class="stepstxt">请认真填写，生成微信接口URL</div>
                                            </li>
                                            <li>
                                                <div class="stepsimg">3</div>
                                                <div class="stepsa"><a style="width:180px;" class="btn pos3" href="javascript:zhelp('<?php echo $this->_var['wechat']['token']; ?>');"><span class="pic2">绑定微信接口向导</span></a></div>
                                                <div class="stepstxt">点击 微信接口按钮，配置接口</div>
                                            </li>
                                            <li>
                                                <div style="position:absolute; bottom:0; left:-10px; height:35px; width:20px; background:#fff;"></div>
                                                <div class="stepsimg">4</div>
                                                <div class="stepsa"><a style="width:180px;" class="btn pos3" target="_blank" href="https://mp.weixin.qq.com/"><span class="pic3">点击前往公众号平台</span></a></div>
                                                <div class="stepstxt">微信公众号平台登录网址</div>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 
            <div class="clear"></div>
            <div class="adorn_right1"></div>
            <div class="adorn_right2"></div>
            <div class="adorn_right3"></div>
            <div class="adorn_right4"></div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php echo $this->fetch('footer.html'); ?>
<script>
	function zhelp(data){
		if(data==''||data==null){
			alert('请先填写好您的相关信息，然后点击保存');
			return false;
		}
		window.open('/index.php?app=help&token='+data);
	}
	
	function zclick(num){
		if(num==1){
			$('#zfw').show();
		}else{
			$('#zfw').hide();
		}
	}
	
	$(function(){
		var zchecked = $("input[type='radio']:checked").val();
		if(zchecked==1){
			$('#zfw').show();
		}else{
			$('#zfw').hide();
		}
	});
	
</script>
