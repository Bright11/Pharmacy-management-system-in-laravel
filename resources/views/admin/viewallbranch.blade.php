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
            <h1>All users</h1>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Shop name</th>
                    <th scope="col">Shop Location</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($branch as $b)
                    <tr>
                        <th scope="row">1</th>
                        <td>{{ $b->branch_name }}</td>
                        <td>{{ $b->branch_location }}</td>
                        <td>{{ $b->branch_manager }}</td>
                        <td>
                            <a href="" class="btn btn-warning">Update</a>
                            <a href="" class="btn btn-danger">Delete</a>
                        </td>
                      </tr>
                    @empty

                    @endforelse


                </tbody>
              </table>

        </div>
    </div>
</div>
@endsection
