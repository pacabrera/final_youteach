<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Calendar;


class EventController extends Controller
{
public function index()
    {
        $event = [];
        $events = Event::all();
            foreach ($events as $row) {
                $event[] = Calendar::event(
                    $row->title,
                    true,
                    new \DateTime($row->start_date),
                    new \DateTime($row->end_date),
                    $row->id,
                    // Add color and link on event
	                [
	                    'color' => $row->color,
	                    'url' => route('teacher-panel', $row->id),
	                ]
                );
            }
        $calendar = Calendar::addEvents($events);
        return view('teacher.fullcalender', compact('calendar'));
    }

    public function admin()
    {
        $events = [];
        $data = Event::all();
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.' +1 day'),
                    null,
                    // Add color and link on event
	                [
	                    'color' => $value->color,
	                    'url' => route('admin-panel', $value->id),
	                ]
                );
            }
        }
        $calendar = Calendar::addEvents($events);
        
        return view('admin.fullcalendar', compact('calendar'));
    }

    public function addEvent()
    {
         $events = Event::all();
        //return $subjects;
        
        return view('admin.add-event', compact('events'));
    }

    public function addEventPost(Request $request)
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
        $events->start_date = $request->input('start_date');
        $events->end_date = $request->input('end_date');

        $events->save();

        return redirect()->route('events-admin');

    }
}
