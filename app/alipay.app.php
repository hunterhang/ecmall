<?php

/**
 *    Desc
 *用户充值管理
 *    @author    Garbin
 *    @usage    none
 */
header("content-type:text/html;charset=utf-8");
class AlipayApp extends MemberbaseApp
{
	var $_feed_enabled = false;
	function __construct()
	{
		$this->AlipayApp();
	}
	function AlipayApp()
	{
		parent::__construct();
	}
	function index()
	{

   
		$userid=$this->visitor->get('user_id');
		$model_member=& m('member');
		$find_data = $model_member->get("user_id =".$userid);
		$this->assign('info', $find_data);
		$this->_curlocal(LANG::get('member_center'),url('app=member'),'充值管理');
		/* 当前用户中心菜单 */
		$this->_curitem('alipay');
		$this->_config_seo('title', '充值管理');
		$this->display('alipay.index.html');
	}

	public function post(){

		
		if($_POST['money']==false)
		{
			$this->show_warning('请输入充值金额！');return ;
		}

		import("Alipay/AlipaySubmit.class");
		//支付类型
		$payment_type = "1";
		//必填，不能修改
		//服务器异步通知页面路径
		$notify_url = SITE_URL."/index.php?app=alipay&act=notify";
		//需http://格式的完整路径，不能加?id=123这类自定义参数
		//页面跳转同步通知页面路径
		$return_url = SITE_URL."/index.php?app=alipay&act=return_url";
		//需http://格式的完整路径，不能加?id=123这类自定义参数，不能写成http://localhost/
		//卖家支付宝帐户
		$seller_email = '';
		//商户订单号
		$out_trade_no = $this->visitor->get('user_name').time();
		//商户网站订单系统中唯一订单号，必填
		//订单名称
		$subject ='锦尚中国商城会员['.$this->visitor->get('user_name').']充值'.$_POST['money'].'元';
		//必填
		//付款金额
		$total_fee =$_POST['money'];

		//必填
		//商品数量
		$quantity = "1";
		$logistics_fee = "0.00";
		//必填，即运费
		//物流类型
		$logistics_type = "EXPRESS";
		//必填，三个值可选：EXPRESS（快递）、POST（平邮）、EMS（EMS）
		//物流支付方式
		$logistics_payment = "SELLER_PAY";
		//必填，两个值可选：SELLER_PAY（卖家承担运费）、BUYER_PAY（买家承担运费）
		//订单描述
		$body = $subject;

		$indent =& m('indent');
		$data=array('user_id'=>$this->visitor->get('user_id'),'user_name'=>$this->visitor->get('user_name'),'title'=>$subject,'status'=>0,'add_time'=>gmtime(),'out_trade_no'=>$out_trade_no,'money'=>$total_fee);
		if(!$indent->add($data))
		{
			$this->show_warning('充值失败,重新操作或联系客服!');return ;
		}
		$show_url = rtrim(SITE_URL,'/');
		//构造要请求的参数数组，无需改动
		$parameter = array(
		"service" => "create_direct_pay_by_user",
		"partner" => trim(''),
		"payment_type"	=> $payment_type,
		"notify_url"	=> $notify_url,
		"return_url"	=> $return_url,
		"seller_email"	=> $seller_email,
		"out_trade_no"	=> $out_trade_no,
		"subject"	=> $subject,
		"price"	=> $total_fee,
		"quantity"	=> $quantity,
		"logistics_fee"	=> $logistics_fee,
		"logistics_type"	=> $logistics_type,
		"logistics_payment"	=> $logistics_payment,
		"body"	=> $body,
		"show_url"	=> $show_url,
		"_input_charset"	=> trim(strtolower(strtolower('utf-8')))
		);
		//建立请求
		$alipaySubmit = new AlipaySubmit($this->setconfig());
		//var_dump($alipaySubmit);exit;
		$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
		echo $html_text;
	}


