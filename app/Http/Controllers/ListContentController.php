<?php

namespace App\Http\Controllers;

use App\ListContent;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ListContentController extends Controller
{
    /**
     * @OA\Get(
     * path="/api/list_content/{id}",
     * summary="Get Products on a List",
     * description="Show all Products on a List",
     * operationId="getListContent",
     * tags={"ListContent"},
     * security={{ "Bearer": {} }},
     * @OA\Response(
     *    response=200,
     *    description="Success",
     *    @OA\JsonContent(
     *       @OA\Property(property="id", type="number", example="1"),
     *       @OA\Property(property="product_list_id", type="number", example="1"),
     *       @OA\Property(property="product_id", type="number", example="1")
     *       )
     *    )
     *
     *
     * )
     */
    public function index($id=null)
    {
        return ListContent::where('product_list_id',$id)->with('product')->get();
    }

    /**
     * @OA\Post(
     * path="/api/list_content/add",
     * summary="Add a product to a list (list_content)",
     * description="Add a product to a list (list_content)",
     * operationId="postListContent",
     * tags={"ListContent"},
     * security={{ "Bearer": {} }},
     * @OA\RequestBody(
     *    required=true,
     *    description="Provide product list id and product id",
     *    @OA\JsonContent(
     *       required={"product_list_id","product_id"},
     *       @OA\Property(property="product_list_id", type="number", example="1"),
     *       @OA\Property(property="product_id", type="number", example="1")
     *    ),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Success",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Product has been added to the basket")
     *        )
     *     )
     * )
     */
    public function add(Request $request)
    {
        $list_content = new ListContent();
        $list_content->product_list_id = $request->product_list_id;
        $list_content->product_id = $request->product_id;
        $list_content->save();
        return response()->json([
            'message' => 'Product has been added to the List (ListContent)'
        ],Response::HTTP_OK);
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
