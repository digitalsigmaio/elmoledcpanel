@extends('layouts.master')

@section('content')
    <div class="col-md-6 col-md-offset-3 content-insert">
        <div class="row">
            <h3>Edit Artist</h3>
        </div>
        <div class="row">
            <form action="artist/{{ $artist->id }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $artist->id }}">
                <div class="form-group">
                    <label for="artist_name">Name</label>
                    <input class="form-control" type="text" id="artist_name" name="artist_name" value="{{ $artist->artist_name }}" required>
                </div>
                <div class="form-group">
                    <label for="img_url">Image Upload</label>
                    <input class="form-control" type="file" id="img_url" name="img_url" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Edit Artist</button>
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