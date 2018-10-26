<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;


class inicio extends Controller
{
    public function index()
    {	
	    return view ("sistema_vistas.index");
	}	
}
