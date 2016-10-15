<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    protected $table    = 'bonus';
    public $timestamps  = true;
    protected $fillable = [];
    protected $guarded  = [];

    public function scopeEnable($query)
    {
        return $query->where('is_enable', 1);
    }

    public function scopeAvailable($query)
    {
        $now = Carbon::now();
        return $query->where('begin', '<', $now)
            ->where('end', '>', $now);
    }
}
