<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Dish;
class DishSeeder extends Seeder{
    public function run(): void{
        $dishes = [
            ['name'=>'Ayam Bakar Madu','type'=>'LAUK'],
            ['name'=>'Ikan Salem Bumbu Kuning','type'=>'LAUK'],
            ['name'=>'Nasi Putih','type'=>'KARBO'],
            ['name'=>'Nasi Merah','type'=>'KARBO'],
            ['name'=>'Tumis Pakcoy Wortel','type'=>'SAYUR'],
            ['name'=>'Sayur Asem','type'=>'SAYUR'],
            ['name'=>'Semangka','type'=>'BUAH'],
            ['name'=>'Pisang','type'=>'BUAH'],
            ['name'=>'Sambal Terasi','type'=>'PELENKAP'],
        ];
        foreach($dishes as $dish){
            Dish::create($dish);
        }
    }
}
