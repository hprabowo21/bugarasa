<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\{Batch,MenuDay,Dish};
use Carbon\Carbon;
class BatchSeeder extends Seeder{
    public function run(): void{
        $batch = Batch::create([
            'name'=>'Batch Minggu Ini',
            'start_date'=>Carbon::now()->startOfWeek(),
            'end_date'=>Carbon::now()->startOfWeek()->addDays(4),
            'notes'=>'Contoh batch dengan menu lengkap',
        ]);
        $lauks = Dish::where('type','LAUK')->pluck('id')->toArray();
        $karbos = Dish::where('type','KARBO')->pluck('id')->toArray();
        $sayurs = Dish::where('type','SAYUR')->pluck('id')->toArray();
        $buahs = Dish::where('type','BUAH')->pluck('id')->toArray();
        $pelengkap = Dish::where('type','PELENKAP')->pluck('id')->toArray();
        for($day=1;$day<=5;$day++){
            MenuDay::create([
                'batch_id'=>$batch->id,
                'day_of_week'=>$day,
                'lauk_1_id'=>$lauks[array_rand($lauks)],
                'lauk_2_id'=>$lauks[array_rand($lauks)],
                'karbo_id'=>$karbos[array_rand($karbos)],
                'sayur_id'=>$sayurs[array_rand($sayurs)],
                'buah_id'=>$buahs[array_rand($buahs)],
                'pelengkap_id'=>$pelengkap[array_rand($pelengkap)],
            ]);
        }
    }
}
