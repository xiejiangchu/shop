<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table    = 'address';
    public $timestamps  = true;
    protected $fillable = [];
    protected $guarded  = [];

}
