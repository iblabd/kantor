<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\article;

class DashboardController extends Controller
{
    public function home(){

    	$articles = article::all();
    	return view('dashboard', ['articles' => $articles]);
    }

    public function read($id){
    	$articles = article::find($id);
    	return view('dashboard', ['article' => $articles]);
    }

}
