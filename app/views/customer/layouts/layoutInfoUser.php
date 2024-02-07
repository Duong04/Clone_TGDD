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
            <?php require_once "./app/views/customer/infoUsers/".$datas['page'].".php" ?>
        </div>
        <!-- footer -->
        <?php include "./app/views/customer/includes/footer.php" ?>
    </main>
    <script src="./public/js/profile.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.2/dist/sweetalert2.all.min.js"></script>
</body>
</html>