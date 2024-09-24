<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::all();
        return view('pages.quiz.index', compact('quizzes'));
    }

    public function store(Request $request)
    {
        Quiz::create($request->all());
        return redirect()->route('quiz.index')->with('success', 'Quiz created successfully');
    }

    public function update(Quiz $quiz, Request $request)
    {
        $quiz->update($request->all());
        return redirect()->route('quiz.index')->with('success', 'Quiz updated successfully');
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return redirect()->route('quiz.index')->with('success', 'Quiz deleted successfully');
    }
}
