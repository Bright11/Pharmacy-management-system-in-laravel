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
            <div class="col-md-3 admindiv"></div>
            <div class="col-md-3 admindiv"></div>
            <div class="col-md-3 admindiv"></div>
            <div class="col-md-3 admindiv"></div>
            <div class="col-md-3 admindiv"></div>
        </div>
    </div>
</div>
@endsection
