<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\branch;
use App\Models\Medication;
use Illuminate\Support\Facades\Auth;

class adminviewsController extends Controller
{
    //
    public function addmedicin()
    {
        # code...
        return view('admin.addmedicin');
    }
    public function viewalldrugs()
    {
        # code...
        return view('admin.viewalldrugs');
    }

    public function registerbranch()
    {
        # code...
        return view('admin.registerbranch');
    }

    public function productsalenow()
    {
        # code...

        $medecin=Medication::where('branch_id',Auth::user()->branch_id)->get();
        return view('admin.productsalenow',['medecin'=>$medecin]);
    }

    public function viewallusers()
    {
        # code...
        $users=User::where('position','0')->get();
        return view('admin.viewallusers',['users'=>$users]);
    }

    public function viewmanager()
    {
        # code...
        $users=User::where('position','manager')->get();
        return view('admin.viewmanager',['users'=>$users]);
    }

    public function viewallbranch()
    {
        # code...
        $branch=branch::all();
        return view('admin.viewallbranch',['branch'=>$branch]);
    }

    public function registermanager($id)
    {
        # code...makemanager
        if($id){
            $promotm=User::where('id',$id)->first();
            $branch=branch::where('branch_manager',null)->get();
           return view('admin.registermanager',['promotm'=>$promotm,'branch'=>$branch]);
        }else{
            return 'no';
        }


    }
    public function admindashboard()
    {
        # code...
        return view('admin.admindashboard');
    }
}
