<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý thư viện ảnh theo sản phẩm</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="./Admin/AddImage/<?=$datas['product_id']?>" class="m-0 font-weight-bold btn yellow text-white">Thêm mới</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Stt</th>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh chính</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Stt</th>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh chính</th>
                            <th>Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 0; foreach ($datas['rows'] as $row) { $i+=1 ?>
                        <tr data-id="<?=$row['image_id']?>">
                            <th style="width:35px;"><?=$i?></th>
                            <td><?=$row['product_name']?></td>
                            <td><img style="width: 80px; height: 80px;" src="<?=$row['image']?>" alt=""></td>
                            <td style="width: 120px;">
                                <a href="./Admin/UpdateImage/<?=$row['image_id']?>/<?=$row['product_id']?>" class="btn btn-success">Sửa</a>
                                <a href="./Admin/DeleteImage" id="delete" class="btn btn-danger" onclick="deleteC(event,<?=$row['image_id']?>)">Xóa</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>