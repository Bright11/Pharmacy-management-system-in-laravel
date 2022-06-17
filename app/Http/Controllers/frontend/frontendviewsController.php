<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Medication;
use Illuminate\Http\Request;

class frontendviewsController extends Controller
{
    //

    public function index()
    {
        # code...
        $pro=Medication::whereNOTNull('image')->get();
        return view('frontend.index',['pro'=>$pro]);
    }

    public function details($id)
    {
        # code...
        $finddrug=Medication::find($id);
        return view('frontend.details',['finddrug'=>$finddrug]);
    }
}
