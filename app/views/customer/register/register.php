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
                    <h3>Đăng ký</h3>
                    <form action="" id="registration-form" method="POST">
                        <div class="form-item">
                            <label for="userName">Tên của bạn (<span style="color:red;">*</span>)</label>
                            <input type="text" placeholder="Tên của bạn" name="userName" id="userName">
                            <div class="error" id="name-error"></div>
                        </div>
                        <div class="form-item">
                            <label for="email">Email của bạn (<span style="color:red;">*</span>)</label>
                            <input type="text" placeholder="Email của bạn" name="email" id="email">
                            <div class="error" id="email-error"><?=isset($datas['errorEmail']) ? $datas['errorEmail'] : ''?></div>
                        </div>
                        <div class="form-item">
                            <label for="psw">Mật khẩu (<span style="color:red;">*</span>)</label>
                            <div class="inp">
                                <input type="password" placeholder="Mật khẩu" name="psw" id="psw">
                                <i class="fa-solid fa-eye-slash eye"></i>
                            </div>
                            <div class="error" id="psw-error"></div>
                        </div>
                        <div class="form-item">
                            <label for="confirmPsw">Nhập lại mật khẩu (<span style="color:red;">*</span>)</label>
                            <div class="inp">
                                <input type="password" placeholder="Nhập lại mật khẩu" name="confirmPsw" id="confirmPsw">
                                <i onclick="confirm()" class="fa-solid fa-eye-slash eye-2"></i>
                            </div>
                            <div class="error" id="confirm-psw-error"></div>
                        </div>
                        <div class="form-item">
                            <button name="submit">Đăng ký</button>
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
                        <div class="link-login">Bạn đã có tài khoản? <a href="./UserAuthentication/Login">Đăng nhập</a></div>
                    </form>
                </div>
            </div>
        </article>
        <!-- footer -->
        <?php include "./app/views/customer/includes/footer.php" ?>
    </main>
    <script src="./public/js/register.js"></script>
</body>
</html>