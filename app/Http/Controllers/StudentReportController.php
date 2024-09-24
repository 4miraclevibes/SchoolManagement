<?php

namespace App\Http\Controllers;
use App\Models\Report;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentReportController extends Controller
{
    public function index(Student $student)
    {
        $reports = Report::where('student_id', $student->id)->get();
        return view('pages.students.reports.index', compact('reports', 'student'));
    }

    public function store(Student $student, Request $request)
    {
        $request->validate([
            'url' => 'required|string',
        ]);
        Report::create([
            'student_id' => $student->id,
            'url' => $request->url,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('students.reports.index', $student->id)->with('success', 'Report created successfully');
    }

    public function destroy(Report $report)
    {
        $report->delete();
        return redirect()->route('students.reports.index', $report->student_id)->with('success', 'Report deleted successfully');
    }
}
