<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh mục sản phẩm</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="./Admin/AddCategory" class="m-0 font-weight-bold btn yellow text-white">Thêm mới</a>
        </div>
        <h1><?=$root_url?></h1>
        <h1><?=$okok?></h1>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tên người dùng</th>
                            <th>Ảnh</th>
                            <th>Email</th>
                            <th>Ngày tạo</th>
                            <th>Địa chỉ</th>
                            <th>Vai trò</th>
                            <th>Trạng thái</th>
                            <?php 
                            if ($_SESSION['role'] == 'Admin') {
                            ?>
                            <th>Phân quyền</th>
                            <?php } ?>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Tên người dùng</th>
                            <th>Ảnh</th>
                            <th>Email</th>
                            <th>Ngày tạo</th>
                            <th>Địa chỉ</th>
                            <th>Vai trò</th>
                            <th>Trạng thái</th>
                            <?php 
                            if ($_SESSION['role'] == 'Admin') {
                            ?>
                            <th>Phân quyền</th>
                            <?php } ?>
                            <th>Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php 
                            $stt = 0;
                            foreach ($datas['rows'] as $row) {
                                $stt++;
                        ?>
                        <tr>
                            <th style="width: 40px;"><?=$stt?></th>
                            <td><?=$row['user_name']?></td>
                            <td><img class="object-fit-cover rounded-circle border" style="width: 60px; height: 60px;" src="<?=$row['user_image']?>" alt=""></td>
                            <td><?=$row['email']?></td>
                            <td><?=$row['create_date']?></td>
                            <td><?=$row['address']?></td>
                            <td data-user-id="<?=$row['user_id']?>" data-column="role"><?=$row['role']?></td>
                            <td data-user-id="<?=$row['user_id']?>" data-column="status"><?=$row['status']?></td>
                            <td>
                            <?php 
                            if ($_SESSION['role'] == 'Admin' && $row['role'] !== 'Admin') {
                            ?>
                                <button onclick="updateRole('Khách hảng', <?=$row['user_id']?>)" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Khách hàng"><i class="fa-solid fa-user"></i></button>
                                <button onclick="updateRole('Nhân viên', <?=$row['user_id']?>)" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Nhân viên"><i class="fa-solid fa-user-tie"></i></button>
                            <?php } ?>
                            </td>
                            <td>
                            <?php if ($row['role'] != 'Admin') { ?>
                                <button onclick="updateStatus('Vô hiệu hóa', <?=$row['user_id']?>)" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Vô hiệu hóa"><i class="fa-solid fa-lock"></i></button>
                                <button onclick="updateStatus('Đã kích hoạt', <?=$row['user_id']?>)" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Kích hoạt"><i class="fa-solid fa-lock-open"></i></button>
                            <?php } ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>