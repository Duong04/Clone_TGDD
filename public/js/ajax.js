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

function removeCart(product_id) {
    $.ajax({
        url: "./Cart/RemoveCart",
        method: "POST",
        data: {
            product_id: product_id
        },
        success: function(data) {
            $('#sub-total').html(data);
            $('#sub-total-2').html(data);
            $('tr[data-id="' + product_id + '"]').remove();
            const a = $('tbody tr').length;
            if (a == 0) {
                window.location.reload();
            }
        }
    });
}

function updateQuantity(product_id, quantity_change) {
    let quantity_input = $('#quantity_' + product_id);
    let new_quantity = parseInt(quantity_input.val()) + parseInt(quantity_change);
    if (new_quantity < 1) {
        new_quantity = 1;
        return;
    }else if (new_quantity > 10) {
        new_quantity = 10;
    }
    quantity_input.val(new_quantity);

    updateCartQuantity(product_id, new_quantity);
}

function updateCartQuantity(product_id, new_quantity) {
    $.ajax({
        url: './Cart/Index', // Đường dẫn đến script PHP xử lý yêu cầu
        type: 'POST',
        data: { product_id: product_id, quantity: new_quantity },
        success: function(response) {
            const parseJson = JSON.parse(response);
            $('#total_price_'+product_id).html(parseJson.newTotalPrice);
            $('#sub-total').html(parseJson.totalPrice);
        },
    });
}

function updateOrderStatus(status, order_id) {
    $.ajax({
        url: './Admin/UpdateOrderStatus',
        method: 'POST',
        data: { 
            status: status, 
            order_id: order_id
        },
        success: function(response) {
            $('td[data-order-id='+order_id+']').text(response);
            Swal.fire({
                title: 'Thành công!',
                text: 'Cập nhật thành công!',
                icon: 'success',
                showConfirmButton: false,
                timer: 1000
            });
        }
    })
}

function updateOrderStatus2(status, order_id) {
    $.ajax({
        url: './Admin/UpdateOrderStatus2',
        method: 'POST',
        data: { 
            status: status, 
            order_id: order_id
        },
        success: function(response) {
            console.log(response);
            $('#buttons'+order_id).html(response);
            $('td[data-order-id='+order_id+']').text(status);
            Swal.fire({
                title: 'Thành công!',
                text: 'Cập nhật thành công!',
                icon: 'success',
                showConfirmButton: false,
                timer: 1000
            });
        }
    })
}