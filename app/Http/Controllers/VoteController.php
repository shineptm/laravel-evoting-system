<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;
use App\Models\Candidate;
use App\Models\User;
use App\Http\Requests\StoreVoteRequest;

class VoteController extends Controller
{
    public function index(){
        if (auth()->user()->vote) {
            return redirect()->route('vote.thankyou');
        }
        $candidates = Candidate::all();
        return view('vote.index', compact('candidates'));
    }

    public function store(StoreVoteRequest $request){
        $request->validate([
            'candidate_id' => 'required|exists:candidates,id'
        ]);

        $user = auth()->user();

        if ($user->has_voted) {
            return back()->with('error', 'You already voted.');
        }

        Vote::create([
            'user_id' => $user->id,
            'candidate_id' => $request->candidate_id
        ]);

        $user->update(['has_voted' => true]);

         return redirect()->route('vote.thankyou')
            ->with('success', 'Your vote has been recorded successfully.');
    }
    
    public function thankyou(){
        return view('vote.thankyou');
    }
    
}
