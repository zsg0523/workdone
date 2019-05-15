<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Overtrue\EasySms\EasySms;
use Overtrue\EasySms\PhoneNumber;
use App\Http\Requests\Api\VerificationCodeRequest;

class VerificationCodesController extends Controller
{
    /** [store 短信验证码] */
    public function store(VerificationCodeRequest $request, EasySms $easySms)
    {
        // $captchaData = \Cache::get($request->captcha_key);

        // if (!$captchaData) {
        //     return $this->response->error('图片验证码已失效', 422);
        // }

        // if (!hash_equals($captchaData['code'], $request->captcha_code)) {
        //     // 验证错误就清除缓存
        //     \Cache::forget($request->captcha_key);
        //     return $this->response->errorUnauthorized('验证码错误');
        // }

        // $phone = $captchaData['phone'];
        

        // 根据区号不同，发送国际短信
        $phone = new PhoneNumber($request->phone, $request->idd_code);

        if ( ! app()->environment('production')) {
            $code = '1234';
        } else {
            // 生成四位随机数 左侧补0
            $code = str_pad(random_int(1, 9999), 4, 0, STR_PAD_LEFT);

            try {
                $easySms->send($phone, [
                    'data' => [
                        $code,
                        '1',
                    ],
                    'template'  => '127203',
                ]);
            } catch (\Overtrue\EasySms\Exceptions\NoGatewayAvailableException $exception) {
                $message = $exception->getException('qcloud')->getMessage();
                return $this->response->errorInternal($message ?: '短信发送异常');
            }
        }

        $key = 'verificationCode_'.str_random(15);
        $expiredAt = now()->addMinutes(10);
        // 缓存码十分钟后过期
        // \Cache::put($key, ['phone' => $phone, 'code' => $code], $expiredAt);
        \Cache::put($key, ['phone' => $request->phone, 'code' => $code], $expiredAt);

        return $this->response->array([
            'key' => $key,
            'expired_at' => $expiredAt->toDateTimeString(),
        ])->setStatusCode(201);

    }


}
