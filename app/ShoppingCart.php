<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    protected $table    = 'shopping_cart';
    public $timestamps  = true;
    protected $fillable = ['gid', 'uid', 'amount'];
    protected $guarded  = [];
    protected $hidden   = ['id', 'updated_at', 'created_at'];
    protected $appends  = ['goods'];

    public function good()
    {
        return $this->hasOne('App\Goods', 'id', 'gid');
    }

    public function getGoodsAttribute()
    {
        return $this->good;
    }
}
