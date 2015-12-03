<?php

namespace Tamber;

class Tamber {
	public static $apiKey;
	public static $apiUrl = 'https://dev.tamber.com/v1';
	const VERSION = 'v0.1';

	public static function getApiKey() {
		return self::$apiKey;
	}

	public static function setApiKey($apiKey) {
		self::$apiKey = $apiKey;
	}

	public static function _call_api($method, $url, $args=null) {
		if (empty($args)) {
			$args = array();
		}
		$apiKey = self::$apiKey;
		$data = http_build_query($args);
		$headers = array();
		$headers['User-Agent'] = 'Tamber/Python/' + VERSION;
		$headers['Authorization'] = 'Basic ' + base64_encode("{$apiKey}:");
		$curl = curl_init();
		$copts = array();
		if ($method == 'POST') {
			$headers['Content-Type'] = 'application/x-www-form-urlencoded';
			$copts[CURLOPT_POST] = 1;
			$copts[CURLOPT_POSTFIELDS] = $data;
		} else if ($method == 'GET') {
			$copts[CURLOPT_HTTPGET] = 1;
			$url = '{$url}?{$data}';
			$req->setQueryData($data);
		} else {
			throw new \Exception('Unknown HTTP method: ' . $method);
		}
		$copts[CURLOPT_URL] = $url;
		$copts[CURLOPT_HTTPHEADER] = $headers;
		$rbody = curl_exec($curl);
		if (curl_errno($curl)) {
			throw new \Exception('Got cURL error: ' . curl_errno($curl));
		}
		return json_decode($rbody, TRUE);
	}
}

?>