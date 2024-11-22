<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Score;
use Illuminate\Support\Facades\Auth;
class ScoreController extends Controller
{
    public function index(Subject $subject)
    {
        $scores = $subject->scores;
        return view('pages.subjects.score.index', compact('subject', 'scores'));
    }

    public function create(Subject $subject)
    {
        $students = $subject->students;
        return view('pages.subjects.score.create', compact('subject', 'students'));
    }

    public function store(Request $request, Subject $subject)
    {
        // Buat score baru
        $score = $subject->scores()->create([
            'student_id' => $request->student_id,
            'user_id' => Auth::user()->id,
        ]);

        // Simpan score details
        foreach ($request->score_details as $detail) {
            $score->scoreDetails()->create([
                'name' => $detail['name'],
                'score' => $detail['score']
            ]);
        }

        return redirect()
            ->route('subjects.scores.index', $subject->id)
            ->with('success', 'Nilai berhasil ditambahkan');
    }

    public function edit(Subject $subject, Score $score)
    {
        return view('pages.subjects.score.edit', compact('subject', 'score'));
    }

    public function update(Request $request, Score $score)
    {
        // Update student_id jika berubah
        $score->update([
            'student_id' => $request->student_id
        ]);

        // Hapus score details yang lama
        $score->scoreDetails()->delete();

        // Buat score details yang baru
        foreach ($request->score_details as $detail) {
            $score->scoreDetails()->create([
                'name' => $detail['name'],
                'score' => $detail['score']
            ]);
        }

        return redirect()
            ->route('subjects.scores.index', $score->subject_id)
            ->with('success', 'Nilai berhasil diperbarui');
    }

    public function destroy(Subject $subject, Score $score)
    {
        $score->scoreDetails()->delete(); // Hapus score details terlebih dahulu
        $score->delete();
        return redirect()
            ->route('subjects.scores.index', $subject->id)
            ->with('success', 'Nilai berhasil dihapus');
    }
}
