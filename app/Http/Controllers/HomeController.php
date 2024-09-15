<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;

class HomeController extends Controller
{
    public function index()
    {
        $data["getRecord"] = ProductModel::getActive();
        $data["getRecordTrash"] = ProductModel::getTrash();
        return view("home",$data);
    }
}
