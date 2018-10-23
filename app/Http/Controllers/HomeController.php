<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Taxi;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taxis = Taxi::where('departure','>',Carbon::now()->subMinutes(30)->toDateTimeString())->orderBy('departure','ASC')->get();
        return view('welcome')->with(compact('locations','taxis'));
    }
}
