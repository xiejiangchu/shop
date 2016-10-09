<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table    = 'banner';
    public $timestamps  = true;
    protected $fillable = [];
    protected $guarded  = [];

    public function scopeShow($query)
    {
        return $query->where('is_show', 1);
    }
}
