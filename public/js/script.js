$(document).ready(function () {
    $('.deleteItem').on('click', function () {
        if (confirm('Are you sure?')) {
        } else {
            return false;
        }
    });

    $('#artist_id').change(function (event) {
        $.get(
            '/artistAlbums',
            {id: $('#artist_id').val()},
            function (data) {
                $('#album_id').html(data);
            });
    });

    $('.play').on('click', function () {
        $this = $(this);
        $this.hide();
        $this.next('.pause').show();
        $('#player').get(0).play();
    });


    $('.pause').on('click', function () {
        $this = $(this);
        $this.hide();
        $this.prev('.play').show();
        $('#player').get(0).pause();
    });

});
