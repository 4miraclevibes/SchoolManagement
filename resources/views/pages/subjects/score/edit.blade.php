@extends('layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Edit Nilai</h4>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('subjects.scores.update', $score->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="student_id" class="form-label">Siswa</label>
                    <input type="text" class="form-control" value="{{ $score->student->user->name }}" readonly>
                    <input type="hidden" name="student_id" value="{{ $score->student_id }}">
                </div>

                <div class="score-details">
                    <div class="row mb-3">
                        <div class="col-md-11">
                            <h5>Detail Nilai</h5>
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn btn-primary btn-sm" id="add-score">+</button>
                        </div>
                    </div>
                    
                    @foreach($score->scoreDetails as $index => $detail)
                    <div class="score-detail-item mb-3">
                        <div class="row">
                            <div class="col-md-5">
                                <input type="text" 
                                       class="form-control" 
                                       name="score_details[{{ $index }}][name]" 
                                       value="{{ $detail->name }}"
                                       placeholder="Nama Nilai" 
                                       required>
                            </div>
                            <div class="col-md-6">
                                <input type="number" 
                                       class="form-control" 
                                       name="score_details[{{ $index }}][score]" 
                                       value="{{ $detail->score }}"
                                       placeholder="Nilai" 
                                       required>
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-danger btn-sm remove-score">x</button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        let scoreIndex = {{ count($score->scoreDetails) - 1 }};

        $('#add-score').click(function() {
            scoreIndex++;
            const newScore = `
                <div class="score-detail-item mb-3">
                    <div class="row">
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="score_details[${scoreIndex}][name]" placeholder="Nama Nilai" required>
                        </div>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="score_details[${scoreIndex}][score]" placeholder="Nilai" required>
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn btn-danger btn-sm remove-score">x</button>
                        </div>
                    </div>
                </div>
            `;
            $('.score-details').append(newScore);
        });

        $(document).on('click', '.remove-score', function() {
            $(this).closest('.score-detail-item').remove();
        });
    });
</script>
@endpush
@endsection
