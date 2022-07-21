<?php

namespace App\Http\Controllers\Car\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Country;
class CarMasterController extends Controller
{ 
    public function index()
    {
        $countries = Country::paginate(5);

        return view('Car/Master/index', ['countries' => $countries]);
    }
}
