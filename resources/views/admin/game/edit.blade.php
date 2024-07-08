@extends('layouts.admin')

@section('title')
    GamesSection Edit
@endsection

@section('content')

<div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Games Edit Data</h6>

       <form action="/admin/game-edit/{{$games->game_id}}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
      <div class="modal-body">
        
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Name:</label>
            <input type="text" name="name" class="form-control" value="{{$games->name}}">
          </div>
          <div class="mb-3">
          <label for="recipient-name" class="col-form-label">Videopath:</label>
          <input type="text" name="video_path" class="form-control" value="{{$games->video_path}}">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Description:</label>
            <textarea name="description" class="form-control">value="{{$games->description}}"</textarea>
          </div>
      </div>
      <div class="modal-footer">
        <a href="/admin/games" class="btn btn-secondary">BACK</button>
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

