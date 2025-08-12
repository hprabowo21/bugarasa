<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class RecipeYield extends Model{
    protected $guarded=[];
    public function dish(){return $this->belongsTo(Dish::class);}
}
