@extends('include.master')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-3">
            <div class="sidebar">
                @include('admin.admininclude.sidebar')
            </div>
        </div>
        <div class="col-md-9 admincontent">
            <div class="row adminmainrow">
                <div class="col-md-3 admindiv">
                    <i class="fa-solid adminicon fa-code-branch"></i><br>
                    Number of branches<br>
                    {{ $nofbranch }}
                </div>
                <div class="col-md-3 admindiv">
                    <i class="fa-solid adminicon fa-user-nurse"></i><br>
                    Number of workers
                </div>
                <div class="col-md-3 admindiv">
                    <i class="fa-solid adminicon fa-toolbox"></i><br>
                   Managers<br>
                   {{ $nofmanagers }}
                </div>
                <div class="col-md-3 admindiv">
                    <i class="fa-solid adminicon fa-user-doctor"></i><br>
                    Number of users
                    <br>
                    {{ $nofuser }}
                </div>
                <div class="col-md-3 admindiv">
                    <i class="fa-brands adminicon fa-salesforce"></i><br>
                    Total sales<br>
                    $:{{ $soldedrug }}
                </div>
                <div class="col-md-3 admindiv">
                    <i class="fa-solid adminicon fa-capsules"></i><br>
                    number of drugs<br>
                    {{ $nofdrug }}
                </div>
            </div>
            <div class="col-md-3 admindiv">
                <i class="fa-solid adminicon fa-universal-access"></i><br>
                Total price of all drugs<br>
                $:{{ $drugtotalp }}
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
