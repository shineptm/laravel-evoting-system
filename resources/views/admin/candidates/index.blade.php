@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h4>Candidates</h4>
    <a href="{{ route('admin.candidates.create') }}" class="btn btn-primary">Add Candidate</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Party</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($candidates as $candidate)
        <tr>
            <td>{{ $candidate->name }}</td>
            <td>{{ $candidate->party }}</td>
            <td>
                <form method="POST" action="{{ route('admin.candidates.destroy',$candidate->id) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection