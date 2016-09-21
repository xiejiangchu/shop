<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Goods extends Model
{
    use SoftDeletes;
    protected $table    = 'goods';
    public $timestamps  = true;
    protected $fillable = [];
    protected $guarded  = ['is_remain', 'is_online', 'is_rough', 'is_promote', 'is_delete', 'status', 'promote_end', 'order'];
    protected $appends  = [];

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
