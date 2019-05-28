<?php

/**
 * @Author: Eden
 * @Date:   2019-05-17 11:22:17
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-05-17 11:27:08
 */
namespace App\Transformers;

use App\Models\Image;
use League\Fractal\TransformerAbstract;

class ImageTransformer extends TransformerAbstract
{
	public function transform(Image $image)
	{
		return [
			'id' => $image->id,
			'user_id' => $image->user_id,
			'type' => $image->type,
			'hd_path' => $image->hd_path,
			'pv_path' => $image->pv_path,
			'created_at' => $image->created_at->toDateTimeString(),
			'updated_at' => $image->updated_at->toDateTimeString()
		];
	}

}