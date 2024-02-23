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
    <link rel="stylesheet" href="./public/css/infoUsers.css">
</head>
<body>
    <main class="main">
        <?php include "./app/views/customer/includes/header.php" ?>
        <!-- article -->
        <div class="container">
            <?php $row = $datas['row'];?>
            <?php require_once './app/views/customer/includes/aside.php' ?>
            <article>
                <h3>Hồ sơ của tôi</h3>
                <div class="main-form">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-left">
                            <div class="inp-item">
                                <label for="userName">Tên tài khoản</label>
                                <input placeholder="Tên của bạn" type="text" name="userName" id="userName" required
                                    value="<?= $row['user_name'] != null ? $row['user_name'] : '' ?>">
                            </div>
                            <div class="inp-item">
                                <label for="email">Email của bạn</label>
                                <input disabled placeholder="Email của bạn" type="email" name="email" id="email" required
                                    value="<?= $row['email'] != null ? $row['email'] : '' ?>">
                            </div>
                            <div class="inp-item">
                                <label for="phone">Số điện thoại</label>
                                <input placeholder="Số điện thoại của bạn" type="number" name="phone" id="phone" required
                                    value="<?= $row['phone'] != null ? $row['phone'] : '' ?>">
                            </div>
                            <div class="inp-item">
                                <label for="address">Địa chỉ</label>
                                <input placeholder="Địa chỉ của bạn" type="text" name="address" id="address" required
                                    value="<?= $row['address'] != null ? $row['address'] : '' ?>">
                            </div>
                            <div class="btn-submit">
                                <button name="submit">Lưu</button>
                            </div>
                        </div>
                        <div class="form-right">
                            <div class="inp-image">
                                <img src="<?= $row['user_image'] ?>" alt="" id="preview">
                                <label for="user-image"><i class="fa-solid fa-camera"></i></label>
                                <input type="file" name="user-image" id="user-image" hidden>
                            </div>
                            <p><strong>Định dạng:</strong> .JPEG, .PNG, .WEBP, .JPG</p>
                        </div>
                    </form>
                </div>
            </article>
        </div>
        <!-- footer -->
        <?php include "./app/views/customer/includes/footer.php" ?>
    </main>
    <script src="./public/js/profile.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.2/dist/sweetalert2.all.min.js"></script>
    <script
    src="https://code.jquery.com/jquery-3.7.1.js"
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
    <script src="./public/js/header.js"></script>
</body>
</html>