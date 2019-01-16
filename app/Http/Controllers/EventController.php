<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Calendar;


class EventController extends Controller
{

    public function index()
    {
        $events = [];
        $data = Event::all();
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->title,
                    false,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date),
                    $value->id,
                    // Add color and link on event
                    [
                        'color' => $value->color,
                       'url' => route('event-single', $value->id),
                    ]
                );
            }
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
                    false,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.' +1 day'),
                    null,
                    // Add color and link on event
                    [
                        'color' => $value->color,
                        'url' => route('event-single', $value->id),
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
        $events->venue = $request->input('venue');
        $events->description = $request->input('desc');
        $events->start_date = $request->input('start_date');
        $events->end_date = $request->input('end_date');

        $events->save();

        return redirect()->route('events-admin');

    }
    public function showSingle($id)
    {
        $event = Event::find($id)->first();
        return view('teacher.event-single', compact('event'));
    }
}
