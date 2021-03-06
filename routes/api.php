<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$api = app('Dingo\Api\Routing\Router');


$api->version('v1', [
    'namespace' => 'App\Http\Controllers\Api',
    // 手动注册模型中间件bindings
    'middleware' => ['serializer:array','bindings'],
], function($api) {
    $api->group([
        'middleware' => 'api.throttle',
        'limit' => config('api.rate_limits.sign.limit'),
        'expires' => config('api.rate_limits.sign.expires'),
    ], function($api) {
            // 短信验证码
            $api->post('verificationCodes', 'VerificationCodesController@store');
            // 用户注册
            $api->post('users', 'UsersController@store');
            // 图片验证码
            $api->post('captchas', 'CaptchasController@store');
            // 第三方登录
            $api->post('socials/{social_type}/authorizations', 'AuthorizationsController@socialStore');
            // 获取 token 授权凭证
            $api->post('authorizations', 'AuthorizationsController@store');
            // 刷新 token
            $api->put('authorizations/current', 'AuthorizationsController@update');
            // 删除 token
            $api->delete('authorizations/current', 'AuthorizationsController@destroy');



            // 需 token 验证的接口
            $api->group(['middleware' => 'api.auth'], function ($api) {
                // 当前登录用户信息
                $api->get('user', 'UsersController@me');
                // 编辑用户信息
                $api->patch('user', 'UsersController@update');
                // 更改手机号
                $api->patch('update/phone', 'UsersController@updatePhone');
                // 更改密码
                $api->patch('reset/password', 'UsersController@reset');
                // 图片资源
                $api->post('images', 'ImagesController@store');
                

























            });
            
        });
});




