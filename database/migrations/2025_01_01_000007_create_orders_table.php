<?php
use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use Illuminate\Support\Facades\Schema;
return new class extends Migration{
  public function up():void{
    Schema::create('orders',function(Blueprint $t){
      $t->id();
      $t->foreignId('customer_id')->constrained()->cascadeOnDelete();
      $t->foreignId('batch_id')->constrained()->cascadeOnDelete();
      $t->enum('type',['FULL_BATCH','PER_DAY'])->index();
      $t->text('notes')->nullable(); $t->timestamps();
    });
  } public function down():void{Schema::dropIfExists('orders');}
};
