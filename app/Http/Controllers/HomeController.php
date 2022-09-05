<?php

namespace App\Http\Controllers;

use Database\Seeders\UserSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    public function index()
    {

        if(Auth::check()){

            $id = Auth::id();
            $user = DB::select("SELECT * FROM companies WHERE created_by = '$id' ");
            return view('users.index', compact('user'));
        }else{
            return redirect()->back();
        }
        
        return view('login');
    }
}
