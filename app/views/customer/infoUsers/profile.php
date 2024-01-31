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
                    <input placeholder="Email của bạn" type="email" name="email" id="email" required
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