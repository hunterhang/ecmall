<?php

/* 微信管理 wechat */
class KeywordModel extends BaseModel
{

 var $table  = 'keyword';
  var $prikey = 'kid';
  var $_name  = 'keyword';
    /* 表单自动验证 */
    var $_autov = array(
       
        'token'   => array(
            'required'  => true,
        ),
        'user_id' => array(
            'required'  => true,
        ),
        
    );
    
   
    
   

}

?>