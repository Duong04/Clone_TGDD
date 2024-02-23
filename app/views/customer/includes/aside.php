<aside>
    <div class="name-image">
        <img src="<?=$row['user_image']?>" alt="">
        <h5><?=$row['user_name']?></h5>
    </div>
    <div class="nav-aside">
        <ul>
            <li><a href="./InfoUsers/Profile"><i class="fa-regular fa-user"></i> Thông tin tài khoản</a></li>
            <li><a href="./InfoUsers/Orders"><i class="fa-solid fa-truck-fast"></i> Thông tin đơn hàng</a></li>
            <?php if ($_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'Nhân viên') { ?>
            <li><a href="./Admin"><i class="fa-solid fa-screwdriver-wrench"></i> Vào phần quản trị</a></li>
            <?php } ?>
            <li><a href="./InfoUsers/Logout"><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a></li>
        </ul>
    </div>
</aside>