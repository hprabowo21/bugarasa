<?php
use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use Illuminate\Support\Facades\Schema;
return new class extends Migration{
  public function up():void{
    Schema::create('recipe_yields',function(Blueprint $t){
      $t->id(); $t->foreignId('dish_id')->unique()->constrained()->cascadeOnDelete();
      $t->integer('portions_per_recipe'); $t->timestamps();
    });
  } public function down():void{Schema::dropIfExists('recipe_yields');}
};
