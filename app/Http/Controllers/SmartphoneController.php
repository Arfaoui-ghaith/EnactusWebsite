<?php

namespace App\Http\Controllers;

use App\Smartphone;
use App\Brand;
use App\Http\Requests\SmartphoneRequest;
use Illuminate\Http\Request;

class SmartphoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Smartphone $model, Brand $brand)
    {
        return view('smartphones.index', compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Brand $brand)
    {
        return view('smartphones.create', compact('brand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Smartphone $model, Brand $brand)
    {   
        
        $imagePath = $request->image->store('smartphones' , 'public');
       // $imagersize = Image::make(public_path("storage/{$imagePath}"))->fit(1000 , 1000);
       // $imagersize->save();

        $image = 'http://localhost:8000/storage/'.$imagePath;

        $model->create([
            'brand_id' => $request->get('brand_id'),
            'name' => $request->get('name'),
            'image' => $image,
        ]);

        return redirect('brand/'.$request->get('brand_id'))->withStatus(__($request->get('name').' successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Smartphone  $smartphone
     * @return \Illuminate\Http\Response
     */
    public function show(Smartphone $smartphone)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Smartphone  $smartphone
     * @return \Illuminate\Http\Response
     */
    public function edit(Smartphone $smartphone)
    {
        return view('smartphones.edit', compact('smartphone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Smartphone  $smartphone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Smartphone $smartphone)
    {
        if($request->hasFile('image')){
            $imagePath = $request->image->store('smartphones' , 'public');
          //  $imagersize = Image::make(public_path("storage/{$imagePath}"))->fit(1000 , 1000);
           // $imagersize->save();
           
    
            $image = 'http://localhost:8000/storage/'.$imagePath;
    
            $smartphone->update([
                'image' => $image,
            ]);
            }
        

        $smartphone->update([
           'name' => $request->get('name'),
        ]);

        return redirect('brand/'.$smartphone->brand_id)->withStatus(__($smartphone->name.' successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Smartphone  $smartphone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Smartphone $smartphone)
    {
        $name = $smartphone->name;
        $id = $smartphone->brand_id;
        $smartphone->delete();

        return redirect('brand/'.$id)->withStatus(__($name.' successfully deleted.'));
    }

    
}
