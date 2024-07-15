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
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <form action="/admin/game-edit/{{$games->game_id}}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    
                    <div class="form-group">
                        <label class="font-weight-bold">NAME:</label>
                        <input type="text" name="name" value="{{$games->name}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">VIDEO PATH:</label>
                        <input type="text" name="video_path" value="{{$games->video_path}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">DESCRIPTION:</label>
                        <textarea name="description" class="form-control">{{$games->description}}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">UPDATE</button>
                    <a href="/admin/games" class="btn btn-secondary">BACK</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
@endsection
