<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table    = 'order';
    public $timestamps  = true;
    protected $fillable = [];
    protected $guarded  = [];

    public function scopeConfirmed($query)
    {
        return $query->where('confirmed', 1);
    }

    public function scopeUnconfirmed($query)
    {
        return $query->where('confirmed', 0);
    }

    public function scopePaid($query)
    {
        return $query->where('pay_status', 1);
    }

    public function scopeUnpaid($query)
    {
        return $query->where('pay_status', 0);
    }

    public function scopeShip($query)
    {
        return $query->where('ship_status', 1);
    }

    public function scopeUnship($query)
    {
        return $query->where('ship_status', 0);
    }
}
