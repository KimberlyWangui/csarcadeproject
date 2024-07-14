@extends('layouts.admin')

@section('title')
    Promotion Section
@endsection

@section('content')

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Promotion</h1>
      </div>

      <form action="/admin/save-promotion" method="POST">
        {{ csrf_field() }}

      <div class="modal-body">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Code:</label>
            <input type="text" name="code" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Discount Percentage:</label>
            <input type="text" name="discount_percentage" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">First Time Only:</label>
            <input type="text" name="first_time_only" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Minimum Cart Value:</label>
            <input type="text" name="minimum_cart_value" class="form-control" id="recipient-name">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">SAVE</button>
      </div>
      </form>

    </div>
  </div>
</div>

<div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Promotions table
                <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD</button>
                </h6>
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
                      <th class="w-10p">ID</th>
                      <th class="w-10p">Code</th>
                      <th class="w-10p">Discount Percentage</th>
                      <th class="w-10p">First Time Only</th>
                      <th class="w-10p">Minimum Cart Value</th>
                      <th class="w-10p">EDIT</th>
                      <th class="w-10p">DELETE</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($PromotionCode as $promotion)
                    <tr>
                      <td>{{$promotion->id}}</td>
                      <td>{{$promotion->code}}</td>
                      <td>{{$promotion->discount_percentage}}</td>
                      <td>{{$promotion->first_time_only}}</td>
                      <td>{{$promotion->minimum_cart_value}}</td>
                      <td>
                        <a href="{{url('admin/edit-promotion/'.$promotion->id)}}" class="btn btn-success">Edit</a>
                      </td>
                      <td>
                      <form action="/admin/promotion-delete/{{$promotion->id}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">Delete</button>
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

