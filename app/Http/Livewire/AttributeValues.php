<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\AttributeValue;

class AttributeValues extends Component
{
    public $value, $price, $attribute_id, $value_id;
    public $values;
    public $updateMode = false;

    public function mount($id){
        $this->attribute_id = $id;
    }

    private function resetInputFields(){
        $this->value = '';
        $this->price = '';
    }

    public function create(){
        $this->validate([
            'value' => 'required',
            'price' => 'required'
        ]);

        AttributeValue::create([
            'attribute_id' => $this->attribute_id,
            'value' => $this->value,
            'price' => $this->price
        ]);
        $this->resetInputFields();
        session()->flash('message', 'Attribute Value Created Successfully!');
    }

    public function edit($id){
        $attValue = AttributeValue::findOrFail($id);
        $this->value_id = $id;
        $this->attribute_id = $attValue->attribute_id;
        $this->value = $attValue->value;
        $this->price = $attValue->price;
        $this->updateMode = true;
    }

    public function cancel(){
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update(){
        $upValue = AttributeValue::find($this->value_id);
        $upValue->update([
            'value' => $this->value,
            'price' => $this->price
        ]);
        $this->updateMode = false;
        session()->flash('message', 'Attribute value updated successfully!');
    }

    public function delete($id){
        $val = AttributeValue::find($id);
        $val->delete();
        $this->values = $this->values->except($id);
        session()->flash('message', 'Attribute value deleted successfully!');
    }

    public function render(){
        $this->values = AttributeValue::where('attribute_id',$this->attribute_id)->latest()->get();
        return view('livewire.attribute-values');
    }
}
