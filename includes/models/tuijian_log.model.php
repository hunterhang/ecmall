<?php

/* 微信管理 wechat */
class Tuijian_logModel extends BaseModel
{

 var $table  = 'tuijian_log';
  var $prikey = 'id';
  var $_name  = 'tuijian_log';
    /* 表单自动验证 */
    var $_autov = array(
        'user_id'   => array(
            'required'  => true,
        ),
        'tuijian_id' => array(
            'required'  => true,
        ),
        'price' => array(
            'required'  => true,
        ),    
         'jifen' => array(
            'required'  => true,
        ),    
         'add_time' => array(
            'required'  => true,
        ),     
    );
    
 
   
    
   

}

?>