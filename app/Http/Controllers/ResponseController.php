<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResponseRequest;
use App\Http\Requests\UpdateResponseRequest;
use App\Http\Resources\ResponseResource;
use App\Models\Question;
use App\Models\Response;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\Auth;

class ResponseController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ResponseResource::collection(Response::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreResponseRequest $request, $id)
    {
        $request->validated($request->all());

        Response::create([
            'description' => $request->description,
            'author_id' => Auth::user()->id,
            'question_id' => Question::find($id)->id
        ]);

        return $this->successResponse(null, "STORE_RESPONSE_SUCCESS");
    }

    /**
     * Display the specified resource.
     */
    public function show(Response $response)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateResponseRequest $request, Response $response)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Response $response)
    {
        //
    }
}
