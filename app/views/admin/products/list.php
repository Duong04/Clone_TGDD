<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh sách sản phẩm</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="./Admin/AddProduct" class="m-0 font-weight-bold btn yellow text-white">Thêm mới</a>
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
                            <th>Danh mục</th>
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
                            <th>Danh mục</th>
                            <th>Danh mục con</th>
                            <th>Người thêm</th>
                            <th>Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php 
                            $stt = 0; 
                            foreach ($datas['rows'] as $row) { 
                                $stt++; 
                                $priceF = number_format($row['new_price'], 0, ',', '.');
                                $initial_priceF = number_format($row['initial_price'], 0, ',', '.');
                        ?>
                        <tr data-id="<?=$row['product_id']?>">
                            <th style="width:35px;"><?=$stt?></th>
                            <td><?=$row['product_name']?></td>
                            <td><img style="width: 80px;" src="<?=$row['product_image']?>" alt=""></td>
                            <td><?=$initial_priceF?><sup>₫</sup></td>
                            <td><?=$row['discount']?>%</td>
                            <td><?=$priceF?><sup>₫</sup></td>
                            <td><?=$row['product_quantity']?></td>
                            <td><?=$row['view']?></td>
                            <td style="width:100px;"><?=$row['category_name']?></td>
                            <td><?=$row['subcat_name']?></td>
                            <td><?=$row['user_name']?></td>
                            <td style="width: 120px;">
                                <a href="./Admin/UpdateProduct/<?=$row['product_id']?>" class="btn btn-success">Sửa</a>
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