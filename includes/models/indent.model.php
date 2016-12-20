<?php

/* 充值记录 indent */
class IndentModel extends BaseModel
{

 var $table  = 'indent';
  var $prikey = 'id';
  var $_name  = 'indent';
    /* 表单自动验证 */
    var $_autov = array(
        'user_id' => array(
            'required'  => true,
        ),
        'user_name' => array(
            'required'  => true,
        ),
        'title'   => array(
            'required'  => true,
             'filter'    => 'trim',
        ),
        'add_time'   => array(
         'required'  => true,
        ),
        'out_trade_no' => array(
            'required'  => true,
        ),
        'money' => array(
            'required'  => true,
        ),
        
    );
    

    
   

}

?>