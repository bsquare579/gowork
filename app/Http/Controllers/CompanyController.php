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
    public function index(Company $company, Request $request){

        $company = Company::all();
        return view('company.index', compact('company'));
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

   
}
