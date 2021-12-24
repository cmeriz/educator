<?php

namespace App\Http\Controllers;

use App\Models\Pensum;
use Illuminate\Http\Request;

class PensumController extends Controller
{
    
    public function index(){
        return view('pensums.index');
    }

    public function show(Pensum $pensum){
        return view('pensums.show', compact('pensum'));
    }

}
