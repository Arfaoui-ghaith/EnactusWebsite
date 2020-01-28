<?php

namespace App\Http\Controllers;

use App\Partner;
use App\Http\Requests\PartnerRequest;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Partner $model)
    {
        return view('partners.index', ['partners' => $model->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PartnerRequest $request, Partner $model)
    {
        $imagePath = $request->image->store('partner' , 'public');
        $imagersize = Image::make(public_path("storage/{$imagePath}"))->fit(1000 , 1000);
        $imagersize->save();

        $image = 'http://127.0.0.1:8000/storage/'.$imagePath;

        $model->create([
            'name' => $request->get('name'),
            'image' => $image
           
        ]);

        return redirect()->route('partner.index')->withStatus(__('Partner successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        return view('partners.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(PartnerRequest $request, Partner $partner)
    {
        if($request->hasFile('image')){
            $imagePath = $request->image->store('members' , 'public');
            $imagersize = Image::make(public_path("storage/{$imagePath}"))->fit(1000 , 1000);
            $imagersize->save();
    
            $image = 'http://127.0.0.1:8000/storage/'.$imagePath;
    
            $partner->update([
                'image' => $image,
            ]);
            }

        $partner->update([
            'name' => $request->get('name'),
            
           
        ]);

        return redirect()->route('partner.index')->withStatus(__('Partner successfully created.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        $partner->delete();

        return redirect()->route('partner.index')->withStatus(__('Partner successfully deleted.'));
    }

    public function partners(){
        return response()->json(Partner::get(), 200);
    }
}
