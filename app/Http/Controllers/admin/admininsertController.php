<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\branch;
use App\Models\manager;
use App\Models\Medication;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class admininsertController extends Controller
{
    //
    public function addnewbranch(Request $req)
    {
        $validete= $req->validate([
            'branch_name'=>'unique:branches||required'
        ]);
        # code...
        $branch=new branch;
        $branch->branch_name=$req->branch_name;
        $branch->branch_location=$req->branch_location;
        $branch->save();
        return redirect()->back();
    }
    public function makemanager(Request $req,$id)
    {
        $validete= $req->validate([
            'branch_manager'=>'required',
            'branch_manager'=>'unique:branches'
        ]);
        # code...
        $users=User::where('id',$id)->first();
        //$manager=NEW manager;
        $users->position='manager';
        $users->role='manager';
        $users->branch_id=$req->branch_manager;
        $users->update();
        $branch=branch::where('id',$req->branch_manager)->first();
        $branch->branch_manager=$users->id;
        $branch->update();
        return redirect()->back();
    }

    public function demotemanager($id)
    {
        # code...
        $users=User::where('id',$id)->first();
        //$manager=NEW manager;
        $users->position='0';
        $users->role='0';
        $users->update();
        return redirect()->back();
    }

    public function adddrog(Request $req)
    {

      $medecinid= Auth::user()->branch_id;
        # code...
        $admedecine=new Medication;
        $admedecine->name=$req->name;
        $admedecine->price=$req->price;
        $admedecine->expiring_date=$req->expiring_date;
        $admedecine->manufacturing_date=$req->manufacturing_date;
        $admedecine->description=$req->description;
        $admedecine->branch_id=$medecinid;
        if($req->hasfile('image')){
        $file=$req->file('image');
        $extension=$file->getClientOriginalExtension();
        $filename=time().'.'.$extension;
        $file->move('productimg/',$filename);
        $admedecine->image=$filename;
        }
        $admedecine->save();
        return redirect()->back();
    }
}
