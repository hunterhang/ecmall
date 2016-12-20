<?php

/*微信类*/
class WeixinApp extends MallbaseApp
{
	private $token;
	private $data = array();
	private $msg;
	function index()
	{
		import('wechat.lib');
		$this->token = $_GET['token'];

		$weixin = new Wechat($this->token);
		$data = $weixin->request();
		$this->data = $weixin->request();
		list($content, $type) = $this->reply($data);
		$weixin->response($content, $type);
	}
	private  function wechat_content($contentStr)//文本回复得到wecha_id
	{
		$str=$contentStr;
	    $reg = '/\shref=[\'\"]([^\'"]*)[\'"]/i';
		preg_match_all($reg , $str , $out_ary);//正则：得到href的地址
		$src_ary = $out_ary[1];
       if(!empty($src_ary))//存在
      {
      	$comment=$src_ary[0];
      	if(stristr($comment,$_SERVER['SERVER_NAME']))
      	{
      		if(stristr($comment,"?"))
      		{
      			$links=$comment."&wecha_id=".$this->data['FromUserName']."&token=".$this->token;
      			$contentStr= str_replace($comment,$links,$str);
      		}else
      		{
      			$links=$comment."?wecha_id=".$this->data['FromUserName']."&token=".$this->token;
      			$contentStr= str_replace($comment,$links,$str);
      		}
      	}
      }
      return $contentStr;	
	}

	private  function wechat_links($linkinfo)//链接处理
	{
		if(stristr($linkinfo,$_SERVER['SERVER_NAME']))
		{
			if(stristr($linkinfo,"?"))
			{
				$links=$linkinfo."&wecha_id=".$this->data['FromUserName']."&token=".$this->token;
			}else
			{
				$links=$linkinfo."?wecha_id=".$this->data['FromUserName']."&token=".$this->token;
			}
		}else{
			$links=$linkinfo;
		}
		return $links;
	}
	
	
	
	private function reply($data)
	{

		///关注事件
		if ('subscribe' == $data['Event']) {

			$model_keyword=& m('keyword');
			$data_keyword = $model_keyword->get("isfollow=1 AND token ='".$this->token."'");
			if(is_array($data_keyword))
			{
				if($data_keyword['type']==2)
				{
					$titles=unserialize($data_keyword['titles']);//标题
					$imageinfo=unserialize($data_keyword['imageinfo']);//图片
					$linkinfo=unserialize($data_keyword['linkinfo']);//链接
					for($i=0;$i<count($titles);$i++)
					{
						$return[] = array($titles[$i], $titles[$i],$imageinfo[$i], $this->wechat_links($linkinfo[$i]));
						//$return[] = array($titles[$i], $titles[$i],$imageinfo[$i], $linkinfo[$i]);
					}
					return array($return, 'news');
				}else
				{
					
					return array($this->wechat_content($data['kecontent']), 'text');
					//return array($data['kecontent'], 'text');
				}
			}
		}

		///点击自定义菜单事件
		if ('CLICK' == $data['Event']) {
			$model_custom_menu=& m('custom_menu');
			$data_custom_menu = $model_custom_menu->get(array(
			'fields'        => "keyword,type",
			'conditions'    => "token='".$this->token."' AND keyvalue='".$data['EventKey']."'",));
			if(is_array($data_custom_menu))
			{
				if($data_custom_menu['type']==0)
				{
					$model_keyword=& m('keyword');
					$data_keyword = $model_keyword->get("iskey=1 AND token ='".$this->token."' AND kyword like '%".$data_custom_menu['keyword']."%'");

					if(is_array($data_keyword))
					{
						if($data_keyword['type']==2)
						{
							$titles=unserialize($data_keyword['titles']);//标题
							$imageinfo=unserialize($data_keyword['imageinfo']);//图片
							$linkinfo=unserialize($data_keyword['linkinfo']);//链接
							for($i=0;$i<count($titles);$i++)
							{
								$return[] = array($titles[$i], $titles[$i],$imageinfo[$i],$this->wechat_links($linkinfo[$i]));
							}
							return array($return, 'news');
						}else
						{
							return array($this->wechat_content($data_keyword['kecontent']), 'text');
							//return array($data_keyword['kecontent'], 'text');
						}
					}
				}
			}
		}

//$REDIRECT_URI ="/test.php";
//$touserName='wx0b0a351e0ed7d38e';
//return array('<a href="https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$touserName.'&redirect_uri='.$REDIRECT_URI.'&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect">点计</a>','text');

/***测试

 $model_wechat=& m('wechat');
 $data_wechat= $model_wechat->get("token='".$this->token."'");

 $model_wxconfig=& m('wxconfig');
 $data_wxconfig= $model_wxconfig->get("user_id=".$data_wechat['user_id']);
if(is_array($data_wxconfig))
{
	$ACCESS_LIST=$this->curl($data_wxconfig['appid'],$data_wxconfig['appsecret']);
	if($ACCESS_LIST['access_token']!='')
	{
         $user_info= $this->user_info($ACCESS_LIST['access_token'],$this->data['FromUserName']);
		 return array($user_info['nickname'],'text');
	}
}
end 测试***/




		$key = $data['Content'];//回复内容
		$model_keyword=& m('keyword');
		$data_keyword = $model_keyword->get(array(
		'conditions'    => "token='".$this->token."' AND iskey=1  AND kyword like '%".$key."%'",));
		if(is_array($data_keyword))//找到关键词
		{
			if($data_keyword['type']==2)
			{
				$titles=unserialize($data_keyword['titles']);//标题
				$imageinfo=unserialize($data_keyword['imageinfo']);//图片
				$linkinfo=unserialize($data_keyword['linkinfo']);//链接
				for($i=0;$i<count($titles);$i++)
				{
					
					$return[] = array($titles[$i], $titles[$i],$imageinfo[$i], $this->wechat_links($linkinfo[$i]));
				}
				return array($return, 'news');
			}else
			{
				return array($this->wechat_content($data_keyword['kecontent']), 'text');
				//return array($data_keyword['kecontent'], 'text');
			}
		}else //消息自动回复
		{
			$model_keyword=& m('keyword');
			$data_keyword = $model_keyword->get("ismess=1 AND token ='".$this->token."'");
			if($data_keyword['type']==2)
			{
				$titles=unserialize($data_keyword['titles']);//标题
				$imageinfo=unserialize($data_keyword['imageinfo']);//图片
				$linkinfo=unserialize($data_keyword['linkinfo']);//链接
				for($i=0;$i<count($titles);$i++)
				{
					$return[] = array($titles[$i], $titles[$i],$imageinfo[$i],$this->wechat_links($linkinfo[$i]));
				}
				return array($return, 'news');
			}else
			{
				return array($this->wechat_content($data_keyword['kecontent']), 'text');
				//return array($data_keyword['kecontent'], 'text');
			}
		}
		
	}




	public function curl($appid,$secret)
    {
    	$ch = curl_init();
    	curl_setopt($ch, CURLOPT_URL, "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$secret);
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


	public function user_info($access_token,$openid)
    {
    	$ch = curl_init();
    	curl_setopt($ch, CURLOPT_URL, "https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$access_token."&openid=".$openid);
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