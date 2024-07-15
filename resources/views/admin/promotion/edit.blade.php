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
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <form action="/admin/promotion-update/{{$PromotionCode->id}}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    
                    <div class="form-group">
                        <label for="code" class="font-weight-bold">CODE:</label>
                        <input type="text" name="code" class="form-control" id="code" value="{{$PromotionCode->code}}">
                    </div>
                    <div class="form-group">
                        <label for="discount_percentage" class="font-weight-bold">DISCOUNT PERCENTAGE:</label>
                        <input type="text" name="discount_percentage" class="form-control" id="discount_percentage" value="{{$PromotionCode->discount_percentage}}">
                    </div>
                    <div class="form-group">
                        <label for="first_time_only" class="font-weight-bold">FIRST TIME ONLY:</label>
                        <input type="text" name="first_time_only" class="form-control" id="first_time_only" value="{{$PromotionCode->first_time_only}}">
                    </div>
                    <div class="form-group">
                        <label for="minimum_cart_value" class="font-weight-bold">MINIMUM CART VALUE:</label>
                        <input type="text" name="minimum_cart_value" class="form-control" id="minimum_cart_value" value="{{$PromotionCode->minimum_cart_value}}">
                    </div>

                    <div class="modal-footer">
                        <a href="/admin/promotion" class="btn btn-secondary">BACK</a>
                        <button type="submit" class="btn btn-primary">UPDATE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
@endsection
