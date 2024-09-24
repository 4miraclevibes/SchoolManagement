@extends('layouts.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createQuizModal">
                Create Quiz
            </button>
        </div>
    </div>
    <div class="card mt-2">
        <h5 class="card-header">Table Quizzes</h5>
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
                    @foreach ($quizzes as $quiz)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $quiz->name }}</td>
                        <td>{{ $quiz->description }}</td>
                        <td>{{ $quiz->explanation }}</td>
                        <td>{{ $quiz->passing_score }}</td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editQuizModal{{ $quiz->id }}">
                                Edit
                            </button>
                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#answerQuizModal{{ $quiz->id }}">
                                Answer
                            </button>
                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detailQuizModal{{ $quiz->id }}">
                                Detail
                            </button>
                            <form action="{{ route('quiz.destroy', $quiz->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
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

<!-- Create Quiz Modal -->
<div class="modal fade" id="createQuizModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Quiz</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('quiz.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <!-- Tambahkan form fields sesuai dengan model Quiz -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="explanation" class="form-label">Explanation</label>
                        <textarea class="form-control" id="explanation" name="explanation" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="passing_score" class="form-label">Passing Score</label>
                        <input type="number" class="form-control" id="passing_score" name="passing_score" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Quiz Modal -->
@foreach ($quizzes as $quiz)
<div class="modal fade" id="editQuizModal{{ $quiz->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Quiz</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('quiz.update', $quiz->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <!-- Tambahkan form fields sesuai dengan model Quiz -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $quiz->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" required>{{ $quiz->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="explanation" class="form-label">Explanation</label>
                        <textarea class="form-control" id="explanation" name="explanation" required>{{ $quiz->explanation }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="passing_score" class="form-label">Passing Score</label>
                        <input type="number" class="form-control" id="passing_score" name="passing_score" value="{{ $quiz->passing_score }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Answer Quiz Modal -->
<div class="modal fade" id="answerQuizModal{{ $quiz->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Answer Quiz: {{ $quiz->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Tampilkan daftar jawaban quiz -->
                @foreach($quiz->quizAnswers as $answer)
                <div class="mb-3">
                    <p>{{ $answer->answer }} ({{ $answer->is_correct ? 'Benar' : 'Salah' }})</p>
                </div>
                @endforeach

                <!-- Form untuk menambahkan jawaban baru -->
                <form action="{{ route('quiz-answer.store', $quiz->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
                    <div class="mb-3">
                        <label for="answer" class="form-label">New Answer</label>
                        <input type="text" class="form-control" id="answer" name="answer" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="is_correct" name="is_correct">
                        <label class="form-check-label" for="is_correct">Is Correct?</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Answer</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Detail Quiz Modal -->
@foreach ($quizzes as $quiz)
<div class="modal fade" id="detailQuizModal{{ $quiz->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Quiz: {{ $quiz->name }}</h5>
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
