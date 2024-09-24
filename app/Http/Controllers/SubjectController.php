<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Package;
use App\Models\Quiz;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::with('package')->get();
        return view('pages.subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $packages = Package::all();
        return view('pages.subjects.create', compact('packages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'package_id' => 'required|exists:packages,id',
        ]);

        Subject::create($request->all());

        return redirect()->route('subjects.index')->with('success', 'Subject created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        $packages = Package::all();
        return view('pages.subjects.edit', compact('subject', 'packages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'package_id' => 'required|exists:packages,id',
        ]);

        $subject->update($request->all());

        return redirect()->route('subjects.index')->with('success', 'Subject updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->route('subjects.index')->with('success', 'Subject deleted successfully.');
    }

    public function addQuiz(Subject $subject)
    {
        // Mengambil semua quiz yang belum terhubung dengan subject ini
        $availableQuizzes = Quiz::whereDoesntHave('subjects', function($query) use ($subject) {
            $query->where('subjects.id', $subject->id);
        })->get();

        // Mengambil quiz yang sudah terhubung dengan subject ini
        $assignedQuizzes = $subject->quizzes;

        return view('pages.subjects.quiz.index', compact('subject', 'availableQuizzes', 'assignedQuizzes'));
    }

    public function assignQuiz(Subject $subject, Quiz $quiz)
    {
        $subject->quizzes()->attach($quiz->id);

        return redirect()->route('subjects.quiz.index', $subject)->with('success', 'Quiz berhasil ditambahkan.');
    }

    public function removeQuiz(Subject $subject, Quiz $quiz)
    {
        $subject->quizzes()->detach($quiz->id);

        return redirect()->route('subjects.quiz.index', $subject)->with('success', 'Quiz berhasil dihapus.');
    }
}
