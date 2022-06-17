@extends('include.master')

@section('content')
    <div class="container-fluid mt-5">
        <div class="totalposcart">
            <form action="{{ route('checkoutpos') }}" class="poscaheckout" method="post">
                @csrf
                <input type="hidden" name="total" value="{{ $calculate }}">
                <button>Complete order</button>
            </form>
            <button class="btn btn-success">Total: ${{ $calculate }}</button>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <input type="text" id="myinputsalesearch" class="form-control mb-2" placeholder="Search for drug">
                <table class="display table tablecart" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>M/D</th>
                            <th>E/D</th>
                            <th>Description</th>
                            <th>Qty</th>
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
                                {{-- {{ route('addtocartpos') }} --}}
                                @include('admin.saledrog_description')
                            </td>
                           <form action="/addtocartpos/{{ $item->id }}"  method="post">
                            @csrf
                            <td><input type="number" name="qty" value="1"></td>

                            <td><button class="btn btn-warning">Add to Cart</button></td>
                           </form>

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
                            <th>Total Price</th>
                            <th>E/D</th>
                            <th>M/D</th>
                            <th>Qty</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($posbuy as $c)
                        <tr>
                            <td>{{ @$c->name }}</td>
                            <td>{{ @$c->price }}</td>
                            <td>{{ @$c->totalprice }}</td>
                            <td>{{ @$c->expiring_date }}</td>
                            <td>{{@$c->manufacturing_date }}</td>
                            <td>{{$c->qty }}</td>
                            <td><a href="/deleteposcart/{{ $c->drug_id }}" class="btn btn-danger">X</a></td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>


    </div>

@endsection
