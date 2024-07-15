@extends('layouts.admin')

@section('title')
    Admin Dashboard
@endsection

@section('content')

<!--First Table-->
<div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Games Table</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Storage</th>
                      <th>Description</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($Games as $game)
                    <tr>
                      <td>{{$game->game_id}}</td>
                      <td>{{$game->name}}</td>
                      <td>{{$game->video_path}}</td>
                      <td>{{$game->description}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!--Second Table-->
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Tickets Table</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Ticket Type</th>
                      <th>Price</th>
                      <th>Description</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($Tickets as $ticket)
                    <tr>
                      <td>{{$ticket->id}}</td>
                      <td>{{$ticket->ticket_type}}</td>
                      <td>{{$ticket->price}}</td>
                      <td>{{$ticket->description}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!--Third Table-->
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Promotion Table</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Code</th>
                      <th>Discount Percentage</th>
                      <th>First Time Only</th>
                      <th>Minimum Cart Value</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($PromotionCodes as $promotion)
                    <tr>
                      <td>{{$promotion->id}}</td>
                      <td>{{$promotion->code}}</td>
                      <td>{{$promotion->discount_percentage}}</td>
                      <td>{{$promotion->first_time_only}}</td>
                      <td>{{$promotion->minimum_cart_value}}</td>
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

