<?php

namespace App\Http\Controllers;

use App\Models\AlternativeModel;
use App\Models\CriteriaModel;
use App\Models\FacilityModel;
use App\Models\SliderModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['alternatives'] = AlternativeModel::all();
        $data['criterias'] = CriteriaModel::with('criterion_value')->get();
        $data['facilities'] = FacilityModel::all();
        $data['sliders'] = SliderModel::where('status', 1)->get();

        return view('home', $data);
    }
}
