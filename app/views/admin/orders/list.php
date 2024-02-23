<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý đơn hàng</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Người nhận</th>
                            <th>Ngày xuất hóa đơn</th>
                            <th>Tạm tính</th>
                            <th>Tiền ship</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Người nhận</th>
                            <th>Ngày xuất hóa đơn</th>
                            <th>Tạm tính</th>
                            <th>Tiền ship</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                            <th>#</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php 
                            foreach ($datas['listOrders'] as $row) {   
                                $total = $row['total_amount'] + $row['shipping_fee'];
                                $shipping_fee = number_format($row['shipping_fee'], 0, ',', '.');
                        ?>
                            <tr>
                                <th>DH<?=$row['order_id']?></th>
                                <td><?=$row['user_name']?></td>
                                <td><?=$row['order_date']?></td>
                                <td><?=number_format($row['total_amount'], 0, ',', '.')?><sup>đ</sup></td>
                                <td><?=$shipping_fee == 0 ? 'Free ship' : $shipping_fee.'<sup>đ</sup>'?></td>
                                <td><?=number_format($total, 0, ',', '.')?></td>
                                <td data-order-id="<?=$row['order_id']?>"><?=$row['order_status']?></td>
                                <td id="buttons<?=$row['order_id']?>">
                                    <?php if ($row['order_status'] == 'Đã hủy' || $row['order_status'] == 'Đã giao hàng') { ?>
                                        <button disabled data-bs-toggle="tooltip" data-bs-placement="top" title="Xác nhận đơn hàng" class="btn btn-primary"><i class="fa-solid fa-user-check"></i></button>
                                        <button disabled data-bs-toggle="tooltip" data-bs-placement="top" title="Chuẩn bị đơn hàng" class="btn btn-warning"><i class="fa-solid fa-user-clock"></i></button>
                                        <button disabled data-bs-toggle="tooltip" data-bs-placement="top" title="Đang vận chuyển" class="btn btn-info"><i class="fa-solid fa-truck-fast"></i></button>
                                        <button disabled data-bs-toggle="tooltip" data-bs-placement="top" title="Đã giao hàng" class="btn btn-success"><i class="fa-solid fa-truck-front"></i></button>
                                        <button disabled data-bs-toggle="tooltip" data-bs-placement="top" title="Hủy đơn hàng" class="btn btn-danger"><i class="fa-solid fa-ban"></i></button>
                                    <?php } else { ?>
                                        <button onclick="updateOrderStatus('Đã xác nhận', <?=$row['order_id']?>)" data-bs-toggle="tooltip" data-bs-placement="top" title="Xác nhận đơn hàng" class="btn btn-primary"><i class="fa-solid fa-user-check"></i></button>
                                        <button onclick="updateOrderStatus('Chuẩn bị đơn hàng', <?=$row['order_id']?>)" data-bs-toggle="tooltip" data-bs-placement="top" title="Chuẩn bị đơn hàng" class="btn btn-warning"><i class="fa-solid fa-user-clock"></i></button>
                                        <button onclick="updateOrderStatus('Đang vận chuyển', <?=$row['order_id']?>)" data-bs-toggle="tooltip" data-bs-placement="top" title="Đang vận chuyển" class="btn btn-info"><i class="fa-solid fa-truck-fast"></i></button>
                                        <button onclick="updateOrderStatus2('Đã giao hàng', <?=$row['order_id']?>)" data-bs-toggle="tooltip" data-bs-placement="top" title="Đã giao hàng" class="btn btn-success"><i class="fa-solid fa-truck-front"></i></button>
                                        <button onclick="updateOrderStatus2('Đã hủy', <?=$row['order_id']?>)" data-bs-toggle="tooltip" data-bs-placement="top" title="Hủy đơn hàng" class="btn btn-danger"><i class="fa-solid fa-ban"></i></button>
                                    <?php } ?>
                                </td>
                                <td><a href="./Admin/ListOrderDetails/<?=$row['order_id']?>">Chi tiết</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>