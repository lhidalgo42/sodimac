<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Taxi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TaxiController extends Controller
{
    public function create()
    {
        $locations = Location::all();
        return view('taxi.create')->with(compact('locations'));
    }

    public function store(Request $request)
    {
        if($request->input('origen') == "" or $request->input('destino') == "")
            return back()->with('error', 'Debe ingresar un Origen y un Destino');

        $travel = DistanceController::calculate(    Location::find($request->input('origen'))->address, Location::find($request->input('destino'))->address);
        $user = Auth::user()->id;
        $taxi = new Taxi();
        $taxi->departure = $request->input('date');
        $taxi->travel_time = $travel[1];
        $taxi->origin_id = $request->input('origen');
        $taxi->destination_id = $request->input('destino');
        $taxi->distance = $travel[0];
        $taxi->user_id = $user;
        $taxi->save();
        $taxi->users()->attach($user, ['passengers' => $request->input('pasajeros')]);
        return redirect('/');
    }

    public function assing($id)
    {
        $user = Auth::user()->id;
        $taxi = Taxi::find($id);
        $pasajeros = 0;
        foreach ($taxi->passengers as $passenger)
            $pasajeros += $passenger->pivot->passengers;
        if($pasajeros < 4) {
            $taxi->users()->attach($user, ['passengers' => 1]);
            return 1;
        }
        return 0;

    }

    public function deassing($id)
    {
        $user = Auth::user()->id;
        $taxi = Taxi::find($id);
        $taxi->users()->detach($user);
        return 1;
    }

    public function show($location = 1)
    {
        $taxis = Taxi::where('departure', '>', Carbon::now()->addMinutes(10)->toDateTimeString())->where('departure', '<', Carbon::now()->addHours(24)->toDateTimeString())->orderBy('departure', 'ASC')->get();
        return view('welcome')->with(compact('locations', 'taxis'));
    }

    public function history()
    {
        $taxis = Auth::user()->taxis;
        return view('taxi.history')->with(compact('taxis'));
    }
}
