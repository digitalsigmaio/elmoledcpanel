@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3 content-insert">
            <div class="row button-area">
                <ul class="nav navbar-nav">
                    <li><a href="artistList" class="btn btn-info">List</a></li>
                    <li><a href="artist" class="btn btn-primary">New Artist</a></li>
                </ul>
            </div>
            <div id="imaginary_container">
                <form action="{{ route('artistSearch') }}" method="post">
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
    <div class="row artist-details" id="artistDetails">
        @if(count($artists) > 0)
        <hr>
        <table class="table table-striped table-hover ">
            <thead>
            <tr>
                <th>ID</th>
                <th>Artist Name</th>
                <th>Image</th>
                <th>Edit</th>
                <th>x</th>
            </tr>
            </thead>
            <tbody>
            @foreach($artists as $artist)
                <tr>
                    <td>{{ $artist->id }}</td>
                    <td>{{ $artist->artist_name }}</td>
                    <td><div class="img" style="background-image: url('{{ $artist->img_url }}');"></div></td>
                    <td><a href="artist/{{ $artist->id }}" class="btn btn-default">Edit</a></td>
                    <td><a href="artist/{{ $artist->id }}/delete" class="btn btn-danger deleteItem">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
		{{ $artists->links() }}
        @else
            <h4>There is no Artist in the record yet</h4>
        @endif
    </div>
@endsection