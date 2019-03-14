<?php

/**
 * @Author: Eden
 * @Date:   2019-03-14 15:31:50
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-03-14 15:42:55
 */
return [
    // HTTP 请求的超时时间（秒）
    'timeout' => 5.0,

    // 默认发送配置
    'default' => [
        // 网关调用策略，默认：顺序调用
        'strategy' => \Overtrue\EasySms\Strategies\OrderStrategy::class,

        // 默认可用的发送网关
        'gateways' => [
            'qcloud',
        ],
    ],
    // 可用的网关配置
    'gateways' => [
        'errorlog' => [
            'file' => '/tmp/easy-sms.log',
        ],
        'qcloud' => [
            'sdk_app_id'  => env('TENCENT_API_ID'),
            'app_key' => env('TENCENT_API_KEY'),
            'sign_name' => env('TENCENT_SIGN_NAME'),
        ]
    ],
];
