<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\AnimeAuthorResource;
use App\Http\Requests\AnimeAuthorRequest;
use App\Models\AnimeAuthor;

class AnimeAuthorController extends Controller
{
    private $animeAuthor;

    public function __construct(AnimeAuthor $animeAuthor){
        return $this->animeAuthor = $animeAuthor;
    }

    public function index(){
        return AnimeAuthorResource::collection(
            $this->animeAuthor->all()
        );
    }

    public function store(AnimeAuthorRequest $request){
        $animeAuthor = $this->animeAuthor->create($request->all());

        if($animeAuthor){
            $resource = new AnimeAuthorResource($animeAuthor);

            return $resource->response()->setStatusCode(201);
        }

        return response(['error'=>'AnimeAuthor don´t created'])->setStatusCode(401);
    }

    public function update($id, AnimeAuthorRequest $request){
        $animeAuthorExist = $this->animeAuthor->find($id);

        if($animeAuthorExist){
            $request->update($request->all());

            return response(['message'=>'AnimeAuthor updated with success'])->setStatusCode(200);
        }

        return response(['error'=>'AnimeAuthor not found'])->setStatusCode(404);
    }

    public function destroy($id){
        $animeAuthorExist = $this->animeAuthor->find($id);

        if($animeAuthorExist){
            $animeAuthorExist->delete();

            return response(['message'=>'AnimeAuthor deleted with success'])->setStatusCode(200);
        }

        return response(['error'=>'AnimeAuthor deleted with success'])->setStatusCode(404);
    }


}
