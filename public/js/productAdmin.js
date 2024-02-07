ClassicEditor
.create( document.querySelector( '#description' ) )
.catch( error => {
    console.error( error );
} );

function validateDiscount(input) {
    if (input.value < 0) {
        input.value = 0;
    }

    if (input.value > 100) {
        input.value = 100; 
    }
}

function validatePrice(input) {
    if (input.value < 0) {
        input.value = 0;
    }
}