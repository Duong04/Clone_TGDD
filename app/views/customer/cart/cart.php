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
    <link rel="stylesheet" href="./public/css/cart.css">
    <link rel="stylesheet" href="./public/responsive/header.css">
    <link rel="stylesheet" href="./public/responsive/footer.css">
</head>
<body>
    <main class="main">
        <?php include "./app/views/customer/includes/header.php" ?>
        <!-- article -->
        <?php if (!empty($datas['cart'])) { ?>
            <h2>Giỏ hàng của bạn</h2>
        <?php } ?>
        <article>
            <?php 
            if (!empty($datas['cart'])) {
            ?>
            <div class="content-left">
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
                                <img loading="lazy" src="<?=$row['product_image']?>" alt="">
                                <button onclick="removeCart(<?=$row['product_id']?>)"><i class="fa-solid fa-circle-xmark"></i> xóa</button>
                            </td>
                            <td>
                                <h4><?=$row['product_name']?></h4>
                                <p><?=$newPriceF?><sup>₫</sup></p>
                            </td>
                            <td>
                                <p id="total_price_<?=$row['product_id']?>"><?=$totalPriceF?><sup>₫</sup></p>
                                <div class="quantity">
                                    <button class="minus-btn" onclick="updateQuantity(<?=$row['product_id']?>, -1)"><i class="fa-solid fa-minus"></i></button>
                                    <input type="text" id="quantity_<?=$row['product_id']?>" value="<?=$row['quantity']?>">
                                    <button class="plus-btn" onclick="updateQuantity(<?=$row['product_id']?>, 1)"><i class="fa-solid fa-plus"></i></button>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="content-right">
                <div class="sub-total">
                    <span>Tổng tiền</span>
                    <h4 id="sub-total"><?=number_format($subTotal, 0, ',', '.')?><sup>₫</sup></h4>
                </div>
                <?php if (isset($_SESSION['user_id'])) { ?>
                    <a href="./Checkout">Thanh toán</a>
                <?php } else { ?>
                    <a href="./UserAuthentication/Login">Thanh toán</a>
                <?php } ?>
            </div>
            <?php } else { ?>
                <div class="cart-empty">
                    <div class="icon-cart-2">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </div>
                    <p>Không có sản phẩm nào trong giỏ hàng</p>
                    <div class="return-home">
                        <a href="./">Quay về trang chủ</a>
                    </div>
                </div>
            <?php } ?>
        </article>
        <!-- footer -->
        <?php include "./app/views/customer/includes/footer.php" ?>
    </main>
    <script
    src="https://code.jquery.com/jquery-3.7.1.js"
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
    <script src="./public/js/ajax.js"></script>
    <script src="./public/js/header.js"></script>
</body>
</html>