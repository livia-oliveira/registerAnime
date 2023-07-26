<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnimeCategory;
use App\Http\Requests\AnimeCategoryRequest;
use App\Http\Resources\AnimeCategoryResource;

class AnimeCategoryController extends Controller
{
    private $animeCategory;

    public function __construct(AnimeCategory $animeCategory){
        return $this->animeCategory = $animeCategory;
    }

    public function index(){
        return AnimeCategoryResource::collection(
            $this->animeCategory->all()
        );
    }

    public function store(AnimeCategoryRequest $request){
        $animeCategory = $this->animeCategory->create($request->all());

        if($animeCategory){
            $resource = new AnimeCategoryResource($animeCategory);

            return $resource->response()->setStatusCode(201);
        }

        return response(['error'=>'AnimeCategory don´t created'])->setStatusCode(401);
    }

    public function update($id, AnimeCategoryRequest $request){
        $animeCategoryExist = $this->animeCategory->find($id);

        if($animeCategoryExist){
            $request->update($request->all());

            return response(['message'=>'AnimeCategory updated with success'])->setStatusCode(200);
        }

        return response(['message'=>'AnimeCategory not found'])->setStatusCode(404);
    }

    public function destroy($id){
        $animeCategoryExist = $this->animeCategory->find($id);

        if($animeCategoryExist){
            $animeCategoryExist->delete();

            return response(['message'=>'AnimeCategory deleted with success'])->setStatusCode(200);
        }

        return response(['message'=>'AnimeCategory not found'])->setStatusCode(404);
    }


}
