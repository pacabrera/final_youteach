<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all()->get();
        //return $subjects;
        
        return view('admin.add-event', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'color' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        $events = new Event;

        $events->title = $request->input('title');
        $events->color = $request->input('color');
        $events->venue = $request->input('venue');
        $events->description = $request->input('desc');
        $events->start_date = $request->input('start_date');
        $events->end_date = $request->input('end_date');

        $events->save();
        swal()->success('Successfully Created',[]);
        return redirect()->route('add-event');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        return view('admin.events.edit-event', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePost(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'color' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        $events = Event::find($id);

        $events->title = $request->input('title');
        $events->color = $request->input('color');
        $events->venue = $request->input('venue');
        $events->start_date = $request->input('start_date');
        $events->end_date = $request->input('end_date');

        $events->save();
        swal()->success('Successfully Edited',[]);
        return redirect()->route('add-event');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        event::destroy($id);
    }
}
