<?php

namespace App\Http\Requests\Api;

class UserRequest extends FormRequest
{
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'name' => 'required|between:2,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name',
                    'sex' => 'required|integer',
                    'password' => 'required|string|min:6',
                    'verification_key' => 'required|string',
                    'verification_code' => 'required|string',
                ];
                break;
            
            case 'PATCH':
                $userId = \Auth::guard('api')->id();
                return [
                    'name' => 'between:2,25|unique:users,name,'.$userId,
                    'sex' => 'integer',
                    'email' => 'email',
                    'description' => 'string|max:80',
                    // images 表中 id 是否存在，type 是否为 avatar，用户 id 是否是当前登录的用户 id
                    'avatar_iamge_id' => 'exists:images,id,type,avatar,user_id,'.$userId,
                ];
                break;
        }
    }

    public function attributes()
    {
        return [
            'verification_key' => '短信验证码 key',
            'verification_code' => '短信验证码',
        ];
    }
}
