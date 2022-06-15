<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class frontendviewsController extends Controller
{
    //

    public function index()
    {
        # code...
        return view('frontend.index');
    }
}
