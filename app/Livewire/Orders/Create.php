<?php
namespace App\Livewire\Orders;

use Livewire\Component;
use App\Models\{Order, OrderItem, Customer, Batch, MenuDay};
use Illuminate\Validation\Rule;

class Create extends Component
{
    public $customer_id = null;
    public $batch_id = null;
    public $type = 'FULL_BATCH';
    public $days = []; // for PER_DAY (array of ints 1..5)
    public $custom_requests = ''; // JSON raw optional
    public $swaps = '';           // JSON raw optional

    protected function rules()
    {
        return [
            'customer_id' => ['required','exists:customers,id'],
            'batch_id' => ['required','exists:batches,id'],
            'type' => ['required', Rule::in(['FULL_BATCH','PER_DAY'])],
            'days' => ['nullable','array'],
            'days.*' => ['integer','min:1','max:5'],
            'custom_requests' => ['nullable','string'],
            'swaps' => ['nullable','string'],
        ];
    }

    public function save()
    {
        $data = $this->validate();
        $order = Order::create([
            'customer_id' => $this->customer_id,
            'batch_id' => $this->batch_id,
            'type' => $this->type,
            'notes' => null,
        ]);

        $targetDays = $this->type === 'FULL_BATCH' ? [1,2,3,4,5] : array_values(array_unique(array_map('intval', $this->days ?? [])));

        foreach ($targetDays as $d) {
            $menuDay = MenuDay::firstOrCreate(['batch_id'=>$this->batch_id,'day_of_week'=>$d]);
            OrderItem::create([
                'order_id' => $order->id,
                'menu_day_id' => $menuDay->id,
                'portion_multiplier' => 1.0,
                'custom_requests' => $this->decodeJson($this->custom_requests),
                'swaps' => $this->decodeJson($this->swaps),
            ]);
        }

        session()->flash('ok','Order dibuat (items: '.count($targetDays).')');
        $this->reset(['customer_id','batch_id','type','days','custom_requests','swaps']);
        $this->type = 'FULL_BATCH';
    }

    private function decodeJson($raw)
    {
        if (!$raw) return null;
        try { $v = json_decode($raw, true, 512, JSON_THROW_ON_ERROR); return $v; }
        catch (\Throwable $e) { session()->flash('err','JSON tidak valid: '.$e->getMessage()); return null; }
    }

    public function render()
    {
        $customers = Customer::orderBy('name')->get();
        $batches = Batch::orderBy('start_date','desc')->get();
        return view('livewire.orders.create', compact('customers','batches'))->layout('layouts.app');
    }
}
