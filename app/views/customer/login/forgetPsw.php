<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <base href="http://localhost/php/php_oop/mvc/" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.2/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.2/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./public/css/reset.css">
    <link rel="stylesheet" href="./public/css/animation.css">
    <link rel="stylesheet" href="./public/css/jquery.css">
    <link rel="stylesheet" href="./public/css/header.css">
    <link rel="stylesheet" href="./public/css/footer.css">
    <style>
        .main {
            background-color: var(--matte-white-color);
        }

        article {
            padding: 80px 0;
        }

        .main-form {
            max-width: 400px;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
            height: 400px;
        }

        .main-form img {
            width: 300px;
            position: absolute;
            left: 50%;
            transform: translate(-50%);
            top: -80px;
        }

        .form {
            position: relative;
            width: 100%;
            box-shadow: 0 0 10px var(--grey-color);
            border-radius: 10px;
            padding: 30px 0 50px;
            margin-top: 150px;
        }

        .form a {
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 1.1rem;
            color: var(--orange-color);
        }

        .form h3 {
            text-align: center;
            margin-bottom: 10px;
        }

        .form form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .form button,
        .form input {
            width: 90%;
            margin: auto;
            height: 40px;
            border: none;
            border-radius: 5px;
        }
        
        .form input {
            border: 1px solid var(--grey-color);
            padding-left: 10px;
        }

        .form input:focus {
            outline: none;
            border: 1px solid var(--orange-color);
        }

        .form button {
            background-color: var(--orange-color);
            color: var(--white-color);
            font-weight: 600;
            font-size: 1.0rem;
            cursor: pointer;
        }

        .form button:hover {
            opacity: 0.8;
        }

        .error {
            width: 90%;
            margin: -7px auto 0;
            font-size: 0.9rem;
            color: red;
        }
    </style>
</head>
<body>
<main class="main">
        <?php include "./app/views/customer/includes/header.php" ?>
        <!-- article -->
        <article>
            <div class="main-form">
                <img src="./public/img/logo/logoForge.png" alt="">
                <div class="form">
                    <a href="./UserAuthentication"><i class="fa-solid fa-arrow-right fa-rotate-180"></i></a>
                    <h3>Khôi phục mật khẩu</h3>
                    <form action="" method="POST">
                        <input required name="email" type="email" placeholder="Nhập email của bạn">
                        <button name="submit">Gửi</button>
                    </form>
                </div>
            </div>
        </article>
        <!-- footer -->
        <?php include "./app/views/customer/includes/footer.php" ?>
    </main>
</body>
</html>