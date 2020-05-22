<?php

namespace App\Http\Controllers;

use App\BrandTab;
use App\Http\Requests\BrandTabRequest;
use Illuminate\Http\Request;

class BrandTabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BrandTab $model)
    {
        return view('t-brands.index', ['BrandTabs' => $model->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('t-brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandTabRequest $request, BrandTab $model)
    {
        $imagePath = $request->image->store('BrandTabs' , 'public');
       // $imagersize = Image::make(public_path("storage/{$imagePath}"))->fit(1000 , 1000);
       // $imagersize->save();

        $image = 'http://localhost:8000/storage/'.$imagePath;

        $model->create([
            'name' => $request->get('name'),
            'image' => $image,
        ]);

        return redirect()->route('BrandTab.index')->withStatus(__($request->get('name').' successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BrandTab  $BrandTab
     * @return \Illuminate\Http\Response
     */
    public function show(BrandTab $BrandTab)
    {
        return view('tablettes.index', ['brandtab' => $BrandTab]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BrandTab  $BrandTab
     * @return \Illuminate\Http\Response
     */
    public function edit(BrandTab $BrandTab)
    {
        return view('t-brands.edit', compact('BrandTab'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BrandTab  $BrandTab
     * @return \Illuminate\Http\Response
     */
    public function update(BrandTabRequest $request, BrandTab $BrandTab)
    {
        if($request->hasFile('image')){
            $imagePath = $request->image->store('BrandTabs' , 'public');
          //  $imagersize = Image::make(public_path("storage/{$imagePath}"))->fit(1000 , 1000);
           // $imagersize->save();
           
    
            $image = 'http://localhost:8000/storage/'.$imagePath;
    
            $BrandTab->update([
                'image' => $image,
            ]);
            }
        

        $BrandTab->update([
           'name' => $request->get('name'),
        ]);

        return redirect()->route('BrandTab.index')->withStatus(__($BrandTab->name.' successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BrandTab  $BrandTab
     * @return \Illuminate\Http\Response
     */
    public function destroy(BrandTab $BrandTab)
    {
        $name = $BrandTab->name;
        $BrandTab->delete();

        return redirect()->route('BrandTab.index')->withStatus(__($name.' successfully deleted.'));
    }

    public function BrandTabs(BrandTab $model){
        $array = array();
        $BrandTabs = $model->all();
        foreach ($BrandTabs as $BrandTab){
            $x = [
                'id' => $BrandTab->id,
                'name' => $BrandTab->name,
                'image' => $BrandTab->image,
                'smartphones' => [
                    $BrandTab->smartphones,
                ],
            ];
            array_push($array, $x);

        }
        return response()->json($array);
    }
}
