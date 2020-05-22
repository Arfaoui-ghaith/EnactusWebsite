<?php

namespace App\Http\Controllers;

use App\Tablette;
use App\BrandTab;
use App\Http\Requests\TabletteRequest;
use Illuminate\Http\Request;

class TabletteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Tablette $model, BrandTab $brandtab)
    {
        return view('tablettes.index', compact('brandtab'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(BrandTab $brandtab)
    {
        return view('tablettes.create', compact('brandtab'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TabletteRequest $request,Tablette $model, BrandTab $brandtab)
    {
        $imagePath = $request->image->store('tablettes' , 'public');
       // $imagersize = Image::make(public_path("storage/{$imagePath}"))->fit(1000 , 1000);
       // $imagersize->save();

        $image = 'http://localhost:8000/storage/'.$imagePath;

        $model->create([
            'brand_id' => $request->get('brand_id'),
            'name' => $request->get('name'),
            'image' => $image,
        ]);

        return redirect('BrandTab/'.$request->get('brand_id'))->withStatus(__($request->get('name').' successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tablette  $tablette
     * @return \Illuminate\Http\Response
     */
    public function show(Tablette $tablette)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tablette  $tablette
     * @return \Illuminate\Http\Response
     */
    public function edit(Tablette $tablette)
    {
        return view('tablettes.edit', compact('tablette'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tablette  $tablette
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tablette $tablette, BrandTab $brandtab)
    {
        if($request->hasFile('image')){
            $imagePath = $request->image->store('tablettes' , 'public');
          //  $imagersize = Image::make(public_path("storage/{$imagePath}"))->fit(1000 , 1000);
           // $imagersize->save();
           
    
            $image = 'http://localhost:8000/storage/'.$imagePath;
    
            $tablette->update([
                'image' => $image,
            ]);
            }
        

        $tablette->update([
           'name' => $request->get('name'),
        ]);

        return redirect('BrandTab/'.$tablette->brand_id)->withStatus(__($tablette->name.' successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tablette  $tablette
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tablette $tablette)
    {
        $name = $tablette->name;
        $id = $tablette->brand_id;
        $tablette->delete();

        return redirect('BrandTab/'.$id)->withStatus(__($name.' successfully deleted.'));
    }
}
