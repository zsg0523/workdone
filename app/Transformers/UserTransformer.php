<?php

/**
 * @Author: Eden
 * @Date:   2019-05-15 11:03:04
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-05-16 11:49:15
 */
namespace App\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
	public function transform(User $user)
	{
		return [
			'id' => $user->id,
			'name' => $user->name,
			'email' => $user->email,
			'avatar' => $user->avatar,
			'description' => $user->description,
			'idd_code' => $user->idd_code,
			'phone' => $user->phone,
			'bound_phone' => $user->phone ? true : false,
			'boud_wechat' => ($user->weixin_unionid || $user->weixin_openid) ? true : false,
			'created_at' => $user->created_at->toDateTimeString(),
			'updated_at' => $user->updated_at->toDateTimeString()
		];
	}
}