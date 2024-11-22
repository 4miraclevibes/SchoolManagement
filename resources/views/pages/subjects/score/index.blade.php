@extends('layouts.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mt-2">
        <h5 class="card-header">Daftar Nilai Siswa</h5>
        <div class="table-responsive text-nowrap p-3">
            <table class="table" id="example">
                <thead>
                    <tr class="text-nowrap table-dark">
                        <th class="text-white">No</th>
                        <th class="text-white">Nama Siswa</th>
                        <th class="text-white">Mata Pelajaran</th>
                        <th class="text-white">Guru</th>
                        <th class="text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($scores as $score)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $score->student->user->name }}</td>
                        <td>{{ $score->subject->name }}</td>
                        <td>{{ $score->user->name }}</td>
                        <td>
                            <button type="button" 
                                    class="btn btn-info btn-sm" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#scoreDetail{{ $score->id }}">
                                Detail
                            </button>
                            <a href="{{ route('subjects.scores.edit', $score->id) }}" 
                               class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('subjects.scores.destroy', $score->id) }}" 
                                  method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" 
                                        onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tombol untuk menambah nilai -->
    <div class="card-footer">
        <a href="{{ route('subjects.scores.create', $subject->id) }}" 
           class="btn btn-primary">Tambah Nilai Baru</a>
    </div>
</div>
<!-- / Content -->

<!-- Modal Score Details -->
@foreach($scores as $score)
<div class="modal fade" id="scoreDetail{{ $score->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Nilai {{ $score->student->user->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Jenis Nilai</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($score->scoreDetails as $detail)
                            <tr>
                                <td>{{ $detail->name }}</td>
                                <td>{{ $detail->score }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="table-primary">
                                <th>Rata-rata</th>
                                <th>{{ $score->scoreDetails->avg('score') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- / Modal Score Details -->

@endsection
