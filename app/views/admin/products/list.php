<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh sách sản phẩm</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="./Admin/AddProduct" class="m-0 font-weight-bold btn btn-success">Thêm mới</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Stt</th>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh</th>
                            <th>Giá gốc</th>
                            <th>Giảm giá</th>
                            <th>Giá mới</th>
                            <th>Số lượng</th>
                            <th>Lượt xem</th>
                            <th>Tên danh mục</th>
                            <th>Danh mục con</th>
                            <th>Người thêm</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Stt</th>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh</th>
                            <th>Giá gốc</th>
                            <th>Giảm giá</th>
                            <th>Giá mới</th>
                            <th>Số lượng</th>
                            <th>Lượt xem</th>
                            <th>Tên danh mục</th>
                            <th>Danh mục con</th>
                            <th>Người thêm</th>
                            <th>Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 0; foreach ($datas['rows'] as $row) { $i+=1 ?>
                        <tr data-id="<?=$row['product_id']?>">
                            <th style="width:35px;"><?=$i?></th>
                            <td><?=$row['product_name']?></td>
                            <td><img style="width: 80px; height: 80px;" src="<?=$row['product_image']?>" alt=""></td>
                            <td><?=$row['initial_price']?></td>
                            <td><?=$row['discount']?></td>
                            <td><?=$row['new_price']?></td>
                            <td><?=$row['product_quantity']?></td>
                            <td><?=$row['view']?></td>
                            <td><?=$row['category_name']?></td>
                            <td><?=$row['subcat_name']?></td>
                            <td><?=$row['user_name']?></td>
                            <td style="width: 120px;">
                                <a href="./Admin/UpdateProduct/<?=$row['product_id']?>" class="btn btn-warning">Sửa</a>
                                <a href="./Admin/DeleteProduct" id="delete" class="btn btn-danger" onclick="deleteC(event,<?=$row['product_id']?>)">Xóa</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>