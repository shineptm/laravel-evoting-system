@extends('layouts.app')

@section('content')
<div class="card shadow">
    <div class="card-header bg-primary text-white">
        Cast Your Vote
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('vote.store') }}">
            @csrf

            @foreach($candidates as $candidate)
                <div class="form-check border rounded p-3 mb-2">
                    <input class="form-check-input"
                           type="radio"
                           name="candidate_id"
                           value="{{ $candidate->id }}">

                    <label class="form-check-label">
                        <strong>{{ $candidate->name }}</strong>
                        <div class="text-muted">{{ $candidate->party }}</div>
                    </label>
                </div>
            @endforeach

            <button class="btn btn-success mt-3">Submit Vote</button>
        </form>
    </div>
</div>
@endsection
