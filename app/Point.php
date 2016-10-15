<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $table    = 'point';
    public $timestamps  = true;
    protected $fillable = [];
    protected $guarded  = [];
}
