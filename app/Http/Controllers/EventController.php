<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests\EventRrequest;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Event $model)
    {
        return view('events.index', ['events' => $model->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRrequest $request, Event $model)
    {
        $model->create([
            'title' => $request->get('title'),
            'date' => $request->get('date'),
            'image' => $request->get('image'),
            'description' => $request->get('description')
           
        ]);

        return redirect()->route('event.index')->withStatus(__('Event successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(EventRrequest $request, Event $event)
    {
        $event->update([
            'title' => $request->get('title'),
            'date' =>  $request->get('date'),
            'image' => $request->get('image'),
            'description' => $request->get('description')
           
        ]);

        return redirect()->route('event.index')->withStatus(__('Event successfully created.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('event.index')->withStatus(__('Event successfully deleted.'));
    }
}
