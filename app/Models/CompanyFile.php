<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyFile extends Model
{
    protected $guarded = [];


    public function setFileAttribute($path)
    {
    	if ( ! starts_with($path, 'http') && !empty($path) ) {
             // 拼接完整的url
             $path = config('app.url')."/uploads/images/files/$path";
        }

        $this->attributes['file'] = $path;
    }


    public function setImageAttribute($path)
    {
        if ( ! starts_with($path, 'http') && !empty($path) ) {
             // 拼接完整的url
             $path = config('app.url')."/uploads/images/files/$path";
        }

        $this->attributes['image'] = $path;
    }

    public function company()
    {
    	return $this->belongsTo(Company::class);
    }
}
