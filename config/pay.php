<?php

return [
	'alipay' => [
	    'enable' => env('APIPAY_ENABLE',false),
		'app_id' => env('ALIPAY_APP_ID', null),
		'ali_public_key' => env('ALIPAY_PUBLIC_KEY', null),
		'private_key' => env('ALIPAY_PRIVATE_KEY', null),
		'log' => [
			'file' => storage_path('logs/alipay.log'),
		],
	],

	'wechat' => [
        'enable' => env('WECHATPAY_ENABLE',false),
		'app_id' => env('WECHATPAY_APP_ID', null),
		'appid' => env('WECHATPAY_APP_ID', null),
		'mch_id' => env('WECHATPAY_MCH_ID', null),
		'key' => env('WECHATPAY_KEY', null),
		'cert_client' => env('WECHATPAY_CERT_CLIENT', null),
		'cert_key' => env('WECHATPAY_CERT_KEY', null),
		'log' => [
			'file' => storage_path('logs/wechat_pay.log'),
		],
	],
];
