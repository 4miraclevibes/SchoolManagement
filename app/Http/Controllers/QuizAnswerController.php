<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\QuizAnswer;

class QuizAnswerController extends Controller
{
    public function store(Request $request, Quiz $quiz)
    {
        $quiz->quizAnswers()->create($request->all());
        return redirect()->back()->with('success', 'Quiz answer created successfully');
    }

    public function update(Request $request, QuizAnswer $quizAnswer)
    {
        $data = $request->all();
        $data['quiz_id'] = $quizAnswer->quiz_id;
        if ($request->has('is_correct')) {
            $data['is_correct'] = true;
        } else {
            $data['is_correct'] = false;
        }
        $quizAnswer->update($data);
        return redirect()->back()->with('success', 'Quiz answer updated successfully');
    }

    public function destroy(QuizAnswer $quizAnswer)
    {
        $quizAnswer->delete();
        return redirect()->back()->with('success', 'Quiz answer deleted successfully');
    }
}
