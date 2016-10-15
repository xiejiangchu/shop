<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderGoods extends Model
{
    protected $table    = 'order_goods';
    public $timestamps  = true;
    protected $fillable = [];
    protected $guarded  = [];

}
