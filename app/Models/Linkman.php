<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Linkman extends Model
{
    protected $guarded = [];

    protected $table = "linkmans";


    public function company()
    {
    	return $this->belongsTo(Company::class);
    }


    public function setCardAttribute($path)
    {
    	if ( ! starts_with($path, 'http') && !empty($path) ) {
             // 拼接完整的url
             $path = config('app.url')."/uploads/images/cards/$path";
        }

        $this->attributes['card'] = $path;
    }


}
