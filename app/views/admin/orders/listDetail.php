<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Chi tiết đơn hàng</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="./Admin/ListOrders" class="m-0 font-weight-bold btn yellow text-white">Quay về</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Stt</th>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Stt</th>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php 
                            $stt = 0;
                            foreach ($datas['listOrderDetails'] as $row) {   
                                $stt++;
                        ?>
                            <tr>
                                <th><?=$stt?></th>
                                <td><?=$row['product_name']?></td>
                                <td><img style="width: 100px;" src="<?=$row['product_image']?>" alt=""></td>
                                <td><?=number_format($row['unit_price'], 0, ',', '.')?><sup>đ</sup></td>
                                <td><?=$row['quantity']?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>