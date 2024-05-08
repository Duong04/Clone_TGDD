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
    <link rel="stylesheet" href="./public/responsive/header.css">
    <link rel="stylesheet" href="./public/responsive/footer.css">
    <link rel="stylesheet" href="./public/responsive/infoUser.css">
    <style>
        main {
            background-color: var(--matte-white-color);
        }

        .container {
            max-width: var(--width-1200);
            margin: auto;
            display: flex;
            justify-content: space-between;
            padding: 60px 0 80px;
        }

        article {
            width: 78%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h3 {
            margin-bottom: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            border-bottom: 1px solid #ccc;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            padding: 13px 8px;
            background-color: #f2f2f2;
        }

        td {
            height: 130px;
        }

        .price {
            color: red;
        }

        .product-img {
            width: 100px;
            border-radius: 4px;
        }

        @media (max-width: 64em) and (min-width: 47.5625em) {
            article {
                width: 95%;
            }
        }

        @media (max-width: 47.4375em) {
            article {
                width: 95%;
            }

            tbody,
            thead {
                font-size: 0.9rem;
            }

            th {
                padding: 5px;
            }

            td {
                padding: 0;
            }
        }

        @media (max-width: 30.625em) {
            .product-img {
                width: 60px;
            }
        }

    </style>
</head>
<body>
    <main class="main">
        <?php include "./app/views/customer/includes/header.php" ?>
        <!-- article -->
        <div class="container">
            <?php $row = $datas['row'];?>
            <?php require_once './app/views/customer/includes/aside.php' ?>
            <article>
                <h3>Chi tiết đơn hàng</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Ảnh sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($datas['listOrderDetail'] as $row) {
                            $unit_priceF = number_format($row['unit_price'], 0, ',', '.');
                        ?>
                        <tr>
                            <td><img src="<?=$row['product_image']?>" alt="Product Image" class="product-img"></td>
                            <td><?=$row['product_name']?></td>
                            <td class="price"><?=$unit_priceF?><sup>₫</sup></td>
                            <td><?=$row['quantity']?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
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