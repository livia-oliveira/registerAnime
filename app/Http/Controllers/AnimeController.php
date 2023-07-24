<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;
use App\Http\Resources\AnimeResource;
use App\Http\Requests\AnimeRequest;

class AnimeController extends Controller
{
    private $anime;

    public function __construct(Anime $anime){
        $this->anime = $anime;
    }

    public function index(){
        return AnimeResource::collection(
            $this->anime->all()
        );
    }

    public function store(AnimeRequest $request){
        $anime = $this->anime->create($request->all());

        if($anime){
            $resource = new AnimeResource($anime);

            return $resource->response()->setStatusCode(201);
        }

        return response(['error'=>'Anime don´t created'])->setStatusCode(401);
    }

    public function update($id, AnimeRequest $request){
        $animeExist = $this->anime->find($id);

        if($animeExist){
            $animeExist->update($request->all());

            return response(['message'=>'Anime updated with success'])->setStatusCode(200);
        }

        return response(['error'=>'Anime not found'])->setStatusCode(404);
    }

    public function destroy($id){
        $animeExist = $this->anime->find($id);

        if($animeExist){
            $animeExist->delete();

            return response(['message'=>'Anime deleted with success'])->setStatusCode(200);
        }

        return response(['error'=>'Anime not found'])->setStatusCode(404);
    }
}
