<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;


class CategoryController extends Controller
{
    //
    function index($id=null)
    {
        return $id?Category::findOrFail($id):Category::all();
    }

    function create(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->created_by_user = true;
        $result=$category->save();

        if($result)
        {
            return ["Result" =>"Data has been saved"];
        }
        else
        {
            return ["Result" =>"Add operation failed"];
        }
    }

    function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->created_by_user = $request->created_by_user;
        $result=$category->save();

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
