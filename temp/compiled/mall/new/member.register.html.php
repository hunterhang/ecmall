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
<link href="<?php echo $this->res_base . "/" . 'css/ecmall.css'; ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->res_base . "/" . 'css/new/w_common.css'; ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->res_base . "/" . 'css/new/new.css'; ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->res_base . "/" . 'css/new/log-reg.css'; ?>" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="index.php?act=jslang"></script>
<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/jquery-1.8.0.min.js'; ?>" charset="utf-8"></script>
<?php echo $this->_var['_head_tags']; ?>
<script type="text/javascript">
//注册表单验证
$(function(){
	 jQuery.validator.addMethod("checkusername", function(value, element) {
    return this.optional(element) || /^[a-zA-Z0-9]+$/.test(value);
    }, "只能包括英文字母和数字,不能有中文,特殊符号和空格");
    $('#register_form').validate({
        errorPlacement: function(error, element){
            var error_td = element.parent('td').next('td');
            error_td.find('.field_notice').hide();
            error_td.append(error);
        },
        success       : function(label){
            label.addClass('validate_right').text('OK!');
        },
        onkeyup: false,
        rules : {
            user_name : {
                required : true,
                 checkusername:true,
                byteRange: [3,15,'<?php echo $this->_var['charset']; ?>'],
                remote   : {
                    url :'index.php?app=member&act=check_user&ajax=1',
                    type:'get',
                    data:{
                        user_name : function(){
                            return $('#user_name').val();
                        }
                    },
                    beforeSend:function(){
                        var _checking = $('#checking_user');
                        _checking.prev('.field_notice').hide();
                        _checking.next('label').hide();
                        $(_checking).show();
                    },
                    complete :function(){
                        $('#checking_user').hide();
                    }
                }
            },
            password : {
                required : true,
                minlength: 6
            },
            password_confirm : {
                required : true,
                equalTo  : '#password'
            },
            email : {
                required : true,
                email    : true
            },
            captcha : {
                required : true,
                remote   : {
                    url : 'index.php?app=captcha&act=check_captcha',
                    type: 'get',
                    data:{
                        captcha : function(){
                            return $('#captcha1').val();
                        }
                    }
                }
            },
            agree : {
                required : true
            }
        },
        messages : {
            user_name : {
                required : '您必须提供一个用户名',
                byteRange: '用户名必须在3-15个字符之间',
                remote   : '您提供的用户名已存在'
            },
            password  : {
                required : '您必须提供一个密码',
                minlength: '密码长度应在6-20个字符之间'
            },
            password_confirm : {
                required : '您必须再次确认您的密码',
                equalTo  : '两次输入的密码不一致'
            },
            email : {
                required : '您必须提供您的电子邮箱',
                email    : '这不是一个有效的电子邮箱'
            },
            captcha : {
                required : '请输入右侧图片中的文字',
                remote   : '验证码错误'
            },
            agree : {
                required : '您必须阅读并同意该协议,否则无法注册'
            }
        }
    });
});
</script>
</head>
<body>

<?php echo $this->fetch('new_headero.html'); ?>
	
    <div class="auto">
    	<div class="reg_panel">
            <form class="reg_box" id="register_form" method="post">
                <table>
                    <tbody>
                        <tr>
                            <td colspan="3"><h2>填写注册信息</h2></td>
                        </tr>
                        <tr>
                            <td><label>用户名：</label></td>
                            <td><input onkeyup="value=value.replace(/[\s]/g,'')"   id="user_name" name="user_name"   type="text" class="text_box"></td>
                              <td class="padding3 fontColor4"><label class="field_notice">用于登录的名字&nbsp;(3~12个字符，可使用字母、数字)</label><label id="checking_user" class="checking">检查中...</label></td>
                            
                        </tr>
                        <tr>
                            <td><label>密&nbsp;&nbsp;&nbsp;码：</label></td>
                            <td><input onkeyup="value=value.replace(/[\s]/g,'')"   type="password" id="password" name="password" class="text_box"></td>
                             <td class="padding3 fontColor4"><label class="field_notice">您的密码</label></td>
                        </tr>
                        <tr>
                            <td><label>确认密码：</label></td>
                            <td><input onkeyup="value=value.replace(/[\s]/g,'')"   type="password" name="password_confirm" class="text_box"></td>
                               <td class="padding3 fontColor4"><label class="field_notice">重复输入您的密码</label></td>
                        </tr>
                        <tr>
                            <td><label>电子邮箱：</label></td>
                            <td><input  name="email"  type="text" class="text_box"></td>
                             <td class="padding3 fontColor4"><label class="field_notice">请输入一个有效的电子邮箱地址</label></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="checkbox"  name="agree" value="1" value="1" > <label for="clause">我已阅读并同意 <a class="agreement" target="_blank" href="<?php echo url('app=article&act=system&code=eula'); ?>">用户服务协议</a></label></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="2"><input type="submit" name="Submit"  class="btn_box" value="立即注册"></td>
                        </tr>
                    </tbody>
                </table>
            </form>
       		<a href="<?php echo url('app=member&act=login&ret_url=' . $this->_var['ret_url']. ''); ?>" class="to_log"></a>
        </div>
    </div>
    <?php echo $this->fetch('new_footero.html'); ?>

</body>
</html>

