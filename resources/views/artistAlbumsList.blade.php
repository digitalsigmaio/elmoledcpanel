@foreach($albums as $album)
    <option value="{{ $album->album_id }}">{{ $album->album_name }}</option>
@endforeach