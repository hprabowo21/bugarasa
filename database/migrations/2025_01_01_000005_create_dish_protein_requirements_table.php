<?php
use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use Illuminate\Support\Facades\Schema;
return new class extends Migration{
  public function up():void{
    Schema::create('dish_protein_requirements',function(Blueprint $t){
      $t->id(); 
      $t->foreignId('dish_id')->constrained()->cascadeOnDelete();
      $t->foreignId('protein_type_id')->constrained()->cascadeOnDelete();
      $t->integer('grams_per_recipe'); $t->timestamps();
      $t->unique(['dish_id','protein_type_id']);
    });
  } public function down():void{Schema::dropIfExists('dish_protein_requirements');}
};
