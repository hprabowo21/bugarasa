<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Order extends Model{
    protected $guarded=[];
    public function customer(){return $this->belongsTo(Customer::class);}
    public function batch(){return $this->belongsTo(Batch::class);}
    public function items(){return $this->hasMany(OrderItem::class);}
}
