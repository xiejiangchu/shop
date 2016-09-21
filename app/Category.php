<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table    = 'category';
    public $timestamps  = true;
    protected $fillable = [];
    protected $guarded  = [];

    public function children()
    {
        return $this->hasMany('App\Category', 'pid', 'id');
    }

    public function scopeLevel1($query)
    {
        return $query->where('level', 1);
    }

    public function scopeLevel2($query)
    {
        return $query->where('level', 2);
    }

    public function scopeDelete($query)
    {
        return $query->where('is_delete', 1);
    }
    public function scopeNotDelete($query)
    {
        return $query->where('is_delete', 0);
    }

}
