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
    <link rel="stylesheet" href="./public/responsive/header.css">
    <link rel="stylesheet" href="./public/responsive/footer.css">
    <style>
        .main {
            background-color: var(--matte-white-color);
        }

        article {
            max-width: 90%;
            margin: 40px auto;
        }

        .nottify-text {
            line-height: 25px;
        }

        .nottify-img {
            max-width: 500px;
            margin: auto;
            text-align: center;
        }

        .nottify-img img {
            width: 100%;
        }

        @media (max-width: 47.4375em) {
            .nottify-text {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <main class="main">
        <?php include "./app/views/customer/includes/header.php" ?>
        <!-- article -->
        <article>
            <div class="nottify-text">
                <strong>Chào bạn !</strong>
                <p>Chúc mừng bạn đã đăng ký tài khoản với chúng tôi!</p>
                <p>Chúng tôi đã gửi một <strong>email kích hoạt tài khoản đến địa chỉ email</strong>  mà bạn đã đăng ký. Để hoàn tất quá trình đăng ký, <strong>vui lòng kiểm tra hộp thư đến của bạn và nhấp vào liên kết kích hoạt được gửi trong email</strong> . Nếu bạn không tìm thấy email trong hộp thư đến, vui lòng kiểm tra thư mục thư rác hoặc thư mục "Spam".</p>
                <p>Nếu bạn gặp bất kỳ khó khăn nào trong việc kích hoạt tài khoản hoặc cần sự hỗ trợ bổ sung, đừng ngần ngại liên hệ với chúng tôi qua trang web hoặc qua địa chỉ email hỗ trợ của chúng tôi tại <a href="mailto:duongnt3092004@gmail.com"><strong>duongnt3092004@gmail.com</strong></a>. Chúng tôi luôn sẵn sàng hỗ trợ bạn.</p>
                <p>Trân trọng !</p>
            </div>
            <div class="nottify-img">
                <img src="./public/img/icon/8d4f7f858274a4a0eb507b49aee66385-removebg-preview.png" alt="">
            </div>
        </article>
        <!-- footer -->
        <?php include "./app/views/customer/includes/footer.php" ?>
    </main>
</body>
</html>