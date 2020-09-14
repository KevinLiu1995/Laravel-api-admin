<?php

namespace App\Http\Controllers\Api\Index;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Index\SmsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Overtrue\EasySms\EasySms;
use Overtrue\EasySms\Exceptions\NoGatewayAvailableException;

class SmsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param SmsRequest $request
     * @param EasySms $easySms
     * @return \Illuminate\Http\JsonResponse
     * @throws \Overtrue\EasySms\Exceptions\InvalidArgumentException
     */
    public function store(SmsRequest $request,EasySms $easySms)
    {
        if (!config('app.sms_code_enable')) {
            return responseMessage('未开启短信验证码', 400);
        }

        $phone = $request->phone;

        // 生成6位随机数，左侧补0
        $code = str_pad(random_int(1, 999999), 6, 0, STR_PAD_LEFT);

        try {
            $easySms->send($phone,[
                'template' => config('easysms.gateways.aliyun.templates.register'),
                'data' => [
                    'code' => $code
                ],
            ]);
        } catch (\Overtrue\EasySms\Exceptions\NoGatewayAvailableException $exception) {
            $message = $exception->getException('aliyun')->getMessage();
            abort(500, $message ?: '短信发送异常');
        }

        $key = 'smsCode_' . Str::random(15);
        $expiredAt = now()->addMinutes(5);
        // 缓存验证码 5 分钟过期。
        Cache::put($key, ['phone' => $phone, 'code' => $code], $expiredAt);

        return responseData([
            'key' => $key,
            'expired_at' => $expiredAt->toDateTimeString(),
        ]);
    }
}
