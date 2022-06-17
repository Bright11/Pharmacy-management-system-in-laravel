@extends('include.master')
@section('title')
{{ $finddrug->name }}
@endsection
@section('content')
<div class="container mt-5">
    <section class="medicine mt-5">
        <div class="row">
<div class="col-md-6">
    <img src="{{ asset('productimg/'.$finddrug->image) }}"  class="img-fluid"/>
    <div class="icons">
        <h1>Sales</h1>
    </div>
</div>
<div class="col-md-6 mt-2 ml-1">
<h1>{{ $finddrug->name }}</h1>
<hr>
<p>price: {{ $finddrug->price }}</p>
<hr>
<div class="priceholdergrid">
    <button>Add to cart</button>
</div>
<hr>
<p>{{ $finddrug->description }}</p>
 </div>
</div>

    </section>

    </div>
@endsection
