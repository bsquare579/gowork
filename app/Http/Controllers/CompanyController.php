<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CompanyController extends Controller
{
    //


    public function gethot(Request $request){

        $lat = $request->query('user-lat');
        $lng = $request->query('user-long');
        
        return DB::select("SELECT *, ROUND(((2 * atan2(sqrt((sin((RADIANS('$lat' - latitude)) / 2) * sin((RADIANS('$lat' - latitude)) / 2) + sin((RADIANS('$lng' - longitude)) / 2) * sin((RADIANS('$lng' - longitude)) / 2) * cos(latitude) * cos('$lat'))), sqrt(1 - (sin((RADIANS('$lat' - latitude)) / 2) * sin((RADIANS('$lat' - latitude)) / 2) + sin((RADIANS('$lng' - longitude)) / 2) * sin((RADIANS('$lng' - longitude)) / 2) * cos(latitude) * cos('$lat'))))) * 6371),1) AS distance FROM companies ORDER BY RAND() LIMIT 6");
       
        

    }
    public function index(Company $company, Request $request){


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

    public function create(){

        return view('company.create');
    }

    public function store(Request $request){
        //Validate


        $name = $request->input('name');
        $email = $request->input('email');
        $address = $request->input('address');
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        $phone = $request->input('phone');
        $created_by = $request->input('created_by');
        
        Company::create($request->all());
        Session::flash('message', 'Company created successfully!');
        Session::flash('alert-class', 'Success'); 
        return redirect('/company');
    }


    public function show($id){

        $company = DB::select('select * from companies where id = ?', [$id]);

        return view('company.edit', compact('company', $company));
    }


    public function display($id){

        $company = DB::select('select * from companies where id = ?', [$id]);

        return view('company.show', compact('company', $company));

    }

    public function destroy($id) {

        $company = Company::find($id);
        $company->delete();
        Session::flash('message', 'Company deleted successfully!');
        Session::flash('alert-class', 'Success');        
        return redirect('/company');
    }

    

    public function update(Request $request, $id){
        
        $company = Company::find($id);
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->address = $request->input('address');
        $company->latitude = $request->input('latitude');
        $company->longitude = $request->input('longitude');
        $company->phone = $request->input('phone');
        $company->update();
        Session::flash('message', 'Company updated successfully!');
        Session::flash('alert-class', 'Success'); 
        return redirect('/company');

    }

    public function edit($id){
        //
        $company = Company::find($id);
        if(is_null($company)){
            return Redirect::route('company.index');
        }

        return View::make('company.edit', compact('company'));
    }

    public function search(Request $request){

        $latitude = $request->input('user-lat');
        $longitude = $request->input('user-long');
        $company = DB::select("SELECT *, ROUND(((2 * atan2(sqrt((sin((RADIANS('+ [user-lat] +' - lat)) / 2) * sin((RADIANS('+ [user-lat] +' - lat)) / 2) + sin((RADIANS('+ [user-long] +' - lng)) / 2) * sin((RADIANS('+ [user-long] +' - lng)) / 2) * cos(lat) * cos('+ [user-lat] +'))), sqrt(1 - (sin((RADIANS('+ [user-lat] +' - lat)) / 2) * sin((RADIANS('+ [user-lat] +' - lat)) / 2) + sin((RADIANS('+ [user-long] +' - lng)) / 2) * sin((RADIANS('+ [user-long] +' - lng)) / 2) * cos(lat) * cos('+ [user-lat] +'))))) * 6371),1) AS distance FROM companies");
    }
    
}
