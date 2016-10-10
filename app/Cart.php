<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table    = 'cart';
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
