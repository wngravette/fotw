<?php

namespace App\Http\Controllers;

use App\Flog;
use Carbon\Carbon;
use DB;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function render()
    {
        $archived_flog = DB::table('states')->where('state_name', 'current_flog')->first();
        if ($archived_flog->state_value == 0) {
            $currentFlog = Flog::orderBy('id', 'desc')->first();
            $archived = false;
        } else {
            $currentFlog = Flog::findOrFail($archived_flog->state_value);
            $archived = true;
        }
        $flog_featured = true;
        $currentFlog->formatted_id = str_pad($currentFlog->id, 3, '0', STR_PAD_LEFT);
        $current_week = Carbon::now()->startOfWeek()->toFormattedDateString();
        $upvotes = $currentFlog->votes->where('vote_direction', 1)->count();
        $downvotes = $currentFlog->votes->where('vote_direction', 0)->count();

        if ($upvotes !== 0 && $downvotes !== 0) {
            $flog_number = $upvotes/$downvotes;
        } else {
            if ($upvotes !== 0 && $downvotes == 0) {
                $flog_number = 2;
            }
            else {
                $flog_number = 1;
            }
        }

        return view('home', [
            'current_flog' => $currentFlog,
            'current_week' => $current_week,
            'upvotes' => $upvotes,
            'downvotes' => $downvotes,
            'flog_number' => $flog_number,
            'archived' => $archived,
            'flog_featured' => $flog_featured
        ]);
    }
}
