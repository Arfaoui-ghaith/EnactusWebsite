<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Http\Requests\BrandRequest;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Brand $model)
    {
        return view('brands.index', ['brands' => $model->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request, Brand $model)
    {
        $imagePath = $request->image->store('brands' , 'public');
       // $imagersize = Image::make(public_path("storage/{$imagePath}"))->fit(1000 , 1000);
       // $imagersize->save();

        $image = 'http://localhost:8000/storage/'.$imagePath;

        $model->create([
            'name' => $request->get('name'),
            'image' => $image,
        ]);

        return redirect()->route('brand.index')->withStatus(__($request->get('name').' successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        return view('smartphones.index', ['brand' => $brand]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, Brand $brand)
    {
        if($request->hasFile('image')){
            $imagePath = $request->image->store('brands' , 'public');
          //  $imagersize = Image::make(public_path("storage/{$imagePath}"))->fit(1000 , 1000);
           // $imagersize->save();
           
    
            $image = 'http://localhost:8000/storage/'.$imagePath;
    
            $brand->update([
                'image' => $image,
            ]);
            }
        

        $brand->update([
           'name' => $request->get('name'),
        ]);

        return redirect()->route('brand.index')->withStatus(__($brand->name.' successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $name = $brand->name;
        $brand->delete();

        return redirect()->route('brand.index')->withStatus(__($name.' successfully deleted.'));
    }

    public function brands(Brand $model){
        $array = array();
        $brands = $model->all();
        foreach ($brands as $brand){
            $x = [
                'id' => $brand->id,
                'name' => $brand->name,
                'image' => $brand->image,
                'smartphones' => [
                    $brand->smartphones,
                ],
            ];
            array_push($array, $x);

        }
        return response()->json($array);
    }
}
