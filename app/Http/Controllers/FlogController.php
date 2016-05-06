<?php

namespace App\Http\Controllers;

use Request;
use Storage;
use App\Flog;
use Carbon\Carbon;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return Flog::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('flogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $flog_hash = uniqid(true);

        $input = Request::all();
        $flog = new Flog($input);
        $flog->flog_hash = $flog_hash;
        $flog->published_at = Carbon::now();
        $flog->save();

        $file = $_FILES['picture'];
        $file_type = $file['type'];
        if ($file_type == "image/jpeg")
        {
            $file_ext = ".jpg";
        }
        Storage::disk('s3')->put($flog_hash . $file_ext, file_get_contents($file['tmp_name'], 'public'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $flog = Flog::findOrFail($id);

        $archived = true;
        $flog->formatted_id = str_pad($flog->id, 3, '0', STR_PAD_LEFT);
        $upvotes = $flog->votes->where('vote_direction', 1)->count();
        $downvotes = $flog->votes->where('vote_direction', 0)->count();

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

        return view('single', [
            'current_flog' => $flog,
            'upvotes' => $upvotes,
            'downvotes' => $downvotes,
            'flog_number' => $flog_number,
            'archived' => $archived
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
