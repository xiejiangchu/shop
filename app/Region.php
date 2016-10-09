<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table    = 'region';
    public $timestamps  = true;
    protected $fillable = [];
    protected $guarded  = [];
}
