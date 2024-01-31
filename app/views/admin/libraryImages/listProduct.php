<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý thư viện ảnh theo sản phẩm</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Stt</th>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh</th>
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
                            <td><?=$row['category_name']?></td>
                            <td><?=$row['subcat_name']?></td>
                            <td><?=$row['user_name']?></td>
                            <td style="width: 120px;">
                                <a href="./Admin/LibraryImageDetail/<?=$row['product_id']?>" class="text-primary">Chi tiết</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>