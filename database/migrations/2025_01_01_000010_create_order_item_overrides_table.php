<?php
use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use Illuminate\Support\Facades\Schema;
return new class extends Migration{
  public function up():void{
    Schema::create('order_item_overrides',function(Blueprint $t){
      $t->id();
      $t->foreignId('order_item_id')->unique()->constrained()->cascadeOnDelete();
      $t->foreignId('lauk_1_id')->nullable()->constrained('dishes')->nullOnDelete();
      $t->foreignId('lauk_2_id')->nullable()->constrained('dishes')->nullOnDelete();
      $t->foreignId('karbo_id')->nullable()->constrained('dishes')->nullOnDelete();
      $t->foreignId('sayur_id')->nullable()->constrained('dishes')->nullOnDelete();
      $t->foreignId('buah_id')->nullable()->constrained('dishes')->nullOnDelete();
      $t->foreignId('pelengkap_id')->nullable()->constrained('dishes')->nullOnDelete();
      $t->timestamps();
    });
  } public function down():void{Schema::dropIfExists('order_item_overrides');}
};
