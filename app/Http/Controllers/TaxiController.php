<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Taxi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaxiController extends Controller
{
    public function create(){
        $locations = Location::all();
        return view('taxi.create')->with(compact('locations'));
    }
    public function store(Request $request){
        $user = Auth::user()->id;
        $taxi = new Taxi();
        $taxi->departure = $request->input('salida');
        $taxi->arrival = Carbon::createFromFormat('Y-m-d H:i',$request->input('salida'))->addMinutes(40)->toDateTimeString();
        $taxi->origin_id = $request->input('origen');
        $taxi->destination_id = $request->input('destino');
        $taxi->user_id = $user;
        $taxi->save();
        $taxi->users()->attach($user);
        return redirect('/');
    }
}
