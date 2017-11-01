$(document).ready(function () {
   $('.deleteItem').on('click', function () {
       if (confirm('Are you sure?')){
       } else {
           return false;
       }
   });

    $('#artist_id').change( function(event) {
        $.get(
            'artistAlbums/',
            { id: $('#artist_id').val() },
        function(data) {
            $('#album_id').html(data);
        });
    });
});