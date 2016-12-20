<?php echo $this->fetch('new_header.html'); ?>

<script type="text/javascript">
$(function(){
    $('#login_form').validate({
        errorPlacement: function(error, element){
            $(element).parent('td').append(error); 
        },
        success       : function(label){
            label.addClass('validate_right').text('OK!');
        },
        onkeyup : false,
        rules : {
            user_name : {
                required : true
            },
            password : {
                required : true
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
            }
        },
        messages : {
            user_name : {
                required : '您必须提供一个用户名'
            },
            password  : {
                required : '您必须提供一个密码'
            },
            captcha : {
                required : '请输入右侧图片中的文字',
                remote   : '验证码错误'
            }
        }
    });
});
</script>
 <div class="auto">
    	<div class="login_panel">
        	<form class="login_box"  method="post" id="login_form">
            	<h2>登录微商城</h2>
                <table>
                    <tbody>
                        <tr>
                            <td><label>用户名：</label> </td>
                            <td><input type="text" class="text_box" name="user_name"></td>
                        </tr>
                        <tr>
                            <td><label>密&nbsp;&nbsp;&nbsp;码：</label> </td>
                            <td><input type="password" name="password"   class="text_box"></td>
                        </tr>
                        <tr class="distance">
                            <td></td>
                            <td>
                              <input type="submit" name="Submit" class="btn_box" value="登录">                                  
                              <a class="l_link" href="<?php echo url('app=find_password'); ?>">忘记密码？</a> |
                              <a class="l_link" href="<?php echo url('app=member&act=register&ret_url=' . $this->_var['ret_url']. ''); ?>">注册账号？</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
       		<a href="#" class="tiyan"></a>
        </div>
    </div>

<?php echo $this->fetch('footer.html'); ?>