<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table    = 'payment';
    public $timestamps  = false;
    protected $fillable = [];
    protected $guarded  = [];

    public function scopeEnabled($query)
    {
        return $query->where('is_enabled', 1);
    }

}
