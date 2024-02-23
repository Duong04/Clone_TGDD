<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.2/dist/sweetalert2.min.css" rel="stylesheet">
    <base href="http://localhost/php/php_oop/mvc/" />
    <link rel="stylesheet" href="./public/css/reset.css">
    <link rel="stylesheet" href="./public/css/animation.css">
    <link rel="stylesheet" href="./public/css/jquery.css">
    <link rel="stylesheet" href="./public/css/header.css">
    <link rel="stylesheet" href="./public/css/footer.css">
    <link rel="stylesheet" href="./public/css/aside.css">
    <link rel="stylesheet" href="./public/css/orders.css">
</head>
<body>
    <main class="main">
        <?php include "./app/views/customer/includes/header.php" ?>
        <!-- article -->
        <div class="container">
            <?php $row = $datas['row'];?>
            <?php require_once './app/views/customer/includes/aside.php' ?>
            <article>
                <h3>Kiểm tra đơn hàng</h3>
                <ul class="tabs">
                    <li class="tab active" onclick="changeTab(0)">Chờ xác nhận</li>
                    <li class="tab" onclick="changeTab(1)">Đã xác nhận</li>
                    <li class="tab" onclick="changeTab(2)">Chuẩn bị đơn hàng</li>
                    <li class="tab" onclick="changeTab(3)">Đang vận chuyển</li>
                    <li class="tab" onclick="changeTab(4)">Đã giao hàng</li>
                    <li class="tab" onclick="changeTab(5)">Đã hủy</li>
                </ul>

                <div id="tabContent0" class="tab-content active">
                    <?php 
                    if ($datas['confirmation'] != null) {
                        foreach ($datas['confirmation'] as $row) {
                            $price = number_format($row['total_amount'], 0, ',','.');
                            $shipping_fee = number_format($row['shipping_fee'], 0,',','.');
                            $total = $row['total_amount'] + $row['shipping_fee'];
                            $totalF = number_format($total, 0,',','.');
                    ?>
                    <div class="order">
                        <h3>Đơn hàng #DH000<?=$row['order_id']?></h3>
                        <p><strong>Trạng thái:</strong> <?=$row['order_status']?></p>
                        <p><strong>Ngày xuất hóa đơn:</strong> <?=$row['order_date']?></p>
                        <p><strong>Tạm tính:</strong> <?=$price?><sup>₫</sup></p>
                        <p><strong>Tiền ship:</strong> <?=$shipping_fee == 0 ? 'Freeship' : $shipping_fee.'<sup>₫</sup>'?></p>
                        <p><strong>Tổng tiền:</strong> <?=$totalF?><sup>₫</sup></p>
                        <p><strong>Trạng thái đơn hàng:</strong> Chờ xác nhận</p>
                        <div class="btn-event">
                            <a class="btn btn-outline-success" href="./InfoUsers/OrderDetail/<?=$row['order_id']?>">Xem chi tiết đơn hàng</a>
                            <a onclick="updatee(event)" class="btn btn-outline-danger" href="./InfoUsers/Orders/cancelled/<?=$row['order_id']?>">Hủy đơn hàng</a>
                        </div>
                    </div>
                    <?php } } else { ?>
                    <div class="no-order">
                        <img src="./public/img/icon/5fafbb923393b712b96488590b8f781f.png" alt="">
                        <p>Chưa có đơn hàng!</p>
                    </div>
                    <?php } ?>
                </div>

                <div id="tabContent1" class="tab-content">
                    <?php 
                    if ($datas['confirmed'] != null) {
                        foreach ($datas['confirmed'] as $row) {
                            $price = number_format($row['total_amount'], 0, ',','.');
                            $shipping_fee = number_format($row['shipping_fee'], 0,',','.');
                            $total = $row['total_amount'] + $row['shipping_fee'];
                            $totalF = number_format($total, 0,',','.');
                    ?>
                    <div class="order">
                        <h3>Đơn hàng #DH000<?=$row['order_id']?></h3>
                        <p><strong>Trạng thái:</strong> <?=$row['order_status']?></p>
                        <p><strong>Ngày xuất hóa đơn:</strong> <?=$row['order_date']?></p>
                        <p><strong>Tạm tính:</strong> <?=$price?><sup>₫</sup></p>
                        <p><strong>Tiền ship:</strong> <?=$shipping_fee == 0 ? 'Freeship' : $shipping_fee.'<sup>₫</sup>'?></p>
                        <p><strong>Tổng tiền:</strong> <?=$totalF?><sup>₫</sup></p>
                        <p><strong>Trạng thái đơn hàng:</strong> Chờ xác nhận</p>
                        <div class="btn-event">
                            <a class="btn btn-outline-success" href="./InfoUsers/OrderDetail/<?=$row['order_id']?>">Xem chi tiết đơn hàng</a>
                        </div>
                    </div>
                    <?php } } else { ?>
                    <div class="no-order">
                        <img src="./public/img/icon/5fafbb923393b712b96488590b8f781f.png" alt="">
                        <p>Chưa có đơn hàng!</p>
                    </div>
                    <?php } ?>
                </div>

                <div id="tabContent2" class="tab-content">
                    <?php 
                    if ($datas['preparingOrder'] != null) {
                        foreach ($datas['preparingOrder'] as $row) {
                            $price = number_format($row['total_amount'], 0, ',','.');
                            $shipping_fee = number_format($row['shipping_fee'], 0,',','.');
                            $total = $row['total_amount'] + $row['shipping_fee'];
                            $totalF = number_format($total, 0,',','.');
                    ?>
                    <div class="order">
                        <h3>Đơn hàng #DH000<?=$row['order_id']?></h3>
                        <p><strong>Trạng thái:</strong> <?=$row['order_status']?></p>
                        <p><strong>Ngày xuất hóa đơn:</strong> <?=$row['order_date']?></p>
                        <p><strong>Tạm tính:</strong> <?=$price?><sup>₫</sup></p>
                        <p><strong>Tiền ship:</strong> <?=$shipping_fee == 0 ? 'Freeship' : $shipping_fee.'<sup>₫</sup>'?></p>
                        <p><strong>Tổng tiền:</strong> <?=$totalF?><sup>₫</sup></p>
                        <p><strong>Trạng thái đơn hàng:</strong> Chờ xác nhận</p>
                        <div class="btn-event">
                            <a class="btn btn-outline-success" href="./InfoUsers/OrderDetail/<?=$row['order_id']?>">Xem chi tiết đơn hàng</a>
                        </div>
                    </div>
                    <?php } } else { ?>
                    <div class="no-order">
                        <img src="./public/img/icon/5fafbb923393b712b96488590b8f781f.png" alt="">
                        <p>Chưa có đơn hàng!</p>
                    </div>
                    <?php } ?>
                </div>

                <div id="tabContent3" class="tab-content">
                    <?php 
                    if ($datas['shipping'] != null) {
                        foreach ($datas['shipping'] as $row) {
                            $price = number_format($row['total_amount'], 0, ',','.');
                            $shipping_fee = number_format($row['shipping_fee'], 0,',','.');
                            $total = $row['total_amount'] + $row['shipping_fee'];
                            $totalF = number_format($total, 0,',','.');
                    ?>
                    <div class="order">
                        <h3>Đơn hàng #DH000<?=$row['order_id']?></h3>
                        <p><strong>Trạng thái:</strong> <?=$row['order_status']?></p>
                        <p><strong>Ngày xuất hóa đơn:</strong> <?=$row['order_date']?></p>
                        <p><strong>Tạm tính:</strong> <?=$price?><sup>₫</sup></p>
                        <p><strong>Tiền ship:</strong> <?=$shipping_fee == 0 ? 'Freeship' : $shipping_fee.'<sup>₫</sup>'?></p>
                        <p><strong>Tổng tiền:</strong> <?=$totalF?><sup>₫</sup></p>
                        <p><strong>Trạng thái đơn hàng:</strong> Chờ xác nhận</p>
                        <div class="btn-event">
                            <a class="btn btn-outline-success" href="./InfoUsers/OrderDetail/<?=$row['order_id']?>">Xem chi tiết đơn hàng</a>
                        </div>
                    </div>
                    <?php } } else { ?>
                    <div class="no-order">
                        <img src="./public/img/icon/5fafbb923393b712b96488590b8f781f.png" alt="">
                        <p>Chưa có đơn hàng!</p>
                    </div>
                    <?php } ?>
                </div>

                <div id="tabContent4" class="tab-content">
                    <?php 
                    if ($datas['delivered'] != null) {
                        foreach ($datas['delivered'] as $row) {
                            $price = number_format($row['total_amount'], 0, ',','.');
                            $shipping_fee = number_format($row['shipping_fee'], 0,',','.');
                            $total = $row['total_amount'] + $row['shipping_fee'];
                            $totalF = number_format($total, 0,',','.');
                    ?>
                    <div class="order">
                        <h3>Đơn hàng #DH000<?=$row['order_id']?></h3>
                        <p><strong>Trạng thái:</strong> <?=$row['order_status']?></p>
                        <p><strong>Ngày xuất hóa đơn:</strong> <?=$row['order_date']?></p>
                        <p><strong>Tạm tính:</strong> <?=$price?><sup>₫</sup></p>
                        <p><strong>Tiền ship:</strong> <?=$shipping_fee == 0 ? 'Freeship' : $shipping_fee.'<sup>₫</sup>'?></p>
                        <p><strong>Tổng tiền:</strong> <?=$totalF?><sup>₫</sup></p>
                        <p><strong>Trạng thái đơn hàng:</strong> Chờ xác nhận</p>
                        <div class="btn-event">
                            <a class="btn btn-outline-success" href="./InfoUsers/OrderDetail/<?=$row['order_id']?>">Xem chi tiết đơn hàng</a>
                        </div>
                    </div>
                    <?php } } else { ?>
                    <div class="no-order">
                        <img src="./public/img/icon/5fafbb923393b712b96488590b8f781f.png" alt="">
                        <p>Chưa có đơn hàng!</p>
                    </div>
                    <?php } ?>
                </div>

                <div id="tabContent5" class="tab-content">
                    <?php 
                    if ($datas['cancelled'] != null) {
                        foreach ($datas['cancelled'] as $row) {
                            $price = number_format($row['total_amount'], 0, ',','.');
                            $shipping_fee = number_format($row['shipping_fee'], 0,',','.');
                            $total = $row['total_amount'] + $row['shipping_fee'];
                            $totalF = number_format($total, 0,',','.');
                    ?>
                    <div class="order">
                        <h3>Đơn hàng #DH000<?=$row['order_id']?></h3>
                        <p><strong>Trạng thái:</strong> <?=$row['order_status']?></p>
                        <p><strong>Ngày xuất hóa đơn:</strong> <?=$row['order_date']?></p>
                        <p><strong>Tạm tính:</strong> <?=$price?><sup>₫</sup></p>
                        <p><strong>Tiền ship:</strong> <?=$shipping_fee == 0 ? 'Freeship' : $shipping_fee.'<sup>₫</sup>'?></p>
                        <p><strong>Tổng tiền:</strong> <?=$totalF?><sup>₫</sup></p>
                        <p><strong>Trạng thái đơn hàng:</strong> Chờ xác nhận</p>
                        <div class="btn-event">
                            <a class="btn btn-outline-success" href="./InfoUsers/OrderDetail/<?=$row['order_id']?>">Xem chi tiết đơn hàng</a>
                            <a onclick="update_2(event)" class="btn btn-outline-danger" href="./InfoUsers/Orders/repurchase/<?=$row['order_id']?>">Mua lại</a>
                            <a onclick="deletee(event)" class="btn btn-outline-warning" href="./InfoUsers/Orders/deleteHistory/<?=$row['order_id']?>">Xóa lịch sử</a>
                        </div>
                    </div>
                    <?php } } else { ?>
                    <div class="no-order">
                        <img src="./public/img/icon/5fafbb923393b712b96488590b8f781f.png" alt="">
                        <p>Chưa có đơn hàng!</p>
                    </div>
                    <?php } ?>
                </div>
            </article>
        </div>
        <!-- footer -->
        <?php include "./app/views/customer/includes/footer.php" ?>
    </main>
    <script src="./public/js/orders.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.2/dist/sweetalert2.all.min.js"></script>
    <script
    src="https://code.jquery.com/jquery-3.7.1.js"
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
    <script src="./public/js/header.js"></script>
</body>
</html>