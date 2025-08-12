<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class ProteinType extends Model{
    protected $guarded=[];
    public function dishProteinRequirements(){return $this->hasMany(DishProteinRequirement::class);}
}
