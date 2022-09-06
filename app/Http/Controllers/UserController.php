<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    

    public function index()
    {

        if(Auth::check()){

            $user_id = Auth::id();
            $company = Company::all();
            //$company = DB::select("SELECT * FROM companies WHERE created_by = '$user_id'");
            return view('users.index', compact('company'));
        }else{
            
        return redirect('login');
        }
        
    }
    /**
    *@param int $id
   * @return \Illuminate\Http\Response
    */
    
    public function show($id){

        $created_by = Auth::id();
        $company = DB::select("SELECT * FROM companies WHERE id = '$id' AND created_by = '$created_by'");
        if(!empty($company)){
        return view('users.company.edit', compact('company'));
        }else{
            redirect('company');
        }
    }

    public function create(){

        return view('users.company.create');
    }
}
