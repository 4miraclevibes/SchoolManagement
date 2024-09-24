@extends('layouts.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mt-2">
        <h5 class="card-header">Table Quizzes Tersedia</h5>
        <div class="table-responsive text-nowrap p-3">
            <table class="table" id="example">
                <thead>
                    <tr class="text-nowrap table-dark">
                        <th class="text-white">No</th>
                        <th class="text-white">Name</th>
                        <th class="text-white">Description</th>
                        <th class="text-white">Explanation</th>
                        <th class="text-white">Passing Score</th>
                        <th class="text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($availableQuizzes as $quiz)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $quiz->name }}</td>
                        <td>{{ $quiz->description }}</td>
                        <td>{{ $quiz->explanation }}</td>
                        <td>{{ $quiz->passing_score }}</td>
                        <td class="d-flex gap-1">
                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#availableQuizModal{{ $quiz->id }}">
                                Detail
                            </button>
                            <form action="{{ route('subjects.quiz.assign', ['subject' => $subject, 'quiz' => $quiz]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Assign</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card mt-3">
        <h5 class="card-header">Table Quizzes {{ $subject->name }}</h5>
        <div class="table-responsive text-nowrap p-3">
            <table class="table" id="example1">
                <thead>
                    <tr class="text-nowrap table-dark">
                        <th class="text-white">No</th>
                        <th class="text-white">Name</th>
                        <th class="text-white">Description</th>
                        <th class="text-white">Explanation</th>
                        <th class="text-white">Passing Score</th>
                        <th class="text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subject->quizzes as $quiz)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $quiz->name }}</td>
                        <td>{{ $quiz->description }}</td>
                        <td>{{ $quiz->explanation }}</td>
                        <td>{{ $quiz->passing_score }}</td>
                        <td class="d-flex gap-1">
                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#assignedQuizModal{{ $quiz->id }}">
                                Detail
                            </button>
                            <form action="{{ route('subjects.quiz.remove', ['subject' => $subject, 'quiz' => $quiz]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- / Content -->

<!-- Detail Quiz Modal -->
@foreach ($availableQuizzes as $quiz)
<div class="modal fade" id="availableQuizModal{{ $quiz->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Available Quiz: {{ $quiz->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <strong>Nama:</strong> {{ $quiz->name }}
                </div>
                <div class="mb-3">
                    <strong>Deskripsi:</strong> {{ $quiz->description }}
                </div>
                <div class="mb-3">
                    <strong>Penjelasan:</strong> {{ $quiz->explanation }}
                </div>
                <div class="mb-3">
                    <strong>Passing Score:</strong> {{ $quiz->passing_score }}
                </div>
                <div class="mb-3">
                    <strong>Jawaban:</strong>
                    <ul>
                        @foreach($quiz->quizAnswers as $answer)
                            <li class="{{ $answer->is_correct ? 'text-success' : 'text-danger' }}">
                                {{ $answer->answer }} 
                                ({{ $answer->is_correct ? 'Benar' : 'Salah' }})
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Modal untuk Assigned Quiz -->
@foreach ($assignedQuizzes as $quiz)
<div class="modal fade" id="assignedQuizModal{{ $quiz->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Assigned Quiz: {{ $quiz->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <strong>Nama:</strong> {{ $quiz->name }}
                </div>
                <div class="mb-3">
                    <strong>Deskripsi:</strong> {{ $quiz->description }}
                </div>
                <div class="mb-3">
                    <strong>Penjelasan:</strong> {{ $quiz->explanation }}
                </div>
                <div class="mb-3">
                    <strong>Passing Score:</strong> {{ $quiz->passing_score }}
                </div>
                <div class="mb-3">
                    <strong>Jawaban:</strong>
                    <ul>
                        @foreach($quiz->quizAnswers as $answer)
                            <li class="{{ $answer->is_correct ? 'text-success' : 'text-danger' }}">
                                {{ $answer->answer }} 
                                ({{ $answer->is_correct ? 'Benar' : 'Salah' }})
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
