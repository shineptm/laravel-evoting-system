@extends('layouts.admin')

@section('content')
<div class="container">

    <h3 class="mb-4">eVoting Dashboard</h3>

    {{-- Summary Cards --}}
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card shadow text-center">
                <div class="card-body">                    
                    <h6>Total Votes</h6>
                    <h2 class="text-success">{{ $totalVotes }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow text-center">
                <div class="card-body">
                    <h6>Total Candidates</h6>
                    <h2 class="text-primary">{{ $results->count() }}</h2>
                </div>
            </div>
        </div>
    </div>

    {{-- Chart --}}
    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            Vote Distribution
        </div>

        <div class="card-body">
            <canvas id="resultsChart" height="120"></canvas>
        </div>
    </div>

    {{-- Table --}}
    <div class="card shadow mt-4">
        <div class="card-header">
            Detailed Results
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Candidate</th>
                    <th>Votes</th>
                </tr>
            </thead>

            <tbody>
            @foreach($results as $candidate)
                <tr>
                    <td>{{ $candidate->name }}</td>
                    <td>
                        <span class="badge bg-success">
                            {{ $candidate->votes_count }}
                        </span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const canvas = document.getElementById('resultsChart');
    if (!canvas) {
        console.error("Canvas not found");
        return;
    }
    const ctx = canvas.getContext('2d');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($labels ?? []),
            datasets: [{
                label: 'Votes',
                data: @json($data ?? []),
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                 y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0,   
                        stepSize: 1     
                    }
                }
            }
        }
    });

});
</script>
@endsection