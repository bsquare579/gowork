<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    // public function getaccount(){

    //     return User::find()->all();
    // }

    public function index()
    {

        if(Auth::check()){

            $sig = Auth::id();
            $company = DB::select("SELECT * FROM companies WHERE created_by = '$sig' ");
            return view('users.index', compact('company'));
        }else{
            
        return redirect('login');
        }
        
    }
    public function show($id){

        $created_by = Auth::id();
        $company = DB::select("SELECT * FROM companies WHERE id = '$id' AND created_by = '$created_by'");
        return view('users.company.edit', compact('company'));
    }
}
