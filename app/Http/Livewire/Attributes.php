<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Attribute;
use App\ProductAttributes;
use App\AttributeValue;

class Attributes extends Component
{
    public $value, $price, $qty, $attribute_id, $product_id, $product_attribute_id;
    public $attributes;
    public $attributeNames;
    public $attributeValues;
    public $updateMode = false;

    public function mount($id){
        $this->product_id = $id;
    }

    private function resetInputFields(){
        $this->value = '';
        $this->price = '';
        $this->qty = '';
        $this->attribute_id = '';
    }

    public function create(){
        $this->validate([
            'value' => 'required',
            'price' => 'required'
        ]);

        Attribute::create([
            'attribute_id' => $this->attribute_id,
            'products_id' => $this->product_id,
            'value' => $this->value,
            'quantity' => $this->qty,
            'price' => $this->price
        ]);
        $this->resetInputFields();
        session()->flash('message', 'Attribute Created Successfully!');
    }

    public function edit($id){
        $attEdit = Attribute::findOrFail($id);
        $this->product_attribute_id = $id;
        $this->attribute_id = $attEdit->attribute_id;
        $this->product_id = $attEdit->products_id;
        $this->value = $attEdit->value;
        $this->price = $attEdit->price;
        $this->qty = $attEdit->quantity;
        $this->updateMode = true;
    }

    public function cancel(){
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update(){
        $upValue = Attribute::find($this->product_attribute_id);
        $upValue->update([
            'attribute_id' => $this->attribute_id,
            'products_id' => $this->product_id,
            'value' => $this->value,
            'quantity' => $this->qty,
            'price' => $this->price
        ]);
        $this->updateMode = false;
        $this->resetInputFields();
        session()->flash('message', 'Attribute updated successfully!');
    }

    public function delete($id){
        $val = Attribute::find($id);
        $val->delete();
        $this->attributes = $this->attributes->except($id);
        session()->flash('message', 'Attribute deleted successfully!');
    }

    public function render(){
        $this->attributes = Attribute::where('products_id',$this->product_id)->latest()->get();
        $this->attributeNames = ProductAttributes::latest()->get();
        $this->attributeValues = AttributeValue::latest()->get();
        return view('livewire.attributes');
    }
}
