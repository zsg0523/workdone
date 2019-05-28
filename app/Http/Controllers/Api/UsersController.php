<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\{User, Image};
use App\Http\Requests\Api\UserRequest;
use App\Transformers\UserTransformer;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;




class UsersController extends Controller
{
    /** [store 手机号注册] */
    public function store(UserRequest $request)
    {
        
        $verifyData = $this->verifyCode($request->verification_key, $request->verification_code);

        $user = User::create([
            'name' => $request->name,
            'sex' => $request->sex,
            'idd_code' => $verifyData['idd_code'],
            'phone' => $verifyData['phone'],
            'password' => bcrypt($request->password)
        ]);

        // 清除验证码缓存
        \Cache::forget($request->verification_key);

        return $this->response->item($user, new UserTransformer())
                ->setMeta([
                    'access_token' => \Auth::guard('api')->fromUser($user),
                    'token_type' => 'Bearer',
                    'expires_in' => \Auth::guard('api')->factory()->getTTL() * 60
                ])
                ->setStatusCode(201);
    }

    /** [me 用户个人信息] */
    public function me()
    {
        return $this->response->item($this->user(), new UserTransformer);
    }

    /** [update 个人信息编辑] */
    public function update(UserRequest $request)
    {
        $attributes = $request->only('name', 'email', 'introduction');

        if ($request->avatar_image_id) {
            // 上传头像
            $image = Image::find($request->avatar_image_id);

            $attributes['avatar'] = $image->pv_path;
        }

        $this->user()->update($attributes);

        return $this->response->item($this->user(), new UserTransformer());
    }

    /** [updatePhone 更改手机号] */
    public function updatePhone(UserRequest $request)
    {
        $verifyData = $this->verifyCode($request->verification_key, $request->verification_code);

        $attributes = ['idd_code' => $verifyData['idd_code'], 'phone' => $verifyData['phone']];

        $this->user()->update($attributes);

        \Cache::forget($request->verification_key);

        return $this->response->item($this->user(), new UserTransformer());
    }

    /** [reset 设置密码] */
    public function reset(Request $request)
    {
        $this->validate($request, $this->rules(), $this->validationErrorMessages());

        $verifyData = $this->verifyCode($request->verification_key, $request->verification_code);

        $user = User::where('phone', $verifyData['phone'])->first();

        $response = $this->resetPassword($user, $request->password);

        return $this->response->array(['message' => '密码设置成功！']);
    }

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
     * @param  string  $password
     * @return void
     */
    protected function resetPassword($user, $password)
    {
        $user->password = Hash::make($password);

        $user->setRememberToken(Str::random(60));

        $user->save();

        event(new PasswordReset($user));
    }


    /**
     * Get the password reset validation rules.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'verification_key' => 'required',
            'verification_code' => 'required',
            'password' => 'required|confirmed|min:6',
        ];
    }

    /**
     * Get the password reset validation error messages.
     *
     * @return array
     */
    protected function validationErrorMessages()
    {
        return [
            'verification_key.required' => 'verification_key 不能为空！',
            'verification_code.required' => '验证码不能为空！',
        ];
    }


    /**
     * [verifyCode 校验验证码]
     * @param  [type] $verification_key  [缓存 key]
     * @param  [type] $verification_code [缓存 value]
     */
    private function verifyCode($verification_key, $verification_code)
    {
        $verifyData = \Cache::get($verification_key);
        if ( ! $verifyData) {
            return $this->response->error("验证码已失效", 422);
        }

        // hash_equals 防止时序攻击
        if ( ! hash_equals($verifyData['code'], $verification_code)) {
            // 返回401
            return $this->response->errorUnauthorized('验证码错误');
        }

        return $verifyData;
    }



























}
