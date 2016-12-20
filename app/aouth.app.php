<?php

/**
 *    Desc
 *
 *    @author    Garbin
 *    @usage    none
 */
 header("content-type:text/html;charset=utf-8");
class AouthApp extends FrontendApp
{
 
  
  function index()
	{
	
	if($_GET['code']=='authdeny')
	{
 $arr =explode(',',$_GET['reason']);
		$url=SITE_URL.'/index.php?app=store&id='.$arr[0];
             echo "<script language='javascript' type='text/javascript'>";
               echo "window.location.href='$url'";
              echo "</script>";exit;
	}
    if (isset($_GET['code'])){
    $code= $_GET['code'];
	 $arr =explode(',',$_GET['state']);

	$store_id=$arr[0];
	$model_wxconfig=& m('wxconfig');
    $find_data = $model_wxconfig->get("user_id='".$store_id."'");
     if(is_array($find_data))
		{
	  $codes=$this->get_token($code,$find_data['appid'],$find_data['appsecret']);
	  if($codes['access_token']=='')
	 {
     echo "授权失败!";exit;
	  }
	   $info=$this->get_info($codes['access_token'],$codes['openid']);
	   if($info['openid']=='')
	   {
       echo "授权失败!";exit;
	   }

              $ms =& ms(); //连接用户中心 
    	    if($ms->user->check_username($info['openid']))//未注册
    	    {
				
    	    $user_id = $ms->user->register($info['openid'],'','',array('real_name'=>$info['nickname']));
    	     $user_id = $ms->user->auth($info['openid'], '');
	     //$this->_do_login($info['openid']);
             $this->_do_login($user_id);
    	    }else //已注册
    	    {
    	     $user_id = $ms->user->auth($info['openid'],'');
             $this->wx_do_login($user_id,array('real_name'=>$info['nickname']));
    	    }  
		 header("Location: ".$arr[1]);
	 // var_dump($info);exit;
		}else
		{  echo "授权失败!";exit;
		}
    }
	else{
    echo "授权失败!";exit;
     }
	}


 function get_token($code,$appid,$secret)
    {
    	$ch = curl_init();
    	curl_setopt($ch,CURLOPT_URL,"https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$appid."&secret=".$secret."&code=".$code."&grant_type=authorization_code");
    	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
    	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    	curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	$tmpInfo = curl_exec($ch);
    	if (curl_errno($ch)) {
    		echo 'Errno'.curl_error($ch);
    	}
    	curl_close($ch);
    	$arr= json_decode($tmpInfo,true);
    	return $arr;
    }

 function get_info($access_token,$openid)
    {
    	$ch = curl_init();
    	curl_setopt($ch,CURLOPT_URL,"https://api.weixin.qq.com/sns/userinfo?access_token=".$access_token."&openid=".$openid);
    	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
    	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    	curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	$tmpInfo = curl_exec($ch);
    	if (curl_errno($ch)) {
    		echo 'Errno'.curl_error($ch);
    	}
    	curl_close($ch);
    	$arr= json_decode($tmpInfo,true);
    	return $arr;
    }
 

   

}

?>
