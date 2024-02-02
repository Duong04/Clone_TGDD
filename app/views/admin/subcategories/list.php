<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh mục con sản phẩm</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="./Admin/AddSubcat/<?=$datas['category_id']?>" class="m-0 font-weight-bold btn btn-success">Thêm mới</a>
            <a href="./Admin/ListCategories" class="m-0 font-weight-bold btn btn-outline-success"><i class="fa-solid fa-rotate-left"></i> Quay về</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Danh mục con</th>
                            <th>Ảnh</th>
                            <th>Danh mục chính</th>
                            <th>Người thêm</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Danh mục con</th>
                            <th>Ảnh</th>
                            <th>Danh mục chính</th>
                            <th>Người thêm</th>
                            <th>Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            $stt = 0;
                            foreach($datas['rows'] as $row) {
                                $stt++;
                        ?>
                        <tr data-id="<?=$row['subcat_id']?>">
                            <td><?=$stt?></td>
                            <td><?=$row['subcat_name']?></td>
                            <td><img style="width: 90px;" src="<?=$row['subcat_image']?>" alt=""></td>
                            <td><?=$row['category_name']?></td>
                            <td><?=$row['user_name']?></td>
                            <td>
                                <a class="btn btn-warning" href="./Admin/UpdateSubcat/<?=$row['category_id']?>/<?=$row['subcat_id']?>">Sửa</a>
                                <a href="./Admin/DeleteSubcat" class="btn btn-danger" id="delete" onclick="deleteC(event, <?=$row['subcat_id']?>)">Xóa</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>