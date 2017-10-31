@extends('layouts.master')

@section('content')
    <div class="col-md-6 col-md-offset-3 content-insert">
        <div class="row">
            <h3>Edit Album</h3>
        </div>
        <div class="row">
            <form action="album/{{ $album->album_id }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="album_id" value="{{ $album->album_id }}">
                <div class="form-group">
                    <label for="album_name">Album Name</label>
                    <input class="form-control" type="text" id="album_name" name="album_name" value="{{ $album->album_name }}" required>
                </div>
                <div class="form-group">
                    <label for="artist_id"></label>
                    <select name="artist_id" id="artist_id" class="form-control">
                        @if($artists)
                            @foreach($artists as $artist)
                                <option value="{{ $artist->id }}" {{ $artist->id == $album->artist_id ? 'selected' : ''}}>{{ $artist->artist_name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="img_url">Image Upload</label>
                    <input class="form-control" type="file" id="img_url" name="img_url" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Edit Album</button>
                </div>
            </form>
        </div>
        <div class="row">
            @if(session()->get('message'))
                <div class="alert alert-dismissible alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>{{ session()->get('message') }}</strong>.
                </div>
            @endif
        </div>
        @if(count($errors) > 0)
            <div class="row">
                <div class="alert alert-dismissible alert-warning">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    </div>
@endsection