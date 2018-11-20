<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Taxi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DistanceController;

class TaxiController extends Controller
{
    public function create()
    {
        $locations = Location::all();
        return view('taxi.create')->with(compact('locations'));
    }

    public function store(Request $request)
    {

        $travel = DistanceController::calculate(Location::find($request->input('origen'))->address,Location::find($request->input('destino'))->address);
        $user = Auth::user()->id;
        $taxi = new Taxi();
        $taxi->departure = $request->input('date');
        $taxi->arrival = Carbon::parse( $request->input('date'))->addSeconds($travel[1])->toDateTimeString();
        $taxi->origin_id = $request->input('origen');
        $taxi->destination_id = $request->input('destino');
        $taxi->distance = $travel[0];
        $taxi->user_id = $user;
        $taxi->save();
        for($i=0;$i<$request->input('pasajeros');$i++)
            $taxi->users()->attach($user);
        return redirect('/');
    }

    public function assing($id)
    {
        $user = Auth::user()->id;
        $taxi = Taxi::find($id);
        $taxi->users()->attach($user);
        return 1;
    }
    public function deassing($id)
    {
        $user = Auth::user()->id;
        $taxi = Taxi::find($id);
        $taxi->users()->detach($user);
        return 1;
    }
    public function show($location = 1){
        $taxis = Taxi::where('departure','>',Carbon::now()->subMinutes(0)->toDateTimeString())->where('departure','<',Carbon::now()->addHours(24)->toDateTimeString())->orderBy('departure','ASC')->get();
        return view('welcome')->with(compact('locations','taxis'));
    }
}
