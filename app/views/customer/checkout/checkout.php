<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.2/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.2/dist/sweetalert2.min.css" rel="stylesheet">
    <base href="http://localhost/php/php_oop/mvc/" />
    <link rel="stylesheet" href="./public/css/reset.css">
    <link rel="stylesheet" href="./public/css/header.css">
    <link rel="stylesheet" href="./public/css/footer.css">
    <link rel="stylesheet" href="./public/css/checkout.css">
</head>
<body>
    <main class="main">
        <?php include "./app/views/customer/includes/header.php" ?>
        <!-- article -->
        <article>
        <div class="content-main">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ảnh</th>
                            <th style="text-align: start;">Tên sản phẩm</th>
                            <th>Đơn giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $subTotal = 0;
                            foreach ($datas['cart'] as $row) {
                                $totalPrice = $row['new_price'] * $row['quantity'];
                                $totalPriceF = number_format($totalPrice, 0, ',', '.');
                                $newPriceF = number_format($row['new_price'], 0, ',', '.');
                                $subTotal += $totalPrice;
                        ?>
                        <tr data-id="<?=$row['product_id']?>">
                            <td>
                                <img src="<?=$row['product_image']?>" alt="">
                                <div class="quantity"><?=$row['quantity']?></div>
                                <button onclick="removeCart(<?=$row['product_id']?>)"><i class="fa-solid fa-circle-xmark"></i> xóa</button>
                            </td>
                            <td>
                                <h4><?=$row['product_name']?></h4>
                                <p><?=$newPriceF?><sup>₫</sup></p>
                            </td>
                            <td>
                                <p id="total_price_<?=$row['product_id']?>"><?=$totalPriceF?><sup>₫</sup></p>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="sub-total">
                    <span>Tạm tính (<?=count($datas['cart'])?> sản phẩm)</span>
                    <span id="sub-total"><?=number_format($subTotal, 0, ',', '.')?><sup>₫</sup></span>
                </div>
                <hr>
                <div class="form-main">
                    <h4>Thông tin khách hàng</h4>
                    <form method="POST" action="" id="registration-form">
                        <div class="form-item">
                            <label for="user_name">Tên người dùng</label>
                            <input value="<?=$datas['infoUser']['user_name']?>" name="user_name" id="user_name" type="text" placeholder="Tên người dùng">
                            <span id="user-name-error" class="error"></span>
                        </div>
                        <div class="form-item">
                            <label for="phone">Số điện thoại</label>
                            <input value="<?=$datas['infoUser']['phone']?>" name="phone" id="phone" type="number" placeholder="Số điện thoại">
                            <span id="phone-error" class="error"></span>
                        </div>
                        <div class="form-item w-100px">
                            <label for="address">Địa chỉ</label>
                            <input value="<?=$datas['infoUser']['address']?>" name="address" id="address" type="text" placeholder="Địa chỉ">
                            <span id="address-error" class="error"></span>
                        </div>
                        <div class="total-price">
                            <div>
                                <span>Tạm tính</span>
                                <span id="sub-total-2"><?=number_format($subTotal, 0, ',', '.')?><sup>₫</sup></span>
                            </div>
                            <?php 
                                $shippingFee = $subTotal > 10000000 ? 'Free ship' : '50.000<sup>₫</sup>';
                                $shippingFeeInt = $subTotal > 10000000 ? 0 : 50000;
                                $total = $subTotal + $shippingFeeInt;
                            ?>
                            <div>
                                <span>Tiền ship</span>
                                <span><?=$shippingFee?></span>
                            </div>
                            <div>
                                <strong>Tổng tiền</strong>
                                <span style="color: red; font-weight: 600;">
                                    <?=number_format($total, 0, ',', '.')?><sup>₫</sup>
                                </span>
                            </div>
                        </div>
                        <button name="submit">Đặt hàng</button>
                    </form>
                </div>
            </div>
        </article>
        <!-- footer -->
        <?php include "./app/views/customer/includes/footer.php" ?>
    </main>
    <script
    src="https://code.jquery.com/jquery-3.7.1.js"
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
    <script src="./public/js/ajax.js"></script>
    <script src="./public/js/checkout.js"></script>
    <script src="./public/js/header.js"></script>
</body>
</html>