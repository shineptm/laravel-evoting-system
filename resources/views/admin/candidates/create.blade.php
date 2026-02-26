@extends('layouts.admin')

@section('content')

<h4>Add Candidate</h4>

<form method="POST" action="{{ route('admin.candidates.store') }}">
    @csrf

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control">
    </div>

    <div class="mb-3">
        <label>Party</label>
        <input type="text" name="party" class="form-control">
    </div>

    <button class="btn btn-success">Save</button>
</form>

@endsection