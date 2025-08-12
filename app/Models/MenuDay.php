<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class MenuDay extends Model{
    protected $guarded=[];
    public function batch(){return $this->belongsTo(Batch::class);}
    public function lauk1(){return $this->belongsTo(Dish::class,'lauk_1_id');}
    public function lauk2(){return $this->belongsTo(Dish::class,'lauk_2_id');}
    public function karbo(){return $this->belongsTo(Dish::class,'karbo_id');}
    public function sayur(){return $this->belongsTo(Dish::class,'sayur_id');}
    public function buah(){return $this->belongsTo(Dish::class,'buah_id');}
    public function pelengkap(){return $this->belongsTo(Dish::class,'pelengkap_id');}
    public function orderItems(){return $this->hasMany(OrderItem::class);}
}
