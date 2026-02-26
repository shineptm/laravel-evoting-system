<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidate;

class ResultController extends Controller
{
    public function index(){
        $results = Candidate::withCount('votes')->get();
        
        $labels = $results->pluck('name');
        $data = $results->pluck('votes_count');
        $totalVotes = $results->sum('votes_count');
        
       // print_r($data);  exit;

        return view('admin.results', compact('results','labels','data','totalVotes'));
    
    }
}
