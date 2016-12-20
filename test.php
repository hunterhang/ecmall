<?php
header("content-type:text/html;charset=utf-8");
var_dump($_GET);exit;
if (isset($_GET['code'])){
    $code= $_GET['code'];
	$codes=get_token($code);
	//var_dump($codes);exit;/
	$info=get_info($codes['access_token'],$codes['openid']);
	var_dump($info);exit;
	
}else{
    echo "NO CODE";
}


	 function get_token($code)
    {
    	$ch = curl_init();
    	curl_setopt($ch,CURLOPT_URL,"https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx0b0a351e0ed7d38e&secret=511c427b3eea9261eb55f4924c2621dc&code=".$code."&grant_type=authorization_code");
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

?>