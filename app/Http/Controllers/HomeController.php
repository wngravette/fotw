<?php

namespace App\Http\Controllers;

use App\Flog;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function render()
    {
        $currentFlog = Flog::orderBy('id', 'desc')->first();
        $currentFlog->id = str_pad($currentFlog->id, 3, '0', STR_PAD_LEFT);
        return view('home', ['current_flog' => $currentFlog]);
    }
}
