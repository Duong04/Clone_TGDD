$(document).ready(function() {
    $('#search').on('input', function() {
        const searchTerm = $(this).val();
        $('#search-data').show();
        $.ajax({
            type: 'POST',
            url: './Home/Search',  
            data: { searchData: searchTerm },
            success: function(response) {
                console.log(response);
                $('#search-data').html(response);
            }
        });
    });

    $('#search').on('blur', function() {
        setTimeout(function() {
            if (!$('#search-data').is(':focus')) {
                $('#search-data').hide();
            }
        }, 200); 
    });

});