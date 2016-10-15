<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Syslog extends Model
{
    protected $table    = 'sys_log';
    public $timestamps  = false;
    protected $fillable = [];
    protected $guarded  = [];

}
