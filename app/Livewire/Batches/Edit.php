<?php
namespace App\Livewire\Batches;

use Livewire\Component;
use App\Models\{Batch, MenuDay, Dish};
use App\Support\DayOfWeek;

class Edit extends Component
{
    public Batch $batch;
    public int $day = 1;
    public $lauk_1_id = null, $lauk_2_id = null, $karbo_id = null, $sayur_id = null, $buah_id = null, $pelengkap_id = null;

    protected $rules = [
        'day' => 'required|integer|min:1|max:5',
        'lauk_1_id' => 'nullable|exists:dishes,id',
        'lauk_2_id' => 'nullable|exists:dishes,id',
        'karbo_id' => 'nullable|exists:dishes,id',
        'sayur_id' => 'nullable|exists:dishes,id',
        'buah_id' => 'nullable|exists:dishes,id',
        'pelengkap_id' => 'nullable|exists:dishes,id',
    ];

    public function mount(Batch $batch)
    {
        $this->batch = $batch;
        $this->loadDay(1);
    }

    public function loadDay($d)
    {
        $this->day = (int)$d;
        $md = MenuDay::firstOrCreate(['batch_id'=>$this->batch->id,'day_of_week'=>$this->day]);
        $this->lauk_1_id = $md->lauk_1_id;
        $this->lauk_2_id = $md->lauk_2_id;
        $this->karbo_id  = $md->karbo_id;
        $this->sayur_id  = $md->sayur_id;
        $this->buah_id   = $md->buah_id;
        $this->pelengkap_id = $md->pelengkap_id;
    }

    public function save()
    {
        $data = $this->validate();
        $md = MenuDay::firstOrCreate(['batch_id'=>$this->batch->id,'day_of_week'=>$this->day]);
        $md->update([
            'lauk_1_id'=>$this->lauk_1_id,
            'lauk_2_id'=>$this->lauk_2_id,
            'karbo_id'=>$this->karbo_id,
            'sayur_id'=>$this->sayur_id,
            'buah_id'=>$this->buah_id,
            'pelengkap_id'=>$this->pelengkap_id,
        ]);
        session()->flash('ok','Menu hari '.$this->dayLabel().' disimpan');
    }

    public function dayLabel(): string { return DayOfWeek::label($this->day); }

    public function render()
    {
        $options = [
            'lauk' => Dish::lauk()->orderBy('name')->get(),
            'karbo'=> Dish::karbo()->orderBy('name')->get(),
            'sayur'=> Dish::sayur()->orderBy('name')->get(),
            'buah' => Dish::buah()->orderBy('name')->get(),
            'pelengkap'=> Dish::pelengkap()->orderBy('name')->get(),
        ];
        return view('livewire.batches.edit', compact('options'))->layout('layouts.app');
    }
}
