<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table    = 'goods';
    public $timestamps  = true;
    protected $fillable = [];
    protected $guarded  = [];

    public function scopeOnline($query)
    {
        return $query->where('is_online', 1);
    }

    public function scopeRemain($query)
    {
        return $query->where('is_remain', 1);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    public function scopeRough($query)
    {
        return $query->where('is_rough', 1);
    }

    public function scopePromote($query)
    {
        return $query->where('is_promote', 1);
    }

    public function scopeDelete($query)
    {
        return $query->where('is_delete', 1);
    }
    public function scopeNotDelete($query)
    {
        return $query->where('is_delete', 0);
    }

    public function scopeStatusNormal($query)
    {
        return $query->where('status', 1);
    }
}