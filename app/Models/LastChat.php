<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LastChat extends Model
{
    protected $guarded = [];


    public function company()
    {
    	return $this->belongsTo(Company::class);
    }


    public function setImageAttribute($path)
    {
    	if ( ! starts_with($path, 'http') && !empty($path) ) {
             // 拼接完整的url
             $path = config('app.url')."/uploads/images/conversations/$path";
        }

        $this->attributes['image'] = $path;
    }



}
