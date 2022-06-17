<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\branch;
use App\Models\manager;
use App\Models\Medication;
use App\Models\Poscart;
use App\Models\Poschechout;
use App\Models\Posorders;
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
        $admedecine->qty=$req->qty;
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

    public function addtocartpos(Request $req,$id)
    {
        $validete= $req->validate([
            'qty'=>'required',
        ]);
        # code...

        $drug=Medication::where('id',$id)->where('branch_id',Auth::user()->branch_id)->first();
        $check=Poscart::where('drug_id',$id)->where('branch_id',Auth::user()->branch_id)->where('user_id', Auth::user()->id)->first();
        $checkorder=Posorders::where('drug_id',$id)->where('branch_id',Auth::user()->branch_id)->where('user_id', Auth::user()->id)->first();

        if($req->qty >$drug->qty ){
            return redirect()->back()->with('status','Check qty is heiger what we have');
        }elseif($req->qty <0){
            return redirect()->back()->with('status','Check qty is in less than 0');
        }elseif($req->qty ==0){
            return redirect()->back()->with('status','Check qty is 0');
        }
        else{


                $poscart=new Poscart;
                $poscart->drug_id=$drug->id;
                $poscart->name=$drug->name;
                $poscart->price=$drug->price;
                $poscart->expiring_date=$drug->expiring_date;
                $poscart->manufacturing_date=$drug->manufacturing_date;
                $poscart->image=$drug->image;
                $poscart->branch_id=Auth::user()->branch_id;
                $poscart->user_id=Auth::user()->id;
                $poscart->qty=$req->qty;
                $poscart->totalprice=$drug->price * $req->qty;
                $poscart->save();
                if($poscart){
                    $posorder=new Posorders;
                    $posorder->drug_id=$drug->id;
                    $posorder->name=$drug->name;
                    $posorder->price=$drug->price;
                    $posorder->expiring_date=$drug->expiring_date;
                    $posorder->manufacturing_date=$drug->manufacturing_date;
                    $posorder->image=$drug->image;
                    $posorder->branch_id=Auth::user()->branch_id;
                    $posorder->user_id=Auth::user()->id;
                    $posorder->qty=$req->qty;
                    $posorder->totalprice=$drug->price * $req->qty;
                    $posorder->save();
                if($poscart){
                    $drug->qty=$drug->qty-$req->qty;
                    $drug->update();
                    return redirect()->back();
                }
            }
            }


        //
    }

    public function deleteposcart($id)
    {
        # code...
        $updatedrug=Medication::where('id',$id)->first();
        $calculateqty=Poscart::where('drug_id',$id)->where('branch_id',Auth::user()->branch_id)->where('user_id',Auth::user()->id)->sum('qty');
        $updatedrug->qty= $calculateqty;
        $updatedrug->update();
        if($updatedrug){
            $deletepos= Poscart::where('drug_id',$id)->where('branch_id',Auth::user()->branch_id)->where('user_id', Auth::user()->id)->delete();
        if($deletepos){
           Posorders::where('drug_id',$id)->where('branch_id',Auth::user()->branch_id)->where('user_id', Auth::user()->id)->where('status','0')->where('status','0')->delete();
           return redirect()->back();
        }
        }else{
            return redirect()->back()->with('status','Error');
        }

    }

    public function checkoutpos(Request $req)
    {
        # code...
        $check=Posorders::where('branch_id',Auth::user()->branch_id)->where('user_id', Auth::user()->id)->where('status','0')->first();
        $checkposcart=Poscart::where('branch_id',Auth::user()->branch_id)->where('user_id', Auth::user()->id)->first();
        if(!$checkposcart){
            return redirect()->back()->with('status','You should not click any how as an admin');
        }else{
            $gettotal=new Poschechout;
        $gettotal->total=$req->total;
        $gettotal->branch_id=Auth::user()->branch_id;
        $gettotal->user_id=Auth::user()->id;
        $gettotal->save();
        if($gettotal){
            $check->status='completed';
            $check->update();
            if($check){
                Poscart::where('branch_id',Auth::user()->branch_id)->where('user_id', Auth::user()->id)->delete();
                return redirect()->back()->with('status','Thank you for shopping with us');
            }

        }
        }
    }
}
