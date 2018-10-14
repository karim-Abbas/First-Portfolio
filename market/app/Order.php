<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    protected $fillable = ['id', 'user_id','product_id'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    public function product()
    {
    	return $this->belongsTo('App\Product');
    }
}
