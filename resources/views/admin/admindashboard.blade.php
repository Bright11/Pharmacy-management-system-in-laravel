@extends('include.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="sidebar">
                @include('admin.admininclude.sidebar')
            </div>
        </div>
        <div class="col-md-9 admincontent">
            <div class="row">
                <div class="col-md-3 admindiv">
                    Number of branches<br>
                    {{ $nofbranch }}
                </div>
                <div class="col-md-3 admindiv">
                    Number of workers
                </div>
                <div class="col-md-3 admindiv">
                    Number of Managers
                </div>
                <div class="col-md-3 admindiv">
                    Number of users
                    <br>
                    {{ $nofuser }}
                </div>
                <div class="col-md-3 admindiv">
                    Total sales<br>
                    $:{{ $soldedrug }}
                </div>
                <div class="col-md-3 admindiv">
                    number of drugs<br>
                    {{ $nofdrug }}
                </div>
            </div>
            <div class="col-md-3 admindiv">
                Total price of all drugs<br>
                $:{{ $drugtotalp }}
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
