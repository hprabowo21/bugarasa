<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Batch extends Model{
    protected $guarded=[]; 
    public function menuDays(){return $this->hasMany(MenuDay::class);}
    public function orders(){return $this->hasMany(Order::class);}
}
