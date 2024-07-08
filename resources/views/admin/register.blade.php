@extends('layouts.admin')

@section('title')
    AdminDashboard
@endsection

@section('content')
<div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Registered Roles</h6>
                @if(Session('status'))
                <div class="alert alert-success" role="alert">
                    {{Session('status')}}
                </div>
                @endif
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>User Type</th>
                      <th>Registration</th>
                      <th>EDIT</th>
                      <th>DELETE</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $row)
                    <tr>
                      <td>{{$row->userid}}</td>
                      <td>{{$row->username}}</td>
                      <td>{{$row->email}}</td>
                      <td>{{$row->usertype}}</td>
                      <td>{{$row->registration}}</td>
                      <!--<td>
                        <a href="/admin/role-edit{{$row->userid}}" class="btn btn-success">EDIT</a>
                      </td>-->
                      <td>
                        <a href="{{ route('admin.register-edit', $row->userid) }}" class="btn btn-success">EDIT</a>
                      </td>

                      <td>
                        <form action="/admin/role-delete/{{$row->userid}} " method="POST">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-danger">DELETE</button>
                        </form>
                       
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
     
@endsection

@section('scripts')
@endsection

 