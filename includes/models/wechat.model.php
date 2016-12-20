<?php

/* 微信管理 wechat */
class WechatModel extends BaseModel
{

 var $table  = 'wechat';
  var $prikey = 'id';
  var $_name  = 'wechat';
    /* 表单自动验证 */
    var $_autov = array(
        'wxname'   => array(
            'required'  => true,
             'filter'    => 'trim',
        ),
        'weixin' => array(
            'required'  => true,
            'filter'    => 'trim',
        ),
        'token'   => array(
            'required'  => true,
            'filter'    => 'trim',
        ),
        'user_id' => array(
            'required'  => true,
        ),
        
    );
    
     /*
     * 判断名称是否唯一
     */
    function unique($token, $user_id = 0)
    {
        $conditions = "token = '" . $token . "'";
        $user_id && $conditions .= " AND user_id <> '" . $user_id . "'";
        
        return count($this->find(array('conditions' => $conditions))) == 0;
    }
    
   

}

?>