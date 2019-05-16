<?php

namespace App\Http\Requests\Api;

class VerificationCodeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (isset($this->un_unique)) {
            // 修改手机号，密码等获取验证码
            return [
                'phone' => [
                    'required',
                    // 'regex:/^((13[0-9])|(14[5,7])|(15[0-3,5-9])|(17[0,3,5-8])|(18[0-9])|166|198|199|(147))\d{8}$/',
                ]
            ];
        } else {
            // 注册获取验证码
            return [
                'phone' => [
                    'required',
                    // 'regex:/^((13[0-9])|(14[5,7])|(15[0-3,5-9])|(17[0,3,5-8])|(18[0-9])|166|198|199|(147))\d{8}$/',
                    'unique:users'
                ]
            ];
        }
        

        //图片验证码流程
        // return [
        //     'captcha_key' => 'required|string',
        //     'captcha_code' => 'required|string',
        // ];
    }


    public function attributes()
    {
        return [
            'captcha_key' => '图片验证码 key',
            'captcha_code' => '图片验证码',
        ];
    }


}
