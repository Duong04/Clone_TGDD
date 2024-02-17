<header>
    <div class="top-bar"><img src="./public/img/top-bar/ip15-1200-44-1200x44-1.webp" alt=""></div>
    <nav>
        <img class="nav-img-left" src="./public/img/logo/header-trai-tgdd-248x78-1.png" alt="">
        <div class="nav-item">
            <div class="nav-top">
                <div class="logo">
                    <a href="./"><img src="./public/img/logo/logo.png" alt=""></a>
                </div>
                <div class="nav-address">
                    <a href="">
                        <p>
                            <span>Xem giá tồn kho tại</span>
                            <strong>Đà Nẵng</strong>
                        </p>
                        <i class="fa-solid fa-caret-down"></i>
                    </a>
                </div>
                <div class="form-search">
                    <form action="">
                        <input type="text" placeholder="Bạn muốn tìm gì...">
                        <button><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
                <div class="account">
                    <a href="<?=isset($_SESSION['user_id']) ? './InfoUsers/Profile' : './UserAuthentication/Login' ?>">Tài khoản & đơn hàng</a>
                </div>
                <div class="cart">
                    <a href="">
                        <div class="icon-cart"><i class="fa-solid fa-cart-plus"></i><span>1</span></div>
                        <strong>Giỏ hàng</strong>
                    </a>
                </div>
                <div class="nav-list-top">
                    <a href="">24h Công Nghệ</a>
                    <div class="hr"></div>
                    <a href="">Hỏi Đáp</a>
                    <div class="hr"></div>
                    <a href="">Game App</a>
                </div>
            </div>
        </div>
        <menu>
            <ul>
                <?php 
                    foreach ($datas['listCategories'] as $row) {
                ?>
                    <li><a href="./Products/Categories/<?=$row['category_id']?>"><?=$row['category_name']?></a></li>
                <?php } ?>
            </ul>
        </menu>
        <img class="nav-img-right" src="./public/img/logo/header-phai-tgdd-248x78.png" alt="">
    </nav>
</header>