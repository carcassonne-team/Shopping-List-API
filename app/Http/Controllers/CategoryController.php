<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;


class CategoryController extends Controller
{

    /**
     * @OA\Get(
     *  path="/api/categories/",
     * summary="Get categories",
     * description="Show all categories OR only one specific category by providing an ID number in the URL after the slash",
     * operationId="getCategories",
     * tags={"Categories"},
     * security={{ "Bearer": {} }},
     * @OA\Response(
     *    response=200,
     *    description="Categories:",
     *    @OA\JsonContent(
     *       @OA\Property(property="id", type="number", example="1"),
     *       @OA\Property(property="name", type="string", example="fruit"),
     *       @OA\Property(property="created_by_user", type="boolean", example="1")
     *       )
     *    )
     *
     * )
     */
    function index($id=null)
    {
        return $id?Category::findOrFail($id):Category::all();
    }

    /**
     * @OA\Post(
     * path="/api/categories/create",
     * summary="Create a category",
     * description="Create a category",
     * operationId="postCategories",
     * tags={"Categories"},
     * security={{ "Bearer": {} }},
     * @OA\RequestBody(
     *    required=true,
     *    description="Provide the name for your category:",
     *    @OA\JsonContent(
     *       required={"name"},
     *       @OA\Property(property="name", type="string", example="Vegetables"),
     *    ),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Success",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Category has been added")
     *        )
     *     )
     * )
     */
    function create(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->created_by_user = true;
        $result=$category->save();

        if($result)
        {
            return ["Result" =>"Category has been added"];
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

    /**
     * @OA\Delete (
     * path="/api/category/{id}",
     * summary="Delete a category",
     * description="Delete a category",
     * operationId="deleteProduct",
     * tags={"Categories"},
     * security={{ "Bearer": {} }},
     * @OA\Response(
     *    response=200,
     *    description="Success",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Category has been deleted")
     *        )
     *     )
     * )
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $result=$category->delete();

        if($result)
        {
            return ["Result" =>"Category has been deleted"];
        }
        else
        {
            return ["Result" =>"Delete operation failed"];
        }
    }
}
