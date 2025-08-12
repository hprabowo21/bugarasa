<?php
namespace App\Livewire\Customers;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Customer;

class Index extends Component
{
    use WithPagination;
    public $showForm=false, $editingId=null, $name='', $phone='', $notes='';

    protected $rules=[
        'name'=>'required|string|max:255',
        'phone'=>'nullable|string|max:50',
        'notes'=>'nullable|string',
    ];

    public function create(){ $this->resetForm(); $this->showForm=true; }
    public function edit($id){ $c=Customer::findOrFail($id); $this->editingId=$c->id; $this->name=$c->name; $this->phone=$c->phone; $this->notes=$c->notes; $this->showForm=true; }
    public function save(){ $data=$this->validate(); Customer::updateOrCreate(['id'=>$this->editingId],$data); $this->resetForm(); session()->flash('ok','Customer saved'); }
    public function delete($id){ Customer::findOrFail($id)->delete(); session()->flash('ok','Customer deleted'); }
    private function resetForm(){ $this->reset(['editingId','name','phone','notes','showForm']); }

    public function render(){
        $customers=Customer::orderBy('name')->paginate(10);
        return view('livewire.customers.index',compact('customers'))->layout('layouts.app');
    }
}
