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
            <h1>Add medication</h1>
    <form action="{{ route('adddrog') }}" class="myadminform" method="post" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="col-md-6">
            <label for="">Drug name</label>
            <input type="text" name="name" class="form-control" placeholder="Drug name">
            <label for="">Drug Manufacturing date</label>
            <input type="text" name="manufacturing_date" class="form-control" value="{{ date('d/m/Y') }}">
        </div>
        <div class="col-md-6">
            <label for="">Drug price</label>
            <input type="text" name="price" class="form-control" placeholder="price">
            <label for="">Drug Expiring date</label>
            <input type="text" name="expiring_date" class="form-control" value="{{ date('d/m/Y') }}">
        </div>
    </div>
    <label for="">Drug Quantity</label>
    <input type="number" name="qty" class="form-control" >
    <label for="">Drug Imag <small>Optional</small></label>
            <input type="file" name="image" class="form-control">

    <label for="">Drug description</label>
    <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Drug description"></textarea>
    <input type="submit" class="form-control">
</form>

        </div>
    </div>
</div>

@endsection
