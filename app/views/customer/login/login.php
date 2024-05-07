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
    <link rel="stylesheet" href="./public/css/reset.css">
    <link rel="stylesheet" href="./public/css/animation.css">
    <link rel="stylesheet" href="./public/css/jquery.css">
    <link rel="stylesheet" href="./public/css/header.css">
    <link rel="stylesheet" href="./public/css/footer.css">
    <link rel="stylesheet" href="./public/css/register.css">
    <link rel="stylesheet" href="./public/responsive/header.css">
    <link rel="stylesheet" href="./public/responsive/footer.css">
</head>
<body>
<main class="main">
        <?php include "./app/views/customer/includes/header.php" ?>
        <!-- article -->
        <article>
            <div class="content-left">
                <img src="./public/img/bgr/TGDD-540x270.png" alt="">
            </div>
            <div class="content-right">
                <div class="main-form">
                    <h3>Đăng nhập</h3>
                    <form action="" id="registration-form" method="POST">
                        <div class="form-item">
                            <input type="text" placeholder="Email của bạn" name="email" id="email">
                            <div class="error" id="email-error"><?=isset($datas['errorEmail']) ? $datas['errorEmail'] : ''?></div>
                        </div>
                        <div class="form-item">
                            <div class="inp">
                                <input type="password" placeholder="Mật khẩu" name="psw" id="psw">
                                <i class="fa-solid fa-eye-slash eye"></i>
                            </div>
                            <div class="error" id="psw-error"><?=isset($datas['errorPsw']) ? $datas['errorPsw'] : ''?></div>
                        </div>
                        <div class="forget-psw"><a href="./UserAuthentication/ForgetPassword">Bạn quên mật khẩu?</a></div>
                        <div class="form-item">
                            <button name="submit">Đăng Nhập</button>
                        </div>
                        <div class="or">
                            <span></span>
                            <span>Hoặc</span>
                            <span></span>
                        </div>
                        <div class="fb-gg">
                            <div class="fb-gg-item">
                                <img src="./public/img/icon/fb-gg/Facebook_Logo_(2019).png.webp" alt="">
                                <span>Facebook</span>
                            </div>
                            <div class="fb-gg-item">
                                <img src="./public/img/icon/fb-gg/gg.png" alt="">
                                <span>Google</span>
                            </div>
                        </div>
                        <div class="link-login">Bạn chưa có tài khoản? <a href="./UserAuthentication/Register">Đăng ký</a></div>
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
    <script src="./public/js/header.js"></script>
    <script src="./public/js/login.js"></script>
</body>
</html>