@extends('layouts.master')

@section('content')
    <div class="col-md-6 col-md-offset-3 content-insert">
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
            <div class="row">
                @if(session()->get('message'))
                    <div class="alert alert-dismissible alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>{{ session()->get('message') }}</strong>.
                    </div>
                @endif
            </div>
        <div class="row">
            <h3>Edit Track</h3>
        </div>
        <div class="row">
            <form action="{{ $track->id }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $track->id }}"> <div class="form-group">
                    <label for="track_name">Track Name</label>
                    <input class="form-control" type="text" id="track_name" name="track_name" value="{{ $track->track_name }}" required>
                </div>
                <div class="form-group">
                    <label for="artist_id">Artist</label>
                    <select name="artist_id" id="artist_id" class="form-control">
                        @if($artists)
                            @foreach($artists as $artist)
                                <option value="{{ $artist->id }}" {{ $track->artist_id == $artist->id ? 'selected' : '' }}>{{ $artist->artist_name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="album_id">Album</label>
                    <select name="album_id" id="album_id" class="form-control">
                        @if($albums)
                            @foreach($albums as $album)
                                <option value="{{ $album->album_id }}" {{ $track->album_id == $album->album_id ? 'selected' : '' }}>{{ $album->album_name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="vod">Vodafone</label>
                    <input class="form-control" type="text" id="vod" name="vod" value="{{ $track->vod }}" >
                </div>
                <div class="form-group">
                    <label for="orang">Orange</label>
                    <input class="form-control" type="text" id="orang" name="orang" value="{{ $track->orang }}" >
                </div>
                <div class="form-group">
                    <label for="etis">Etisalat</label>
                    <input class="form-control" type="text" id="etis" name="etis" value="{{ $track->etis }}" >
                </div>
                <div class="form-group">
                    <label for="img_url">Image Upload</label>
                    <input class="form-control" type="file" id="img_url" name="img_url" >
                </div>
                <div class="form-group">
                    <label for="track_url">Track Upload</label>
                    <input class="form-control" type="file" id="track_url" name="track_url" >
                </div>
                <div class="form-group">
                    <label for="ringtone_url">Ringtone Upload</label>
                    <input class="form-control" type="file" id="ringtone_url" name="ringtone_url" >
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Edit Track</button>
                </div>
            </form>
        </div>


    </div>
@endsection