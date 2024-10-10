<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::with('quizAnswers')->get();
        return response()->json([
            'message' => 'Success',
            'data' => $quizzes
        ], 200);
    }
}
