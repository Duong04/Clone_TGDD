<header>
    <div class="top-bar"><img src="./public/img/top-bar/ip15-1200-44-1200x44-1.webp" alt=""></div>
    <nav>
        <img class="nav-img-left" src="./public/img/logo/header-trai-tgdd-248x78-1.png" alt="">
        <div class="nav-item">
            <div class="nav-top">
                <div class="nav-item-mobile">
                    <div class="logo-mobile">
                        <a href="./"><img src="./public/img/logo/logo.png" alt=""></a>
                    </div>
                    <div class="nav-address-mobile">
                        <a href="">
                            <i class="fa-solid fa-location-dot"></i>
                            Đà Nẵng
                        </a>
                    </div>
                    <div class="account-mobile">
                        <a href="<?=isset($_SESSION['user_id']) ? './InfoUsers/Profile' : './UserAuthentication/Login' ?>">Tài khoản & đơn hàng</a>
                    </div>
                    <div class="cart-mobile">
                        <a href="./Cart">
                            <?php $cartCount = isset($_COOKIE['cart']) ? count(json_decode($_COOKIE['cart'], true)) : 0 ?>
                            <div class="icon-cart"><i class="fa-solid fa-cart-plus"></i><span><?=$cartCount?></span></div>
                            <p>Giỏ hàng</p>
                        </a>
                    </div>
                    <div class="nav-bar"><i class="fa-solid fa-bars"></i></div>
                </div>
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
                    <form action="./Home/Search" method="POST">
                        <input id="search" type="text" placeholder="Bạn muốn tìm gì..." name="search" autocomplete="off">
                        <button name="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                    <div id="search-data" class="search-data">
                        
                    </div>
                </div>
                <div class="account">
                    <a href="<?=isset($_SESSION['user_id']) ? './InfoUsers/Profile' : './UserAuthentication/Login' ?>">Tài khoản & đơn hàng</a>
                </div>
                <div class="cart">
                    <a href="./Cart">
                        <?php $cartCount = isset($_COOKIE['cart']) ? count(json_decode($_COOKIE['cart'], true)) : 0 ?>
                        <div class="icon-cart"><i class="fa-solid fa-cart-plus"></i><span><?=$cartCount?></span></div>
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
                <div class="nav-list-top-drop-down">
                    <div class="drop-item">Mục khác <i class="fa-solid fa-caret-down"></i></div>
                    <div id="nav-list-top">
                        <a href="">24h Công Nghệ</a>
                        <a href="">Hỏi Đáp</a>
                        <a href="">Game App</a>
                    </div>
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
        <div class="menu-other">
            <ul>
                <li><a href="">24h Công Nghệ</a></li>
                <li><a href="">Hỏi Đáp</a></li>
                <li><a href="">Game App</a></li>
            </ul>
            <div class="close-mobile">
                <i class="fa-solid fa-xmark"></i>
            </div>
        </div>
        <img class="nav-img-right" src="./public/img/logo/header-phai-tgdd-248x78.png" alt="">
    </nav>
</header>