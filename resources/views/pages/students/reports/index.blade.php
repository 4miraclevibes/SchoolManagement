@extends('layouts.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <a href="https://filemanager.layananberhentikuliah.com/files" class="btn btn-success btn-sm mb-3" target="_blank">Upload Image</a>
    <div class="card">
        <div class="card-header">
            <form action="{{ route('students.reports.store', $student->id) }}" method="POST">
                @csrf
                <label for="url" class="form-label">Url</label>
                <input type="text" name="url" class="form-control w-50 form-control-sm">
                <button type="submit" class="btn btn-primary btn-sm mt-2">Create</button>
            </form>
        </div>
    </div>
    <div class="card mt-2">
        <h5 class="card-header">Table Students Reports</h5>
        <div class="table-responsive text-nowrap p-3">
            <table class="table" id="example">
                <thead>
                    <tr class="text-nowrap table-dark">
                        <th class="text-white">No</th>
                        <th class="text-white">User</th>
                        <th class="text-white">Student</th>
                        <th class="text-white">Url</th>
                        <th class="text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $report)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $report->user->name }}</td>
                        <td>{{ $report->student->user->name }}</td>
                        <td>{{ $report->url }}</td>
                        <td>
                            <a href="{{ $report->url }}" class="btn btn-primary btn-sm" target="_blank">View</a>
                            <form action="{{ route('students.reports.destroy', $report->id) }}" method="POST" style="display:inline-block;">
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
@endsection
