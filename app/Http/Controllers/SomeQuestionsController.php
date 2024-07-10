<?php

namespace App\Http\Controllers;

use App\Models\SomeQuestions;

class SomeQuestionsController extends Controller
{
    public function getQuestionsData(){
        $data = SomeQuestions::all();
       return response()->json($data);
    }
}
