<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AlternativeModel;
use App\Models\ContactUsModel;
use App\Models\CriteriaModel;
use App\Models\FacilityModel;

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
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['alternative'] = AlternativeModel::count();
        $data['contact_us'] = ContactUsModel::count();
        $data['criteria'] = CriteriaModel::count();
        $data['facility'] = FacilityModel::count();
        

        return view('admin.home.index', $data);        
    }
}
