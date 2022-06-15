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
                    <th scope="col">User name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Position</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($users as $u)
                    <tr>
                        <th scope="row">1</th>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->status }}</td>
                        <td>{{ $u->position }}</td>
                        <td><a href="/registermanager/{{ $u->id }}" class="btn btn-warning">promote to manager</a>
                            <a href="" class="btn btn-warning">Suspend</a>
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
