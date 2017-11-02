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
                    <div id="player">
                        <span class="glyphicon glyphicon-play play"></span>
                        <span class="glyphicon glyphicon-pause pause" style="display: none"></span>
                        <audio class="player" src="{{ $track->track_url }}" type="audio/mpeg"></audio>
                    </div>

                </td>
                <td>{{ $track->vod }}</td>
                <td>{{ $track->orang }}</td>
                <td>{{ $track->etis }}</td>
                <td><div class="img track-img" style="background-image: url('{{ $track->img_url }}');"></div></td>
                <td>
                    @if($track->ringtone_url != null)
                        <div id="player">
                            <span class="glyphicon glyphicon-play play"></span>
                            <span class="glyphicon glyphicon-pause pause" style="display: none"></span>
                            <audio class="player" src="{{ $track->ringtone_url }}" type="audio/mpeg"></audio>
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
@else
    <h4>There is no records for your search.</h4>
@endif