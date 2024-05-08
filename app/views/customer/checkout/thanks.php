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
    <link rel="stylesheet" href="./public/responsive/header.css">
    <link rel="stylesheet" href="./public/responsive/footer.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #333;
        }

        .container p {
            color: #666;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        @media (max-width: 30.625em) {
            .container {
                box-shadow: none;
                background-color: transparent;
            }
        }
    </style>
</head>

<body>
    <main class="main">
        <?php include "./app/views/customer/includes/header.php" ?>
        <!-- article -->
        <div class="container">
            <h1>Cảm ơn bạn đã mua hàng!</h1>
            <p>Xin chân thành cảm ơn bạn đã đặt hàng của chúng tôi. Đơn hàng của bạn đã được xác nhận và đang được xử
                lý.
                Đơn hàng sẽ được gửi đến bạn trong thời gian sớm nhất.</p>
            <p>Hãy giữ liên lạc và kiểm tra đơn hàng trong phần thông tin đơn để cập nhật tình trạng đơn hàng của bạn.</p>
            <a href="./InfoUsers/Orders" class="btn">Xem đơn hàng</a>
        </div>
        <?php include "./app/views/customer/includes/footer.php" ?>
    </main>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="./public/js/ajax.js"></script>
    <script src="./public/js/header.js"></script>
</body>

</html>