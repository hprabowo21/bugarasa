<?php
namespace App\Livewire\Dishes;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Dish;

class Index extends Component
{
    use WithPagination;

    public $showForm = false;
    public $editingId = null;
    public $name = '';
    public $type = 'LAUK';
    public $default_yield_portion = null;
    public $notes = '';

    protected $rules = [
        'name' => 'required|string|max:255',
        'type' => 'required|in:LAUK,SAYUR,KARBO,BUAH,PELENKAP',
        'default_yield_portion' => 'nullable|integer|min:1',
        'notes' => 'nullable|string',
    ];

    public function create()
    {
        $this->resetForm();
        $this->showForm = true;
    }

    public function edit($id)
    {
        $dish = Dish::findOrFail($id);
        $this->editingId = $dish->id;
        $this->name = $dish->name;
        $this->type = $dish->type;
        $this->default_yield_portion = $dish->default_yield_portion;
        $this->notes = $dish->notes;
        $this->showForm = true;
    }

    public function save()
    {
        $data = $this->validate();
        Dish::updateOrCreate(
            ['id' => $this->editingId],
            $data
        );
        $this->resetForm();
        session()->flash('ok', 'Dish saved');
    }

    public function delete($id)
    {
        Dish::findOrFail($id)->delete();
        session()->flash('ok', 'Dish deleted');
    }

    private function resetForm()
    {
        $this->reset(['editingId','name','type','default_yield_portion','notes','showForm']);
        $this->type = 'LAUK';
    }

    public function render()
    {
        $dishes = Dish::orderBy('type')->orderBy('name')->paginate(10);
        return view('livewire.dishes.index', compact('dishes'))->layout('layouts.app');
    }
}
