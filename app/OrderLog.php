<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderLog extends Model
{
    protected $table    = 'order_log';
    public $timestamps  = true;
    protected $fillable = [];
    protected $guarded  = [];
}
