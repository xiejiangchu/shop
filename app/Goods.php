<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Goods extends Model
{
    use SoftDeletes;
    protected $table    = 'goods';
    public $timestamps  = true;
    protected $fillable = [];
    protected $guarded  = ['is_remain', 'is_online', 'is_rough', 'is_promote', 'is_delete', 'status', 'promote_end', 'order'];
    protected $appends  = [];

    public function formatToOrdreGoods()
    {
        return array(
            'no'             => $this->no,
            'name'           => $this->name,
            'category_id1'   => $this->category_id1,
            'category_id2'   => $this->category_id2,
            'is_remain'      => $this->is_remain,
            'is_online'      => $this->is_online,
            'is_active'      => $this->is_active,
            'is_rough'       => $this->is_rough,
            'is_promote'     => $this->is_promote,
            'is_delete'      => $this->is_delete,
            'status'         => $this->status,
            'promote_end'    => $this->promote_end,
            'order'          => $this->order,
            'weight'         => $this->weight,
            'order_quantity' => $this->order_quantity,
            'max_quantity'   => $this->max_quantity,
            'market_price'   => $this->market_price,
            'shop_price'     => $this->shop_price,
            'promote_price'  => $this->promote_price,
            'remain'         => $this->remain,
            'sale_num'       => $this->sale_num,
            'quanlity'       => $this->quanlity,
            'unit'           => $this->unit,
            'unit_sell'      => $this->unit_sell,
            'unit_sell'      => $this->unit_sell,
            'unitDesc'       => $this->unitDesc,
            'src'            => $this->src,
            'thumb'          => $this->thumb,
            'place'          => $this->place,
            'summary'        => $this->summary,
            'notice'         => $this->notice,
            'description'    => $this->description,
        );
    }

    public function formatAjax()
    {
        return array(
            "id"     => $this->id,
            "amount" => $this->pivot->amount,
        );
    }

    public function scopeOnline($query)
    {
        return $query->where('is_online', 1);
    }

    public function scopeRemain($query)
    {
        return $query->where('is_remain', 1);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    public function scopeRough($query)
    {
        return $query->where('is_rough', 1);
    }

    public function scopePromote($query)
    {
        return $query->where('is_promote', 1);
    }

    public function scopeDelete($query)
    {
        return $query->where('is_delete', 1);
    }
    public function scopeNotDelete($query)
    {
        return $query->where('is_delete', 0);
    }

    public function scopeStatusNormal($query)
    {
        return $query->where('status', 1);
    }

    public function shoppingCartAmount()
    {
        return $this->belongsToMany('App\User', 'shopping_cart', 'gid', 'uid')->withPivot('amount');
    }
}
