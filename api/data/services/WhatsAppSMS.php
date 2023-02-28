<?php


class WhatsAppSMS
{


	public $type_envoi = null;   // 0 pour SMS, 1 pour WhatsApp, 2 pour Telegram

	public function __construct($type_envoi = 1)
	{
		$this->type_envoi = $type_envoi;
	}



	public function envoi($mobile, $message)
	{


		// toute la partie en bas ne change pas, 

		$type = $this->type_envoi;

		$params = array("id" => 0, "tel" => $mobile, "sms" => $message, "type" => $type);



		$method = "post";

		if (!is_callable('curl_init')) {
			echo json_encode(["Error" => "cURL extension is disabled on your server"]);
			return;
		}


		$url = "http://sms.opensol.me/whatsappi";

		//$url = "https://api.opensol.me/whatsapp";

		$data = http_build_query($params);
		if (strtolower($method) == "get") $url = $url . '?' . $data;
		$curl = curl_init($url);
		if (strtolower($method) == "post") {
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		}
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HEADER, 1);
		$response = curl_exec($curl);
		$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		if ($httpCode == 404) {
			echo json_encode(["Error" => "instance not found or pending please check you instance id"]);
			return;
		}
		$contentType = curl_getinfo($curl, CURLINFO_CONTENT_TYPE);
		$header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
		$header = substr($response, 0, $header_size);
		$body = substr($response, $header_size);
		curl_close($curl);

		if (strpos($contentType, 'application/json') !== false) {
			return json_decode($body, true);
		}
		return $body;
	}
}
