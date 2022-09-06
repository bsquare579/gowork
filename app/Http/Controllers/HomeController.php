<?php

namespace App\Http\Controllers;

use Database\Seeders\UserSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controller\CompanyController;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function gethot(Request $request){

        $lat = $request->query('user-lat');
        $lng = $request->query('user-long');
        
        return DB::select("SELECT *, ROUND(((2 * atan2(sqrt((sin((RADIANS('$lat' - latitude)) / 2) * sin((RADIANS('$lat' - latitude)) / 2) + sin((RADIANS('$lng' - longitude)) / 2) * sin((RADIANS('$lng' - longitude)) / 2) * cos(latitude) * cos('$lat'))), sqrt(1 - (sin((RADIANS('$lat' - latitude)) / 2) * sin((RADIANS('$lat' - latitude)) / 2) + sin((RADIANS('$lng' - longitude)) / 2) * sin((RADIANS('$lng' - longitude)) / 2) * cos(latitude) * cos('$lat'))))) * 6371),1) AS distance FROM companies ORDER BY RAND() LIMIT 6");
       
        

    }
    public function index(Request $request){


        // $lat = 6.4520192;
        // $lng = 3.4111488;

        $lat = $request->query('user-lat');
        $lng = $request->query('user-long');
        // $lat = $request->sessionStorage->get('lat');
        // $lng = $request->sessionStorage->get('lng');
        // $lat = 0;
        // $lng = 0;

       
        
        $company = DB::select("SELECT *, ROUND(((2 * atan2(sqrt((sin((RADIANS('$lat' - latitude)) / 2) * sin((RADIANS('$lat' - latitude)) / 2) + sin((RADIANS('$lng' - longitude)) / 2) * sin((RADIANS('$lng' - longitude)) / 2) * cos(latitude) * cos('$lat'))), sqrt(1 - (sin((RADIANS('$lat' - latitude)) / 2) * sin((RADIANS('$lat' - latitude)) / 2) + sin((RADIANS('$lng' - longitude)) / 2) * sin((RADIANS('$lng' - longitude)) / 2) * cos(latitude) * cos('$lat'))))) * 6371),1) AS distance FROM companies LIMIT 6");
        
        $featured = $this->gethot($request);
        return view('welcome', compact('company', 'featured'));
    }

    public function search(Request $request){

        $lat = $request->query('user-lat');
        $lng = $request->query('user-long');
        $word = $request->query('search');
        $company = DB::select("SELECT *, ROUND(((2 * atan2(sqrt((sin((RADIANS('$lat' - latitude)) / 2) * sin((RADIANS('$lat' - latitude)) / 2) + sin((RADIANS('$lng' - longitude)) / 2) * sin((RADIANS('$lng' - longitude)) / 2) * cos(latitude) * cos('$lat'))), sqrt(1 - (sin((RADIANS('$lat' - latitude)) / 2) * sin((RADIANS('$lat' - latitude)) / 2) + sin((RADIANS('$lng' - longitude)) / 2) * sin((RADIANS('$lng' - longitude)) / 2) * cos(latitude) * cos('$lat'))))) * 6371),1) AS distance FROM companies WHERE name LIKE '%$word%'");
        
        $featured = $this->gethot($request);
        
        return view('welcome', compact('company', 'featured'));
    }
    
}
