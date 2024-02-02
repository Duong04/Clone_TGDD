<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh mục sản phẩm</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="./Admin/AddCategory" class="m-0 font-weight-bold btn btn-success">Thêm mới</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tên danh mục</th>
                            <th>Người thêm</th>
                            <th>Thao tác</th>
                            <th>Danh mục con</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Tên danh mục</th>
                            <th>Người thêm</th>
                            <th>Thao tác</th>
                            <th>Danh mục con</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            $stt = 0;
                            foreach($datas['rows'] as $row) {
                                $stt++;
                        ?>
                        <tr data-id="<?=$row['category_id']?>">
                            <td><?=$stt?></td>
                            <td><?=$row['category_name']?></td>
                            <td><?=$row['user_name']?></td>
                            <td>
                                <a class="btn btn-warning" href="./Admin/UpdateCategory/<?=$row['category_id']?>">Sửa</a>
                                <a href="./Admin/DeleteCategories" class="btn btn-danger" id="delete" onclick="deleteC(event,<?=$row['category_id']?>)">Xóa</a>
                            </td>
                            <td><a href="./admin/Subcategories/<?=$row['category_id']?>">Chi tiết</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>