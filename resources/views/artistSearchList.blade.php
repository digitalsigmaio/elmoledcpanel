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
@else
    <h4>There is no records for your search.</h4>
@endif