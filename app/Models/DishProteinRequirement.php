<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class DishProteinRequirement extends Model{
    protected $guarded=[];
    public function dish(){return $this->belongsTo(Dish::class);}
    public function proteinType(){return $this->belongsTo(ProteinType::class);}
}
