<?php

namespace App\Http\Controllers;

use App\BrandComputer;
use App\Http\Requests\BrandComputerRequest;
use Illuminate\Http\Request;

class BrandComputerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BrandComputer $model)
    {
        return view('BrandComputers.index', ['BrandComputers' => $model->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BrandComputers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandComputerRequest $request, BrandComputer $model)
    {
        $imagePath = $request->image->store('BrandComputers' , 'public');
       // $imagersize = Image::make(public_path("storage/{$imagePath}"))->fit(1000 , 1000);
       // $imagersize->save();

        $image = 'http://localhost:8000/storage/'.$imagePath;

        $model->create([
            'name' => $request->get('name'),
            'image' => $image,
        ]);

        return redirect()->route('BrandComputer.index')->withStatus(__($request->get('name').' successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BrandComputer  $BrandComputer
     * @return \Illuminate\Http\Response
     */
    public function show(BrandComputer $BrandComputer)
    {
        return view('computers.index', ['BrandComputer' => $BrandComputer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BrandComputer  $BrandComputer
     * @return \Illuminate\Http\Response
     */
    public function edit(BrandComputer $BrandComputer)
    {
        return view('BrandComputers.edit', compact('BrandComputer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BrandComputer  $BrandComputer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BrandComputer $BrandComputer)
    {
        if($request->hasFile('image')){
            $imagePath = $request->image->store('BrandComputers' , 'public');
          //  $imagersize = Image::make(public_path("storage/{$imagePath}"))->fit(1000 , 1000);
           // $imagersize->save();
           
    
            $image = 'http://localhost:8000/storage/'.$imagePath;
    
            $BrandComputer->update([
                'image' => $image,
            ]);
            }
        

        $BrandComputer->update([
           'name' => $request->get('name'),
        ]);

        return redirect()->route('BrandComputer.index')->withStatus(__($BrandComputer->name.' successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BrandComputer  $BrandComputer
     * @return \Illuminate\Http\Response
     */
    public function destroy(BrandComputer $BrandComputer)
    {
        $name = $BrandComputer->name;
        $BrandComputer->delete();

        return redirect()->route('BrandComputer.index')->withStatus(__($name.' successfully deleted.'));
    }

    public function BrandComputers(BrandComputer $model){
        $array = array();
        $BrandComputers = $model->all();
        foreach ($BrandComputers as $BrandComputer){
            $x = [
                'id' => $BrandComputer->id,
                'name' => $BrandComputer->name,
                'image' => $BrandComputer->image,
                'smartphones' => [
                    $BrandComputer->smartphones,
                ],
            ];
            array_push($array, $x);

        }
        return response()->json($array);
    }
}
