<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class TaxiController extends Controller
{
    public function create(){
        $locations = Location::all();
        return view('taxi.create');
    }
}
