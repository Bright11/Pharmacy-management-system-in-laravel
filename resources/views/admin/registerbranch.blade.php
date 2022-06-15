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
            <h1>Branch registration</h1>
    <form action="{{ route('addnewbranch') }}" class="myadminform" method="post">
        @csrf
            <label for="">Branch name</label>
            <input type="text" name="branch_name" class="form-control" placeholder="Branch name">
            <label for="">Branch location</label>
            <input type="text" name="branch_location" class="form-control" placeholder="Location">
            <input type="submit" class="form-control">
</form>

        </div>
    </div>
</div>
@endsection
