<?php

namespace App\Http\Controllers;

use App\Member;
use App\Http\Requests\MemberRequest;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class MemberController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Member $model)
    {
        return view('members.index', ['members' => $model->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(MemberRequest $request, Member $model)
    {

        $imagePath = $request->image->store('members' , 'public');
        $imagersize = Image::make(public_path("storage/{$imagePath}"))->fit(1000 , 1000);
        $imagersize->save();

        $image = 'http://127.0.0.1:8000/storage/'.$imagePath;
    
        
        $model->create([
            'name' => $request->get('name'),
            'role' => $request->get('role'),
            'image' => $image,
            'description' => $request->get('description'),
            'facebook' => $request->get('facebook'),
            'instagram' => $request->get('instagram'),
            'gmail' => $request->get('gmail')
        ]);

        return redirect()->route('member.index')->withStatus(__('Member successfully created.'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(MemberRequest $request, Member $member)
    {
        if($request->hasFile('image')){
        $imagePath = $request->image->store('members' , 'public');
        

        $image = 'http://enactusisetch.herokuapp.com/storage/'.$imagePath;

        $member->update([
            'image' => $image,
        ]);
        }
        $member->update([
            'name' => $request->get('name'),
            'role' => $request->get('role'),
            'description' => $request->get('description'),
            'facebook' => $request->get('facebook'),
            'instagram' => $request->get('instagram'),
            'gmail' => $request->get('gmail')
        ]);

        return redirect()->route('member.index')->withStatus(__('Member successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();

        return redirect()->route('member.index')->withStatus(__('Member successfully deleted.'));
    }

    public function members(){
        return response()->json(Member::get(), 200);
    }
}
