<?php

namespace App\Http\Controllers;

use App\Http\Resources\SaveQuestionResource;
use App\Models\Question;
use App\Models\SaveQuestion;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaveQuestionController extends Controller
{

    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SaveQuestionResource::collection(SaveQuestion::where('author_id', Auth::user()->id)->get()); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(int $id)
    {
        SaveQuestion::create([
            'author_id' => Auth::user()->id,
            'question_id' => Question::find($id)->id,
        ]);

        return $this->successResponse(null, message: "STORE_SAVE_SUCCESS");
    }

    /**
     * Display the specified resource.
     */
    public function show(SaveQuestion $saveQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SaveQuestion $saveQuestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SaveQuestion $saveQuestion)
    {
        //
    }
}
