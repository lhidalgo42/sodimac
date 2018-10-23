<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaxiController extends Controller
{
    public function create(){
        return view('taxi.create');
    }
}
