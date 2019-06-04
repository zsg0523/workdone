<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Company extends Model
{
    protected $guarded = [];

    public function setFileAttribute($path)
    {
    	if ( ! starts_with($path, 'http') && !empty($path) ) {
             // 拼接完整的url
             $path = config('app.url')."/uploads/images/companies/$path";
        }

        $this->attributes['file'] = $path;
    }

    public function setUserIdAttribute($user_id)
    {
        if (empty($user_id)){
            $this->attributes['user_id'] = Auth::id();
        }
    }

    public function linkmans()
    {
    	return $this->hasMany(Linkman::class);
    }


    public function lastchats()
    {
    	return $this->hasMany(LastChat::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }





}
