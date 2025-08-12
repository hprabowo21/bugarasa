<?php
use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use Illuminate\Support\Facades\Schema;
return new class extends Migration{
  public function up():void{
    Schema::create('dishes',function(Blueprint $t){
      $t->id(); $t->string('name');
      $t->enum('type',['LAUK','SAYUR','KARBO','BUAH','PELENKAP'])->index();
      $t->integer('default_yield_portion')->nullable();
      $t->text('notes')->nullable(); $t->timestamps();
    });
  } public function down():void{Schema::dropIfExists('dishes');}
};
