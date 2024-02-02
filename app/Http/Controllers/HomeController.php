<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $all_classes = Classroom::withTrashed()->latest()->get();
        return view('home')->with('all_classes',$all_classes);
    }
}
