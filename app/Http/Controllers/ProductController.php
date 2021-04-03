<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index($id=null)
    {
        return $id?Product::findOrFail($id):Product::all();
    }

    public function create(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $result=$product->save();

        if($result)
        {
            return ["Result" =>"Data has been saved"];
        }
        else
        {
            return ["Result" =>"Add operation failed"];
        }
    }

    public function update(Request $request,$id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $result=$product->save();

        if($result)
        {
            return ["Result" =>"Data has been updated"];
        }
        else
        {
            return ["Result" =>"Update operation failed"];
        }
    }

}
