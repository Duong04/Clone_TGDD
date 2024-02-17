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

function updateRole(role, id) {
    console.log(role, id)
    $.ajax({
        url: "./Admin/updateRole",
        method: "POST",
        data: { 
                role: role,
                id: id
            },
        success: function(data) {
            const roleCell = document.querySelector('td[data-user-id="' + id + '"][data-column="role"]');
            roleCell.textContent = data;
            Swal.fire({
                title: 'Thành công!',
                text: 'Cập nhật thành công!',
                icon: 'success',
                showConfirmButton: false,
                timer: 1000
            });
        }
    });
}

function updateStatus(status, id) {
    $.ajax({
        url: "./Admin/updateStatus",
        method: "POST",
        data: {
            status: status,
            id: id,
        },
        success: function(data) {
            const statusCell = document.querySelector('td[data-user-id="' + id + '"][data-column="status"]');
            statusCell.textContent = data;
            Swal.fire({
                title: 'Thành công!',
                text: 'Cập nhật thành công!',
                icon: 'success',
                showConfirmButton: false,
                timer: 1000
            });
        }
    });
}

function productFilter(value_1=null,value_2=null, category_id, subcat_id=null) {
    const values_1 = $(value_1).val();
    const values_2 = $(value_2).val();
    $.ajax({
        url: "./Products/ProductFilterProcessing",
        method: "POST",
        data: { 
            values_1: values_1,
            values_2: values_2,
            category_id: category_id,
            subcat_id: subcat_id
        },
        success: function(data) {
            $('#product-list').html(data);
            listProducts = $('.product-item').length;
            $('#product-count').text(listProducts);
        },
    })
}

function filterWithChecked(element, category_id, subcat_id=null) {
    const isChecked = element;

    if (isChecked.checked) {
        handleAjaxFilter(element.value, category_id, subcat_id);
    }else {
        handleAjaxFilter('false', category_id, subcat_id);
    }
}

function handleAjaxFilter(element, category_id, subcat_id) {
    $.ajax({
        url: "./Products/ProductFilterProcessing",
        method: "POST",
        data: {
            element: element,
            category_id: category_id,
            subcat_id: subcat_id
        },
        success: function(data) {
            $('#product-list').html(data);
            listProducts = $('.product-item').length;
            $('#product-count').text(listProducts);
        }
    });
}