<?php

/* 微信管理 wechat */
class WxconfigModel extends BaseModel
{

 var $table  = 'wxconfig';
  var $prikey = 'id';
  var $_name  = 'wxconfig';
    /* 表单自动验证 */
    var $_autov = array(
        'appid'   => array(
            'required'  => true,
             'filter'    => 'trim',
        ),
        'appsecret' => array(
            'required'  => true,
            'filter'    => 'trim',
        ),
        'user_id' => array(
            'required'  => true,
        ),     
    );
    
   
   
    
   

}

?>