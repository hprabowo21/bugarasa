<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class OrderItem extends Model{
    protected $guarded=[];
    protected $casts=['custom_requests'=>'array','swaps'=>'array','portion_multiplier'=>'float'];
    public function order(){return $this->belongsTo(Order::class);}
    public function menuDay(){return $this->belongsTo(MenuDay::class);}
    public function override(){return $this->hasOne(OrderItemOverride::class);}
}
