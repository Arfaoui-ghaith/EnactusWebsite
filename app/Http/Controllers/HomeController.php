<?php

namespace App\Http\Controllers;
use App\Member;
use App\Project;
use App\Partner;
use App\Event;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(Member $model0,Project $model1,Partner $model2,Event $model3)
    {

        return view('dashboard' ,[
            'members' => $model0->count(),
            'projects' => $model1->count(),
            'partners' => $model2->count(),
            'events' => $model3->count(),
        ]);
    }
}
