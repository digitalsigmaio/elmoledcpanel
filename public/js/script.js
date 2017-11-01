$(document).ready(function () {
   $('.deleteItem').on('click', function () {
       if (confirm('Are you sure?')){
       } else {
           return false;
       }
   });

    $('#artist_id').change( function(event) {
        $.get(
            '/artistAlbums',
            { id: $('#artist_id').val() },
        function(data) {
            $('#album_id').html(data);
        });
    });

    $('.ringtone-play').on('click', function() {
        $('.ringtone-play').hide();
        $('.ringtone-pause').show();
        $('#ringtone-player').get(0).play();
    });

    $('.ringtone-pause').on('click', function() {
        $('.ringtone-pause').hide();
        $('.ringtone-play').show();
        $('#ringtone-player').get(0).pause();
    });

    $('.track-play').on('click', function() {
        $('.track-play').hide();
        $('.track-pause').show();
        $('#track-player').get(0).play();
    });

    $('.track-pause').on('click', function() {
        $('.track-pause').hide();
        $('.track-play').show();
        $('#track-player').get(0).pause();
    });
});