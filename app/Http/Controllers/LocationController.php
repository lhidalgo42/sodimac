<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getLocations($without = 0){
        return Location::whereNotIn('id',[$without])->select('id','name','address')->get();
    }
}
