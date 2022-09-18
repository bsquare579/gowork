<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function searcher(Request $request){

        $searcher = $request->search;
        $search = DB::table('companies')->where('name', 'LIKE', '%'. $searcher.'%')->get();

        return view('search.search', compact('search'));
    }
    //
}
