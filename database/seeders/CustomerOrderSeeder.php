<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\{Customer,Order,MenuDay,OrderItem};
class CustomerOrderSeeder extends Seeder{
    public function run(): void{
        $customer = Customer::create([
            'name'=>'Hanung Prabowo',
            'phone'=>'6288905356781',
            'notes'=>'Contoh customer full batch',
        ]);
        $batchId = \App\Models\Batch::first()->id;
        $order = Order::create([
            'customer_id'=>$customer->id,
            'batch_id'=>$batchId,
            'type'=>'FULL_BATCH',
            'notes'=>null,
        ]);
        $menuDays = MenuDay::where('batch_id',$batchId)->get();
        foreach($menuDays as $day){
            OrderItem::create([
                'order_id'=>$order->id,
                'menu_day_id'=>$day->id,
                'portion_multiplier'=>1.0,
                'custom_requests'=>null,
                'swaps'=>null,
            ]);
        }
    }
}
