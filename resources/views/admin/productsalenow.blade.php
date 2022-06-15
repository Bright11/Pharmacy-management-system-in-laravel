@extends('include.master')

@section('content')
    <div class="container-fluid mt-5">

        <div class="row">
            <div class="col-md-6">
                <input type="text" id="myinputsalesearch" class="form-control mb-2" placeholder="Search for drug">
                <table class="display table" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>M/D</th>
                            <th>E/D</th>
                            <th>Description</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody id="mytablegetitems">
                        @foreach ($medecin as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->manufacturing_date }}</td>
                            <td>{{ $item->expiring_date }}</td>
                            <td>
                                @include('admin.saledrog_description')
                            </td>
                            <td><a href="" class="btn btn-warning">Add to cart</a></td>

                        </tr>
                        @endforeach


                    </tbody>

                </table>
            </div>
            <div class="col-md-6">
                <table id="cartprint" class="display table" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>E/D</th>
                            <th>M/D</th>
                            <th>Remove</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($medecin as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->expiring_date }}</td>
                            <td>{{ $item->manufacturing_date }}</td>
                            <td><a href="" class="btn btn-danger">X</a></td>

                        </tr>
                        @endforeach


                    </tbody>

                </table>
            </div>
        </div>


    </div>

@endsection
