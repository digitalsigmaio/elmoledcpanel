@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3 content-insert">
            <div class="row button-area">
                <ul class="nav navbar-nav">
                    <li><a href="trackList" class="btn btn-info">List</a></li>
                    <li><a href="track" class="btn btn-primary">New Track</a></li>
                </ul>
            </div>
            <div id="imaginary_container">
                <form action="{{ route('trackSearch') }}" method="post">
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
    <div class="row track-details" id="trackDetails">
        @if(count($tracks) > 0)
        <hr>
        <table class="table table-striped table-hover ">
            <thead>
            <tr>
                <th>ID</th>
                <th>Artist ID</th>
                <th>Track Name</th>
                <th>Track URL</th>
                <th>Vodafone</th>
                <th>Orange</th>
                <th>Etisalat</th>
                <th>Album ID</th>
                <th>Image URL</th>
                <th>Ringtone URL</th>
                <th>Artist Name</th>
                <th>Edit</th>
                <th>x</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tracks as $track)
                <tr>
                    <td>{{ $track->id }}</td>
                    <td>{{ $track->artist_id }}</td>
                    <td>{{ $track->track_name }}</td>
                    <td class="url">{{ $track->track_url }}</td>
                    <td>{{ $track->vod }}</td>
                    <td>{{ $track->orang }}</td>
                    <td>{{ $track->etis }}</td>
                    <td>{{ $track->album_id }}</td>
                    <td class="url">{{ $track->img_url }}</td>
                    <td class="url">{{ $track->ringtone_url }}</td>
                    <td>{{ $track->artist_name }}</td>
                    <td><a href="track/{{ $track->id }}" class="btn btn-default">Edit</a></td>
                    <td><a href="track/{{ $track->id }}/delete" class="btn btn-danger deleteItem">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
		{{ $tracks->links() }}
        @else
            <h4>There is no Track in the record yet</h4>
        @endif
    </div>
@endsection