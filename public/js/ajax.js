function deleteC(event,id) {
    event.preventDefault();
    const path = $('#delete').attr("href");
    Swal.fire({
        title: "Bạn có chắc muốn xóa?",
        text: "Bạn sẽ không thể khôi phục điều này!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Hủy bỏ",
        confirmButtonText: "Xóa"
    }).then((result) => {
        if (result.value) {

            $.ajax({
                type: "POST",
                url: path, 
                data: { id: id }, 
                success: function(response) {
                    if (response === "true") {
                        Swal.fire("Xóa thành công!", "", "success");
                        var row = $('tr[data-id="' + id + '"]');
                        if (row) {
                            row.remove();
                        }
                    }
                },
            });
        }
    });
}

$(document).ready(function() {
    $('#category_id').change(function() {
        const id = $(this).val();
        $.ajax({
            url: "./Admin/Subcategories",
            method: "POST",
            data: { category_id: id },
            success: function(data) {
                $('#subcat_id').html(data);
            },
        });
    });
});
