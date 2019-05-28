<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['type', 'hd_path', 'pv_path'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    
}
