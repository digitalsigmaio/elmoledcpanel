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
                <th>Artist</th>
                <th>Album</th>
                <th>Track Name</th>
                <th>Track</th>
                <th>Vodafone</th>
                <th>Orange</th>
                <th>Etisalat</th>
                <th>Image</th>
                <th>Ringtone</th>

                <th>Edit</th>
                <th>x</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tracks as $track)
                <tr>
                    <td>{{ $track->id }}</td>
                    <td>{{ $track->artist_name }}</td>
                    @php
                        $album = \App\Album::find($track->album_id);
                    @endphp
                    <td>{{ $album->album_name }}</td>
                    <td>{{ $track->track_name }}</td>
                    <td>

                        <audio id="track-player" src="{{ $track->track_url }}" type="audio/mpeg"></audio>
                        <div class="track-player">
                            <span class="glyphicon glyphicon-play track-play"></span>
                            <span class="glyphicon glyphicon-pause track-pause" style="display: none"></span>
                        </div>

                    </td>
                    <td>{{ $track->vod }}</td>
                    <td>{{ $track->orang }}</td>
                    <td>{{ $track->etis }}</td>
                    <td><div class="img track-img" style="background-image: url('{{ $track->img_url }}');"></div></td>
                    <td>
                        @if($track->ringtone_url != null)
                            <audio id="ringtone-player" src="{{ $track->ringtone_url }}" type="audio/mpeg"></audio>
                            <div class="ringtone-player">
                                <span class="glyphicon glyphicon-play ringtone-play"></span>
                                <span class="glyphicon glyphicon-pause ringtone-pause" style="display: none"></span>
                            </div>
                            @else
                                There is no associated ringtone for this track.
                        @endif
                    </td>
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