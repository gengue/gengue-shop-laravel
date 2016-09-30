<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'user_id', 'total'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function products()
    {
        return $this->hasManyThrough('App\Product', 'App\Product');
    }
}
