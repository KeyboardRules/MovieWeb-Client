<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theater;

class TheaterController extends Controller
{
    function TheaterDetailView($id){
        $theater=Theater::find($id);
        if(!empty($theater)){
            return view('client.views.theater-detail',["theater"=>$theater,"movies"=>$theater->movies()->paginate(10)->appends(request()->input())]);
        }
        else{
            return back();
        }
    }
}
