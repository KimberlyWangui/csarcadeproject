@extends('layouts.admin')

@section('title')
    PromotionSection Edit
@endsection

@section('content')
<div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Promotion Edit Data</h6>

                
        <form action="/admin/promotion-update/{{$PromotionCode->id}}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

      <div class="modal-body">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Code:</label>
            <input type="text" name="code" class="form-control" id="recipient-name" value="{{$PromotionCode->code}}">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Discount Percentage:</label>
            <input type="text" name="discount_percentage" class="form-control" id="recipient-name" value="{{$PromotionCode->discount_percentage}}">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">First Time Only:</label>
            <input type="text" name="first_time_only" class="form-control" id="recipient-name" value="{{$PromotionCode->first_time_only}}">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Minimum Cart Value:</label>
            <input type="text" name="minimum_cart_value" class="form-control" id="recipient-name" value="{{$PromotionCode->minimum_cart_value}}">
          </div>
      </div>
      <div class="modal-footer">
        <a href="/admin/promotion" class="btn btn-secondary">BACK</button>
        <button type="submit" class="btn btn-primary">UPDATE</button>
      </div>
      </form>

              </div>
            </div>
          </div>
        </div>
</div>


@endsection

@section('scripts')
@endsection
