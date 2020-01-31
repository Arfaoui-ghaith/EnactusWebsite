<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests\EventRrequest;
use Illuminate\Http\Request;
//use Intervention\Image\Facades\Image;

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
        $imagePath = $request->image->store('events' , 'public');
       // $imagersize = Image::make(public_path("storage/{$imagePath}"))->fit(1000 , 1000);
       // $imagersize->save();

        $image = 'storage/'.$imagePath;

        $model->create([
            'title' => $request->get('title'),
            'date' => $request->get('date'),
            'image' => $image,
            'lien_formulaire' => $request->get('lien_formulaire'),
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
        if($request->hasFile('image')){
            $imagePath = $request->image->store('events' , 'public');
           // $imagersize = Image::make(public_path("storage/{$imagePath}"))->fit(1000 , 1000);
           // $imagersize->save();
    
            $image = 'storage/'.$imagePath;
            $event->update([
                'image' => $image
            ]);
    
            }

        $event->update([
            'title' => $request->get('title'),
            'date' =>  $request->get('date'),
            'description' => $request->get('description'),
            'lien_formulaire' => $request->get('lien_formulaire')
           
        ]);

        return redirect()->route('event.index')->withStatus(__('Event successfully updated.'));
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

    public function events(){
        return response()->json(Event::get(), 200);
    }
}
