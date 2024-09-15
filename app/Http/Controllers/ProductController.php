<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use Str;

class ProductController extends Controller
{
    // Product Add Functionality
    public function add()
    {
        return view("product.add");
    }

    // Product Insert Functionality
    public function insert(Request $request)
    {
        $data = request()->validate([
            "title"             => "required",
            "old_price"         => "required",
            "new_price"         => "required",
            "color"             => "required",
            "short_description" => "required",
            "description"       => "required"
        ]);
        $data = new ProductModel();
        $data->title                = trim($request->title);
        $data->old_price            = trim($request->old_price);
        $data->new_price            = trim($request->new_price);
        $data->color                = trim($request->color);
        $data->short_description    = trim($request->short_description);
        $data->description          = trim($request->description);
        $data->status               = trim($request->status);
        if(!empty($request->file('image'))){
            $file       = $request->file('image');
            $randomStr  = Str::random(10);
            $filename   = $randomStr . '.' . $file->getClientOriginalExtension();
            $file->move('public/images/product', $filename);
            $data->image = $filename;
        }
        $data->save();
        return redirect(route('home.index'))->with("message","data insert successfully");
    }

    // Product Edit Functionality
    public function edit($id)
    {
        $data["getRecord"] = ProductModel::getSingle($id);
        return view("product.edit", $data);
    }

    // Product Update Functionality
    public function update(Request $request, $id)
    {
        $data = ProductModel::find($id);
        $data->title                = trim($request->title);
        $data->old_price            = trim($request->old_price);
        $data->new_price            = trim($request->new_price);
        $data->color                = trim($request->color);
        $data->short_description    = trim($request->short_description);
        $data->description          = trim($request->description);
        $data->status               = trim($request->status);
        if(!empty($request->file('image'))){
            if(!empty($data->image) && file_exists('public/images/product/'.$data->image))
            {
                unlink('public/images/product/'.$data->image);
            }
            $file       = $request->file('image');
            $randomStr  = Str::random(10);
            $filename   = $randomStr . '.' . $file->getClientOriginalExtension();
            $file->move('public/images/product', $filename);
            $data->image = $filename;
        }
        $data->save();
        return redirect(route('home.index'))->with("message","data updated successfully");
    }

    // Product Trash Functionality
    public function softdelete($id)
    {
        $data = ProductModel::find($id);
        $data->isDelete = 1;
        $data->save();
        return redirect()->back()->with("message","data trash successfully");
    }

    // Trash List Functionality
    public function trash()
    {
        $data["getRecord"] = ProductModel::getTrash();
        return view("product.trash", $data);
    }

    //
    public function recycle($id)
    {
        $data = ProductModel::find($id);
        $data->isDelete = 0;
        $data->save();
        return redirect()->back()->with("message","data recycle successfully");
    }

    //
    public function delete($id)
    {
        $data = ProductModel::find($id);
        if(!empty($data->image) && file_exists('public/images/product/'.$data->image))
            {
                unlink('public/images/product/'.$data->image);
            }
        $data->delete();
        return redirect()->back()->with("warning","data parmanent delete successfully");
    }
}
