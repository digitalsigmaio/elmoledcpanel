@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3 content-insert">
            <div class="row button-area">
                <ul class="nav navbar-nav">
                    <li><a href="albumList" class="btn btn-info">List</a></li>
                    <li><a href="album" class="btn btn-primary">New Album</a></li>
                </ul>
            </div>
            <div id="imaginary_container">
                <form action="{{ route('albumSearch') }}" method="post">
                    {{ csrf_field() }}
                    <div class="input-group stylish-input-group">
                        <input type="text" class="form-control"  placeholder="Search" name="search">
                        <span class="input-group-addon">
                        <button type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row album-details" id="albumDetails">
        @if(count($albums) > 0)
        <hr>
        <table class="table table-striped table-hover ">
            <thead>
            <tr>
                <th>ID</th>
                <th>Album Name</th>
                <th>Artist</th>
                <th>Image</th>
                <th>Edit</th>
                <th>x</th>
            </tr>
            </thead>
            <tbody>
            @foreach($albums as $album)
                <tr>
                    <td>{{ $album->album_id }}</td>
                    <td>{{ $album->album_name }}</td>
                    <td>{{ $album->artist->artist_name }}</td>
                    <td><div class="img" style="background-image: url('{{ $album->img_url }}');"></div></td>
                    <td><a href="album/{{ $album->album_id }}" class="btn btn-default">Edit</a></td>
                    <td><a href="album/{{ $album->album_id }}/delete" class="btn btn-danger deleteItem">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
		{{ $albums->links() }}
        @else
            <h4>Thier is no Album in the record yet</h4>
        @endif
    </div>
@endsection