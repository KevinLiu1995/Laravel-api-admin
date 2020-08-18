<?php

namespace App\Http\Controllers\Api\Index;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Index\SmsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Overtrue\EasySms\Exceptions\NoGatewayAvailableException;

class SmsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(SmsRequest $request)
    {
        if (!config('app.sms_code_enable')) {
            return responseMessage('未开启短信验证码', 400);
        }

        $sms = app('easysms');
        try {
            $code = random_int(111111, 999999);

            $sms->send($request->phone, [
                // template id
                'template' => 'SMS_197675052',
                'data' => [
                    'code' => $code
                ],
            ]);

            // 将发送信息写入日志
            $log_data = "短信发送成功 to => $request->phone || code => $code";
            Log::channel('easysms')->info($log_data);

            // 生成缓存记录
            \Cache::add('sms_code_' . $request->phone, $code, config('app.sms_ttl'));

            return responseMessage('短信发送成功，请注意查收！');

        } catch (NoGatewayAvailableException $exception) {

            $message = $exception->getException('aliyun')->getMessage();
            Log::channel('easysms')->error($message);

            return responseMessage("短信发送失败,请稍候重试！", 400);
        } catch (\Exception $e) {

            Log::error('操作失败' . PHP_EOL . $e->getMessage());
            return responseMessage('fail',400);
        }
    }
}
