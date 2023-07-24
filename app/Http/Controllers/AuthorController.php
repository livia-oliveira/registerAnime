<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Http\Requests\AuthorRequest;
use App\Http\Resources\AuthorResource;



class AuthorController extends Controller
{
   private $author;

   public function __construct(Author $author){
        $this->author = $author;
   }

   public function index(){
    return AuthorResource::collection(
        $this->author->all()
    );
   }

   public function store(AuthorRequest $request){
        $author = $this->author->create($request(all()));

        if($author){
            $resource = new AuthorResource($author);

            return $resource->response()->setStatusCode(201);
        }

        return response(['error'=>'Author dont´t created'])->setStatusCode(401);
   }

   public function update($id, AuthorRequest $request){
        $authorExist = $this->author->find($id);

        if($authorExist){
            $authorExist->update($request->all());

            return response(['message'=>'Author created with success'])->setStatusCode(200);

        }
        return response(['error'=>'Author not found'])->setStatusCode(404);
   }

   public function destroy($id){
        $authorExist = $this->author->find($id);

        if($authorExist){
            $authorExist->delete();

            return response(['message'=>'Author deleted with success'])->setStatusCode(200);
        }

        return response(['error'=>'Author not found'])->setStatusCode(404);
   }

}
