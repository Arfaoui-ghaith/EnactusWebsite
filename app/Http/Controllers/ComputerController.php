<?php

namespace App\Http\Controllers;

use App\Computer;
use App\BrandComputer;
use App\Http\Requests\ComputerRequest;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Computer $model, BrandComputer $BrandComputer)
    {
        return view('Computers.index', compact('BrandComputer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(BrandComputer $BrandComputer)
    {
        return view('Computers.create', compact('BrandComputer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComputerRequest $request,Computer $model, BrandComputer $BrandComputer)
    {
        $imagePath = $request->image->store('Computers' , 'public');
       // $imagersize = Image::make(public_path("storage/{$imagePath}"))->fit(1000 , 1000);
       // $imagersize->save();

        $image = 'http://localhost:8000/storage/'.$imagePath;

        $model->create([
            'brand_id' => $request->get('brand_id'),
            'name' => $request->get('name'),
            'image' => $image,
        ]);

        return redirect('BrandComputer/'.$request->get('brand_id'))->withStatus(__($request->get('name').' successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Computer  $Computer
     * @return \Illuminate\Http\Response
     */
    public function show(Computer $Computer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Computer  $Computer
     * @return \Illuminate\Http\Response
     */
    public function edit(Computer $Computer)
    {
        return view('Computers.edit', compact('Computer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Computer  $Computer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Computer $Computer, BrandComputer $BrandComputer)
    {
        if($request->hasFile('image')){
            $imagePath = $request->image->store('Computers' , 'public');
          //  $imagersize = Image::make(public_path("storage/{$imagePath}"))->fit(1000 , 1000);
           // $imagersize->save();
           
    
            $image = 'http://localhost:8000/storage/'.$imagePath;
    
            $Computer->update([
                'image' => $image,
            ]);
            }
        

        $Computer->update([
           'name' => $request->get('name'),
        ]);

        return redirect('BrandComputer/'.$Computer->brand_id)->withStatus(__($Computer->name.' successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Computer  $Computer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Computer $Computer)
    {
        $name = $Computer->name;
        $id = $Computer->brand_id;
        $Computer->delete();

        return redirect('BrandComputer/'.$id)->withStatus(__($name.' successfully deleted.'));
    }
}
