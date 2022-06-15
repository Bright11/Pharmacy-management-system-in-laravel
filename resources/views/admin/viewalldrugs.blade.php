@extends('include.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="sidebar">
                @include('admin.admininclude.sidebar')
            </div>
        </div>
        <div class="col-md-9">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Drug name</th>
                    <th scope="col">Drug price</th>
                    <th scope="col">Manufacturing date</th>
                    <th scope="col">Expiring date</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>

                </tbody>
              </table>

        </div>
    </div>
</div>
@endsection
