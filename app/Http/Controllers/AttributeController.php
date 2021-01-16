<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductAttributes;

class AttributeController extends Controller
{
    public function index(){
        $attributes = ProductAttributes::all();
        return view('admin.attributes.index', compact('attributes'));
    }

    public function create(){
        return view('admin.attributes.create');
    }

    public function store(Request $request){
        $filterable = $request->is_filterable;
        if($filterable == "on"){
            $filterable = 1;
        }else{
            $filterable = 0;
        }
            $required = $request->is_required;
        if($required == "on"){
            $required = 1;
        }else{
            $required = 0;
        }
        $data = $request->all();
        $attribute = new ProductAttributes;
        $attribute->code = $data['code'];
        $attribute->name = $data['name'];
        $attribute->frontend_type = $data['frontend_type'];
        $attribute->is_filterable = $filterable;
        $attribute->is_required = $required;
        
        if (!$attribute) {
            return redirect('/admin/attributes/create')->with('flash_message_error', 'Error occurred while creating attribute!');
        }
        $attribute->save();
        return redirect('/admin/attributes/create')->with('flash_message_success', 'Attribute added successfully!');
    }
    public function edit(Request $req, $id = null){
        $attribute = ProductAttributes::find($id);
        if($req->isMethod('post')){
            $data = $req->all();
            $filterable = $req->is_filterable;
            if($filterable == "on"){
                $filterable = 1;
            }else{
                $filterable = 0;
            }
            $required = $req->is_required;
            if($required == "on"){
                $required = 1;
            }else{
                $required = 0;
            }
            ProductAttributes::where(['id'=>$id])->update(['code'=>$data['code'],'name'=>$data['name'],'frontend_type'=>$data['frontend_type'],'is_filterable'=>$filterable,'is_required'=>$required]);
            $attributeEdit = ProductAttributes::find($id);
            $attributeEdit->save();
            return redirect('admin/attributes')->with('flash_message_success', 'Attribute Updated Successfully!');
        }
        return view('admin.attributes.edit', compact('attribute','id'));
    }

    public function delete($id)
    {
        $delete = ProductAttributes::where('id', $id)->delete();
        if ($delete == 1) {
            $success = true;
            $message = "Attribute deleted successfully!";
        } else {
            $success = true;
            $message = "Attribute not found";
        }
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

}
