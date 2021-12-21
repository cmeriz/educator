<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PensumController extends Controller
{
    
    public function index(){
        return view('pensums.index');
    }

}
