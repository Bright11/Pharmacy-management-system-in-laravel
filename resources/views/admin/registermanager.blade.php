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
            <h1>Manager registration</h1>
    <form action="/makemanager/{{ $promotm->id }}" class="myadminform" method="post">
        @csrf
            <label for="">Branch name</label>
            <input type="text" class="form-control" value="{{ $promotm->name }}">
            <label for="">Branch location</label>
           <select name="branch_manager"  class="form-control">
               <option selected value="">Choose branch</option>
               @forelse ($branch as $b)
               <option value="{{ $b->id }}">{{ $b->branch_name }}</option>
               @empty

               @endforelse

           </select>
            <input type="submit" class="form-control">
</form>

        </div>
    </div>
</div>
@endsection
