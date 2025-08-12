<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Dish extends Model{
    protected $guarded=[];
    public function recipeYield(){return $this->hasOne(RecipeYield::class);}
    public function proteinRequirements(){return $this->hasMany(DishProteinRequirement::class);}
    public function isType(string $t):bool{return $this->type===$t;}
    public function isLauk(){return $this->isType('LAUK');}
    public function isSayur(){return $this->isType('SAYUR');}
    public function isKarbo(){return $this->isType('KARBO');}
    public function isBuah(){return $this->isType('BUAH');}
    public function isPelengkap(){return $this->isType('PELENKAP');}
    public function scopeType($q,$t){return $q->where('type',$t);}
    public function scopeLauk($q){return $q->where('type','LAUK');}
    public function scopeSayur($q){return $q->where('type','SAYUR');}
    public function scopeKarbo($q){return $q->where('type','KARBO');}
    public function scopeBuah($q){return $q->where('type','BUAH');}
    public function scopePelengkap($q){return $q->where('type','PELENKAP');}
}
