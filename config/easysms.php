<?php

return [
    // HTTP 请求的超时时间（秒）
    'timeout' => 10.0,

    // 默认发送配置
    'default' => [
        // 网关调用策略，默认：顺序调用
        'strategy' => \Overtrue\EasySms\Strategies\OrderStrategy::class,

        // 默认可用的发送网关
        'gateways' => [
            'aliyun',
        ],
    ],
    // 可用的网关配置
    'gateways' => [
        'errorlog' => [
//            'file' => storage_path('logs/easy-sms.log'),
            'channel' => 'easysms',
        ],
        'aliyun' => [
            'access_key_id' => env('ALI_ACCESS_KEY_ID'),
            'access_key_secret' => env('ALI_ACCESS_KEY_SECRET'),
            'sign_name' => env('ALI_SMS_SIGN_NAME'),
            'templates' => [
                'register' => env('ALI_TEMPLATE_REGISTER'),
            ]
        ],
    ],
];
