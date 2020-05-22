<?php

namespace App\Http\Controllers;

use App\Reparation;
use App\Smartphone;
use Illuminate\Http\Request;

class ReparationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Smartphone $smartphone, Reparation $model)
    {
        return view('reparations.index', [
            'reparations'=>$model->all(),
            'smartphone'=>$smartphone,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Smartphone $smartphone)
    {
        return view('reparations.create', compact('smartphone'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Reparation $model)
    {
        $imagePath = $request->image->store('reparations' , 'public');
       // $imagersize = Image::make(public_path("storage/{$imagePath}"))->fit(1000 , 1000);
       // $imagersize->save();

        $image = 'http://localhost:8000/storage/'.$imagePath;

        $model->create([
            'model_id'=> $request->get('model_id'), 
            'title'=> $request->get('title'), 
            'image'=>  $image, 
            'description'=> $request->get('description'), 
            'symptomes'=> $request->get('symptomes'), 
            'garantie'=> $request->get('garantie'), 
            'temps_reparation'=> $request->get('temps_reparation'),
            'prix'=> $request->get('prix')
        ]);

        return redirect('/IndexReparation/'.$request->get('model_id'))->withStatus(__($request->get('title').' successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reparation  $reparation
     * @return \Illuminate\Http\Response
     */
    public function show(Reparation $reparation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reparation  $reparation
     * @return \Illuminate\Http\Response
     */
    public function edit(int $reparation)
    {
        $array = Reparation::all();
        foreach($array as $rep){
            if( $rep->id == $reparation ){
                $res = $rep;
            }
        }
        return view('reparations.edit', ['reparation'=>$res]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reparation  $reparation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $reparation)
    {
        $array = Reparation::all();
        foreach($array as $rep){
            if( $rep->id == $reparation ){
                $res = $rep;
            }
        }


        
        if($request->hasFile('image')){
            $imagePath = $request->image->store('reparations' , 'public');
          //  $imagersize = Image::make(public_path("storage/{$imagePath}"))->fit(1000 , 1000);
           // $imagersize->save();
           
    
            $image = 'http://localhost:8000/storage/'.$imagePath;
    
            $res->update([
                'image' => $image,
            ]);
            }
        
            $res->update([
            'title'=> $request->get('title'), 
            'description'=> $request->get('description'), 
            'symptomes'=> $request->get('symptomes'), 
            'garantie'=> $request->get('garantie'), 
            'temps_reparation'=> $request->get('temps_reparation'),
            'prix'=> $request->get('prix')
        ]);
        

        return redirect('/IndexReparation/'.$res->model_id)->withStatus(__($res->title.' successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reparation  $reparation
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $reparation)
    { 
        $array = Reparation::all();
        foreach($array as $rep){
            if( $rep->id == $reparation ){
                $res = $rep;
            }
        }
        $id = $res->model_id;
        $res->delete();

        return redirect('/IndexReparation/'.$id)->withStatus(__(' Reparation successfully deleted.'));
    }

    public function reparations(){
        return response()->json(Reparation::get(), 200);
    }
}
