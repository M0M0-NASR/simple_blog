$('#search').on('keyup', function () {
    $value = $(this).val();
    $.ajax({
        type: 'get',
        url: 'posts/search',
        data: { 'search': $value },
        success: function (data) {
            $('#searchResults').html(data);
        },
        error: function (xhr, status, error) {
            // Display an error message

            $('#message').text('Search failed: ' + error);
        }
    });
})

$.ajaxSetup({ headers: { 'csrftoken': '{{ csrf_token() }}' } });
