@extends('layouts.admin')

@section('title')
    GamesSection
@endsection

@section('content')

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Games</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="/admin/save-games" method="POST">
        {{ csrf_field() }}
      <div class="modal-body">
        
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Name:</label>
            <input type="text" name="name" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
          <label for="recipient-name" class="col-form-label">Videopath:</label>
          <input type="text" name="video_path" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Description:</label>
            <textarea name="description" class="form-control" id="message-text"></textarea>
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
                <h6 class="text-white text-capitalize ps-3">GamesSection
                <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD</button>
                </h6>
                @if(Session('status'))
                <div class="alert alert-success" role="alert">
                    {{Session('status')}}
                </div>
                @endif
              </div>
              <style>
                .w-10p {
                  width: 10% !important;
                }
              </style>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="w-10p">ID</th>
                      <th class="w-10p">Name</th>
                      <th class="w-10p">Videopath</th>
                      <th class="w-10p">Description</th>
                      <th class="w-10p">EDIT</th>
                      <th class="w-10p">DELETE</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($games as $game) 
                    <tr>
                      <td>{{$game->game_id}}</td>
                      <td>{{$game->name}}</td>
                      <td>{{$game->video_path}}</td>
                      <td>{{$game->description}}</td>
                      <td>
                        <a href="{{url('admin/edit-games/'.$game->game_id)}}" class="btn btn-success">Edit</a>
                      </td>
                      <td>
                        <form action="/admin/game-delete/{{$game->game_id}}" method="POST">
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

