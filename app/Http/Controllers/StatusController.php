<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusController extends Controller
{
    public function show($id){

        $company = DB::select("select * FROM companies WHERE id = '$id'"); 
        return view('company.status', compact('company'));
    }

    public function update(Request $request, $id){
        
        $status = $request->get('status');
        $company = DB::select("UPDATE companies SET status = '$status' WHERE id = '$id'");
        
        return redirect('/company');

    }
}
