<?php

namespace Grigio\Notifications\Service;


use GuzzleHttp\Client;


class SmsIRService
{
    public static function sendVerification($code,$number,$log = false)
	{
		$client = new Client();
		$body   = ['Code'=>$code,'MobileNumber'=>$number];
		$result = $client->post('http://restfulsms.com/api/VerificationCode',['json'=>$body,'headers'=>['x-sms-ir-secure-token'=>self::getToken()],'connect_timeout'=>30]);
		// if($log) {
		// 	self::DBlog($result,$code,$number);
		// }
		return json_decode($result->getBody(),true);
    }
    
    public static function getToken()
	{
		$client     = new Client();
		$body       = ['UserApiKey'=>config('grigionotification.sms_ir.api_key'),'SecretKey'=>config('grigionotification.sms_ir.secret_key'),'System'=>'laravel_v_1_4'];
		$result     = $client->post('http://restfulsms.com/api/Token',['json'=>$body,'connect_timeout'=>30]);
		return json_decode($result->getBody(),true)['TokenKey'];
	}

	public static function send($messages,$numbers,$sendDateTime = null)
	{
		$client     = new Client();
		$messages = (array)$messages;
		$numbers = (array)$numbers;
		if($sendDateTime === null) {
			$body   = ['Messages'=>$messages,'MobileNumbers'=>$numbers,'LineNumber'=>config('grigionotification.sms_ir.number')];
		} else {
			$body   = ['Messages'=>$messages,'MobileNumbers'=>$numbers,'LineNumber'=>config('grigionotification.sms_ir.number'),'SendDateTime'=>$sendDateTime];
		}
		$result     = $client->post('http://restfulsms.com/api/MessageSend',['json'=>$body,'headers'=>['x-sms-ir-secure-token'=>self::getToken()],'connect_timeout'=>30]);
		//self::DBlog($result,$messages,$numbers);
		return json_decode($result->getBody(),true);
	}

}