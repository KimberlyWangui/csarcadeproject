@extends('layouts.admin')

@section('title')
    Edit-Role
@endsection

@section('content')
<div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Edit Role of Registered User</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <form action="/admin/role-register-update/{{$users->userid}}" method="POST">
                {{csrf_field()}}
                {{method_field('PUT')}}
                
                <div class="form-group">
                <label class="font-weight-bold">NAME:</label>
                <input type="text" name="username" value="{{$users->username}}" class="form-control">
                </div>
                <div class="form-group">
                <label class="font-weight-bold">EMAIL:</label>
                <input type="email" name="email" value="{{$users->email}}" class="form-control">
                </div>
                <div class="form-group">
                <label class="font-weight-bold">GIVE ROLE:</label>
                <select name="usertype" class="form-control">
                  <option value="admin">Admin</option>
                  <option value="Customer">Customer</option>
                </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="/admin/role-register" class="btn btn-danger">Cancel</a>
              </form>
              </div>
            </div>
          </div>
        </div>
     
@endsection

@section('scripts')
@endsection

