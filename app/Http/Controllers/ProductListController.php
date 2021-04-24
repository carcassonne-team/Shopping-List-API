<?php

namespace App\Http\Controllers;

use App\ListContent;
use App\ProductList;
use App\SharedList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ProductListController extends Controller
{
    /**
     * @OA\Get(
     * path="/api/lists/",
     * summary="Get Product Lists",
     * description="Show all Product Lists belonging to a user",
     * operationId="getProductLists",
     * tags={"Product Lists"},
     * security={{ "Bearer": {} }},
     * @OA\Response(
     *    response=200,
     *    description="Success",
     *    @OA\JsonContent(
     *       @OA\Property(property="id", type="number", example="1"),
     *       @OA\Property(property="user_id", type="number", example="1")
     *       )
     *    )
     *
     *
     * )
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        return ProductList::where('user_id',$user_id)->with('list_content')->get();
    }

    /**
     * @OA\Post(
     * path="/api/lists/create",
     * summary="Get Product Lists",
     * description="Show all Product Lists",
     * operationId="getProductLists",
     * tags={"Product Lists"},
     * security={{ "Bearer": {} }},
     * @OA\Response(
     *    response=200,
     *    description="Success",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Product List has been created"),
     *       )
     *    )
     *
     *
     * )
     */
    public function create(Request $request)
    {
        $productList = new ProductList();
        $productList->user_id = Auth::user()->id;
        $productList->name = $request->name;
        $productList->share_code = hexdec(uniqid());
        $result=$productList->save();
        if($result)
        {
            return ["Result" =>"Product List has been added"];
        }
        else
        {
            return ["Result" =>"Add operation failed"];
        }
    }


    public function share(Request $request)
    {
        $sharedList = new SharedList();
        $sharedList->user_id = Auth::user()->id;
        $sharedList->product_list_id = DB::table("product_lists")->where('share_code',$request->share_code)->value('id');
        $result=$sharedList->save();

        if($result)
        {
            return ["Result" =>"Product List has been shared"];
        }
        else
        {
            return ["Result" =>"Share operation failed"];
        }
    }


    public function show()
    {
        $list_id = DB::table("shared_lists")->value('id');
        return ProductList::where('id',$list_id)->with('list_content')->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
