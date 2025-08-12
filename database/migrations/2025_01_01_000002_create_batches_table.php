<?php
use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use Illuminate\Support\Facades\Schema;
return new class extends Migration{
  public function up():void{
    Schema::create('batches',function(Blueprint $t){
      $t->id(); $t->string('name'); $t->date('start_date'); $t->date('end_date'); $t->text('notes')->nullable(); $t->timestamps();
    });
  } public function down():void{Schema::dropIfExists('batches');}
};
