<?php

namespace App\Http\Controllers;

use App\ProductList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        return ProductList::where('user_id',$user_id)->get();
    }

    /**
     * @OA\Post(
     * path="/api/lists/",
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
    public function create()
    {
        $productList = new ProductList();
        $productList->user_id = Auth::user()->id;
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