	public function setconfig(){
		$alipay_config['partner']		= '';
		//安全检验码，以数字和字母组成的32位字符
		$alipay_config['key']			= 'dtggxtuaexty629rr5wzzh3lxt75ic7p';
		//↑↑↑↑↑↑↑↑↑↑请在这里配置您的基本信息↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
		//签名方式 不需修改
		$alipay_config['sign_type']    = strtoupper('MD5');
		//字符编码格式 目前支持 gbk 或 utf-8
		$alipay_config['input_charset']= strtolower('utf-8');
		//ca证书路径地址，用于curl中ssl校验
		//请保证cacert.pem文件在当前文件夹目录中
		$alipay_config['cacert']    = getcwd().'\\includes\\libraries\\Alipay\\cacert.pem';
		//访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
		$alipay_config['transport']    = 'http';
		return $alipay_config;
	}
	//同步数据处理
	public function return_url (){
		import("Alipay/AlipayNotify.class");
		$alipayNotify = new AlipayNotify($this->setconfig());
		$verify_result = $alipayNotify->verifyReturn();
		if($verify_result) {
			//商户订单号
			$out_trade_no = $_GET['out_trade_no'];
			//支付宝交易号
			$trade_no = $_GET['trade_no'];
			//交易状态
			$trade_status = $_GET['trade_status'];

			if($_GET['trade_status'] == 'TRADE_SUCCESS') {

				$indent = & m('indent')->get("out_trade_no ='".$out_trade_no."'");
				if($indent!==false){
					$back=& m('member')->edit("user_id=".$indent['user_id'],'money =money + '.$indent['money']);
					$back=& m('indent')->edit("id=".$indent['id'],array('status'=>1));
					$data_member=& m('member')->get("user_id =".$indent['user_id']);
					if(!empty($data_member['tuijian_id']))
					{
						$back=& m('member')->edit("user_id=".$data_member['tuijian_id'],'jifen =jifen + '.$indent['money']*0.25);
						$model_tuijian_log=& m('tuijian_log')->add(array('user_id'=>$indent['user_id'],
						'user_name'=>$data_member['user_name'],
						'tuijian_id'=>$data_member['tuijian_id'],
						'price'=>$indent['money'],
						'jifen'=>$indent['money']*0.25,
						'add_time'=>gmtime()
						));
					}
					if($back!=false){
						$this->show_message('充值成功！','返回','index.php?app=alipay');return ;
					}else{
						$this->show_warning('充值失败,请在线客服,为您处理！','返回','index.php?app=alipay');return;
					}
				}else{
					$this->show_warning('订单不存在！','返回','index.php?app=alipay');return;

				}
			}else {
				$this->show_warning('请勿重复操作！','返回','index.php?app=alipay');return;
			}
		}else {
			$this->show_warning('充值失败 ,请在线客服,为您处理！','返回','index.php?app=alipay');return;
		}
	}
	public function notify(){
		import("Alipay/alipay_notify.class");
		$alipayNotify = new AlipayNotify($this->setconfig());
		$html_text = $alipaySubmit->buildRequestHttp($parameter);

	}

	//发货
	public function send(){
		import("Alipay/AlipaySubmit.class");
		//计算得出通知验证结果
		$alipaySubmit = new AlipaySubmit($this->setconfig());
		$html_text = $alipaySubmit->buildRequestHttp($parameter);
		//支付宝交易号
		$trade_no = $this->_get('WIDtrade_no');
		//必填
		//物流公司名称
		$logistics_name = '韵达快运';
		//三个值可选：POST（平邮）、EXPRESS（快递）、EMS（EMS）
		/************************************************************/
		//构造要请求的参数数组，无需改动
		$parameter = array(
		"service" => "send_goods_confirm_by_platform",
		"partner" => trim($alipay_config['partner']),
		"trade_no"	=> $trade_no,
		"logistics_name"	=> $logistics_name,
		"invoice_no"	=> $invoice_no,
		"transport_type"	=> $transport_type,
		"_input_charset"	=> trim(strtolower($alipay_config['input_charset']))
		);
		//建立请求
		$alipaySubmit = new AlipaySubmit($alipay_config);
		$html_text = $alipaySubmit->buildRequestHttp($parameter);
		//解析XML
		//注意：该功能PHP5环境及以上支持，需开通curl、SSL等PHP配置环境。建议本地调试时使用PHP开发软件
		$doc = new DOMDocument();
		$doc->loadXML($html_text);
		$back=& m('indent')->edit("id=".$this->_get('id'),array('status'=>3));
		//	M('Indent')->where(array('id'=>$this->_get('id')))->setField('status',3);
		if( ! empty($doc->getElementsByTagName( "alipay" )->item(0)->nodeValue) ) {
			$alipay = $doc->getElementsByTagName( "alipay" )->item(0)->nodeValue;
			echo $alipay;
		}
	}

}

?>
