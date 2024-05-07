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

const dropDown = document.querySelector('.drop-item');
const navList = document.querySelector('#nav-list-top');

dropDown.addEventListener('click', () => {
    navList.classList.toggle('active');
})

const navBar = document.querySelector('.nav-bar');
const close = document.querySelector('.close-mobile');
const menuOther = document.querySelector('.menu-other');

navBar.addEventListener('click', () => {
    menuOther.classList.add('active');
});

close.addEventListener('click', () => {
    menuOther.classList.remove('active');
})