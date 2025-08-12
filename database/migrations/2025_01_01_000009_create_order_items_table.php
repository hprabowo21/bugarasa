<?php
use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use Illuminate\Support\Facades\Schema;
return new class extends Migration{
  public function up():void{
    Schema::create('order_items',function(Blueprint $t){
      $t->id();
      $t->foreignId('order_id')->constrained()->cascadeOnDelete();
      $t->foreignId('menu_day_id')->constrained()->cascadeOnDelete();
      $t->decimal('portion_multiplier',5,2)->default(1.00);
      $t->json('custom_requests')->nullable();
      $t->json('swaps')->nullable();
      $t->timestamps();
      $t->unique(['order_id','menu_day_id']);
    });
  } public function down():void{Schema::dropIfExists('order_items');}
};
