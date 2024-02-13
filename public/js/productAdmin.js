$('#description').summernote({
    placeholder: 'Mô tả sản phẩm',
    tabsize: 2,
    height: 300,
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'underline', 'clear']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'video']],
      ['view', ['fullscreen', 'codeview', 'help']]
    ]
  });

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