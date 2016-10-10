<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;
    protected $table    = 'address';
    public $timestamps  = true;
    protected $fillable = ['uid',
        'default',
        'mobile',
        'receiver',
        'city',
        'district',
        'road',
        'address'];
    protected $guarded = [];

}
