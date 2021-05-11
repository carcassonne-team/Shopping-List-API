<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * @OA\Get(
     * path="/api/products/",
     * summary="Get products",
     * description="Show all products",
     * operationId="getProducts",
     * tags={"Products"},
     * security={{ "Bearer": {} }},
     * @OA\Response(
     *    response=200,
     *    description="Success",
     *    @OA\JsonContent(
     *       @OA\Property(property="id", type="number", example="1"),
     *       @OA\Property(property="name", type="string", example="Plum"),
     *       @OA\Property(property="category_id", type="number", example="1")
     *       )
     *    )
     * )
     */
    public function index()
    {
        return Product::with('category')->get();
    }

    /**
     * @OA\Get(
     *  path="/api/products/{id}",
     * summary="Get products by category",
     * description="Show all products from specific category by providing a category ID after the slash",
     * operationId="getProductsByCategory",
     * tags={"Products"},
     * security={{ "Bearer": {} }},
     * @OA\Response(
     *    response=200,
     *    description="Success",
     *    @OA\JsonContent(
     *       @OA\Property(property="id", type="number", example="1"),
     *       @OA\Property(property="name", type="string", example="Plum"),
     *       @OA\Property(property="category_id", type="number", example="1")
     *       )
     *    )
     *
     *
     * )
     */
    public function indexByCategory($id)
    {
        return Product::where('category_id', $id)->with('category')->get();
    }

    /**
     * @OA\Post(
     * path="/api/products/create",
     * summary="Create a product",
     * description="Create a product",
     * operationId="postProduct",
     * tags={"Products"},
     * security={{ "Bearer": {} }},
     * @OA\RequestBody(
     *    required=true,
     *    description="Provide the name for your product and it's category ID:",
     *    @OA\JsonContent(
     *       required={"name","category_id"},
     *       @OA\Property(property="name", type="string", example="Potato"),
     *       @OA\Property(property="category_id", type="number", example="2"),
     *    ),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Success",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Product has been added")
     *        )
     *     )
     * )
     */
    public function create(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $result = $product->save();

        if ($result) {
            return ["Result" => "Data has been saved"];
        } else {
            return ["Result" => "Add operation failed"];
        }
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $result = $product->save();

        if ($result) {
            return ["Result" => "Data has been updated"];
        } else {
            return ["Result" => "Update operation failed"];
        }
    }

    /**
     * @OA\Delete (
     * path="/api/product/{id}",
     * summary="Delete a product",
     * description="Delete a product",
     * operationId="deleteProduct",
     * tags={"Products"},
     * security={{ "Bearer": {} }},
     * @OA\Response(
     *    response=200,
     *    description="Success",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Product has been deleted")
     *        )
     *     )
     * )
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $result = $product->delete();

        if ($result) {
            return ["Result" => "Product has been deleted"];
        } else {
            return ["Result" => "Delete operation failed"];
        }
    }

}
