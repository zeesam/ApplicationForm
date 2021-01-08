<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Finalsubmitted;
use Auth;
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
        $data = Finalsubmitted::where('userid',Auth::user()->id)->first();
        return view('home',['data'=>$data]);
    }
}
