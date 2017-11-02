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

@else
    <h4>There is no records for your search.</h4>
@endif