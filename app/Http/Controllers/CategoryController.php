<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category){
        $this->category = $category;
    }

    public function index(){
        return CategoryResource::collection(
            $this->category->all()
        );
    }

    public function store(CategoryRequest $request){
        $category = $this->category->create($request->all());

        if($category){
            $resource = new CategoryResource($category);

            return $resource->response()->setStatusCode(201);
        }

            return response(['error'=>'Category don´t created'])->setStatusCode(401);
    }

    public function update($id, CategoryRequest $request){
        $categoryExist = $this->category->find($id);

        if($categoryExist){
            $categoryExist->update($request->all());

            return response(['message'=>'Category updated with success'])->setStatusCode(200);
        }

        return response(['error'=> 'Category not found'])->setStatusCode(404);

    }

    public function destroy($id){
        $categoryExist = $this->category->find($id);

        if($categoryExist){
            $categoryExist->delete();

            return response(['message'=>'Category deleted with success'])->setStatusCode(200);
        }

        return response(['message'=> 'Category not found'])->setStatusCode(404);
    }



}
