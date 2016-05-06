<?php

namespace App\Http\Controllers;

use App\Flog;
use Carbon\Carbon;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function render()
    {
        $currentFlog = Flog::orderBy('id', 'desc')->first();
        $currentFlog->formatted_id = str_pad($currentFlog->id, 3, '0', STR_PAD_LEFT);
        $current_week = Carbon::now()->startOfWeek()->toFormattedDateString();
        $upvotes = $currentFlog->votes->where('vote_direction', 1)->count();
        $downvotes = $currentFlog->votes->where('vote_direction', 0)->count();
        return view('home', [
            'current_flog' => $currentFlog,
            'current_week' => $current_week,
            'upvotes' => $upvotes,
            'downvotes' => $downvotes
        ]);
    }
}
