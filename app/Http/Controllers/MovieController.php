<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::get();
        return view('home', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Movie $request)
    {
        $data = $request->all();


        $meeting_type = Movie::create([
            'meeting_type_title' => $data['meeting_type_title'],
            'minimum_time' => $data['minimum_time'],
            'maximum_time' => $data['maximum_time'],
            'granularity' => $data['granularity'],
            'can_arrange_virtual_meetings' => $data['can_arrange_virtual_meetings'],
            'global_event_setting' => $data['global_event_setting'],
            'minimum_participants' => $data['minimum_participants'],
            'maximum_participants' => $data['maximum_participants'],
            'event_id' => session('event_id'),
            'status' => $data['status'],
            'created_by' => Auth::user()->id,
            'extendable' => request('extendable'),
            'extendable_time' => (request('extendable') && request('extendable') == 1) ? request('extendable_time') : 0,
        ]);

        return redirect()->route('types.index', $this->event_name)->with('success_message', 'Meeting Type Succesfully Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return view('locations.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::find($id);
        return view('movies.edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Movie $request, $id)
    {
        $meeting_type = Movie::find($id);

        $data = $request->all();

        if ($data['global_event_setting'] == 0) {
            if ($data['minimum_time'] < $data['granularity']) {
                return redirect()->route('types.create', $this->event_name)->with('error_message', 'Sorry! Minimum time should not be less then granularity');
            }

            if ($data['maximum_time'] < $data['granularity']) {
                return redirect()->route('types.create', $this->event_name)->with('error_message', 'Sorry! Maximum time should be greater then granularity');
            }
        }

        $meeting_type->meeting_type_title = $data['meeting_type_title'];
        $meeting_type->minimum_time = $data['minimum_time'];
        $meeting_type->maximum_time = $data['maximum_time'];
        $meeting_type->granularity = $data['granularity'];
        $meeting_type->can_arrange_virtual_meetings = $data['can_arrange_virtual_meetings'];
        $meeting_type->global_event_setting = $data['global_event_setting'];
        $meeting_type->minimum_participants = $data['minimum_participants'];
        $meeting_type->maximum_participants = $data['maximum_participants'];
        $meeting_type->status = $data['status'];
        $meeting_type->updated_by = Auth::user()->id;
        $meeting_type->extendable = request('extendable');
        $meeting_type->extendable_time = (request('extendable') && request('extendable') == 1) ? request('extendable_time') : 0;

        $meeting_type->save();

        return redirect()->route('types.index', $this->event_name)->with('success_message', 'Meeting Type Succesfully Updated!');
    }

    /**
     * Removie the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->filled('meeting_type_id')) {
            $meeting_type = Movie::find($request->input('meeting_type_id'));
            $meeting_type->deleted_by = Auth::user()->id;
            $meeting_type->save();
            $meeting_type->delete();
            return redirect()->route('types.index', $this->event_name)->with('success_message', 'Meeting Type Succesfully Deleted!');
        }

        return redirect()->route('types.index', $this->event_name)->with('error_message', 'Sorry! Something Went Wrong');
    }
}
