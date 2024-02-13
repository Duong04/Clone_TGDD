<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
        rel="stylesheet"
        type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
      />
    <base href="http://localhost/php/php_oop/mvc/" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="
        https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js
        "></script>
    <link href="
        https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css
        " rel="stylesheet">
    <link rel="stylesheet" href="./public/css/reset.css">
    <link rel="stylesheet" href="./public/css/animation.css">
    <link rel="stylesheet" href="./public/css/jquery.css">
    <link rel="stylesheet" href="./public/css/header.css">
    <link rel="stylesheet" href="./public/css/footer.css">
    <link rel="stylesheet" href="./public/css/productDetail.css">
</head>
<body>
    <main class="main">
        <?php include "./app/views/customer/includes/header.php" ?>
        <!-- article -->
        <article>
            <div class="header-title">
                <ul class="breadcrumb">
                    <li><a href="">Điện thoại</a></li>
                    <span><i class="fa-solid fa-chevron-down fa-rotate-270"></i></span>
                    <li><a href="">Samsung</a></li>
                </ul>
                <h3>Điện thoại iPhone 15 Plus 128GB</h3>
            </div>
            <hr>
            <div class="content-far">
                <div class="content-left">
                    <div class="list-img">
                        <div id="main-carousel" class="splide" aria-label="The carousel with thumbnails. Selecting a thumbnail will change the Beautiful Gallery carousel.">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    <li class="splide__slide">
                                        <img src="./public/img/products/iphone-15-plus-1-4.jpg" alt="">
                                    </li>
                                    <li class="splide__slide">
                                        <img src="./public/img/products/iphone-15-plus-128gb-xanh-la-2.jpg" alt="">
                                    </li>
                                    <li class="splide__slide">
                                        <img src="./public/img/products/iphone-15-plus-1-4.jpg" alt="">
                                    </li>
                                    <li class="splide__slide">
                                        <img src="./public/img/products/iphone-15-plus-128gb-xanh-la-2.jpg" alt="">
                                    </li>
                                    <li class="splide__slide">
                                        <img src="./public/img/products/iphone-15-plus-1-4.jpg" alt="">
                                    </li>
                                    <li class="splide__slide">
                                        <img src="./public/img/products/iphone-15-plus-128gb-xanh-la-2.jpg" alt="">
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- --------------------- -->
                        <div id="thumbnail-carousel" class="splide" aria-label="The carousel with thumbnails. Selecting a thumbnail will change the Beautiful Gallery carousel.">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    <li class="splide__slide">
                                        <img src="./public/img/products/iphone-15-plus-1-4.jpg" alt="">
                                    </li>
                                    <li class="splide__slide">
                                        <img src="./public/img/products/iphone-15-plus-128gb-xanh-la-2.jpg" alt="">
                                    </li>
                                    <li class="splide__slide">
                                        <img src="./public/img/products/iphone-15-plus-1-4.jpg" alt="">
                                    </li>
                                    <li class="splide__slide">
                                        <img src="./public/img/products/iphone-15-plus-128gb-xanh-la-2.jpg" alt="">
                                    </li>
                                    <li class="splide__slide">
                                        <img src="./public/img/products/iphone-15-plus-1-4.jpg" alt="">
                                    </li>
                                    <li class="splide__slide">
                                        <img src="./public/img/products/iphone-15-plus-128gb-xanh-la-2.jpg" alt="">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="policy">
                        <div class="policy-item">
                            <i class="fa-solid fa-rotate"></i>
                            <p>Hư gì đổi nấy <strong>12 tháng</strong> tại 3169 siêu thị toàn quốc (miễn phí tháng đầu) <a href="">Xem chi tiết</a></p>
                        </div>
                        <div class="policy-item">
                            <i class="fa-solid fa-shield-halved"></i>
                            <p>Bảo hành chính <strong>hãng điện thoại 1 năm</strong> tại các trung tâm bảo hành hãng <a href="">Xem địa chỉ bảo hành</a></p>
                        </div>
                        <div class="policy-item">
                            <i class="fa-solid fa-box-open"></i>
                            <p>Bộ sản phẩm gồm: Hộp, Sách hướng dẫn, Cây lấy sim, Cáp Type C</p>
                        </div>
                    </div>
                    <div class="description">
                        <h3>Thông tin sản phẩm</h3>
                        <div class="description-content">
                            <img src="./public/img/banner/iphone-15-pro-131023-034959.jpg" alt="">
                        </div>
                        <div class="open-desc"><span>Xem thêm &nbsp;<i class="fa-solid fa-caret-down fa-rotate-270"></i></span></div>
                    </div>
                </div>
                <div class="content-right">
                    <div class="box-price">
                        <span>25.490.000<sup>₫</sup></span>
                        <del>25.490.000<sup>₫</sup></del>
                        <span>5%</span>
                    </div>
                    <div class="box-gift">
                        <i class="fa-solid fa-gift"></i>
                        <p><strong>+25.490</strong> điểm tích lũy Quà Tặng VIP</p>
                    </div>
                    <div class="box-promotion">
                        <div class="title-promotion">
                            <h5>Khuyến mãi</h5>
                            <p>Giá và khuyến mãi dự kiến áp dụng đến 23:00 | 31/01</p>
                        </div>
                        <div class="pr-content">
                            <div class="pr-content-item">
                                <span>1</span>
                                <p>Thu cũ Đổi mới: Giảm đến 2 triệu (Tuỳ model máy cũ, Không kèm thanh toán qua cổng online, mua kèm) <a href="">Xem chi tiết</a></p>
                            </div>
                            <div class="pr-content-item">
                                <span>2</span>
                                <p>Nhập mã MMTGDD123 giảm ngay 1% tối đa 100.000đ khi thanh toán qua MOMO <a href="">(Xem chi tiết tại đây)</a></p>
                            </div>
                            <div class="pr-content-item">
                                <span>3</span>
                                <p>Nhập mã VNPAYTGDD giảm từ 50,000đ đến 200,000đ (Áp dụng tùy giá trị đơn hàng) khi thanh toán qua VNPAY-QR <a href="">(Xem chi tiết tại đây)</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="block-button">
                        <form action="">
                            <button>Mua ngay</button>
                        </form>
                        <div class="btn-disabel">
                            <button>
                                <p>MUA TRẢ GÓP 0%</p>
                                <span>Duyệt hồ sơ trong 5 phút</span>
                            </button>
                            <button>
                                <p>TRẢ GÓP 0% QUA THẺ</p>
                                <span>Visa, Mastercard, JCB, Amex</span>
                            </button>
                        </div>
                    </div>
                    <div class="callorder">
                        Gọi đặt mua <a href="tel:1900 232 460">1900 232 460</a> (7:30 - 22:00)
                    </div>
                    <div class="promoadd">
                        <div class="title"><strong>ưu đãi thêm</strong> Dự kiến áp dụng đến 23:59 | 31/01</div>
                        <div class="promoadd-content">
                            <div class="promoadd-content-item">
                                <span><i class="fa-solid fa-check"></i></span>
                                <p>Apple Watch giảm thêm 3% khi mua kèm Iphone/iPad/Macbook</p>
                            </div>
                            <div class="promoadd-content-item">
                                <span><i class="fa-solid fa-check"></i></span>
                                <p>Mua 1 số iPad giảm đến 20% (Không kèm khuyến mãi khác của iPad) <a href="">Xem chi tiết tại đây</a></p>
                            </div>
                            <div class="promoadd-content-item">
                                <span><i class="fa-solid fa-check"></i></span>
                                <p>Mua Ốp lưng/Bao da/Ví da iPhone/Kính bảo vệ camera giảm đến 70% (Không áp dụng khuyến mãi khác)</p>
                            </div>
                            <div class="promoadd-content-item">
                                <span><i class="fa-solid fa-check"></i></span>
                                <p>Mua Miếng Dán/ Tai nghe Apple giảm đến 50% (Không áp dụng khuyến mãi khác)</p>
                            </div>
                            <div class="promoadd-content-item">
                                <span><i class="fa-solid fa-check"></i></span>
                                <p>Mua Adapter sạc/Cáp sạc Apple giảm đến 20% (Không áp dụng khuyến mãi khác)</p>
                            </div>
                            <div class="promoadd-content-item">
                                <span><i class="fa-solid fa-check"></i></span>
                                <p>Mua đồng hồ thời trang giảm 40% (không áp dụng khuyến mãi khác).</p>
                            </div>
                        </div>
                    </div>
                    <div class="pr-loyalty">
                        <div class="loyalty-item">
                            <img src="./public/img/qr-tgdd/qr.png" alt="">
                            <i>Quét để tải app</i>
                        </div>
                        <div class="loyalty-item">
                            <p><i class="fa-solid fa-gift"></i> QUÀ TẶNG VIP</p>
                            <span>Tích & Sử dụng điểm cho khách hàng thân thiết</span>
                            <i>Sản phẩm của tập đoàn MWG</i>
                        </div>
                        <div class="loyalty-item">
                            <img src="./public/img/qr-tgdd/appstore.png" alt="">
                            <img src="./public/img/qr-tgdd/ggplay.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="same-products">
                <h1>Các sản phẩm tương tự</h1>
                <div class="same-product-child products">
                    <div class="product-item">
                        <a href="">
                            <img src="./public/img/products/oppo-reno8-t-(2).webp" alt="">
                            <h4>iPhone 15 Plus 128GB</h4>
                            <div class="item-txt-online">
                                <img src="./public/img/icon/tai_xuong.png" alt="">
                                <span>Online giá rẻ quá</span>
                            </div>
                            <div class="old-price">
                                <del>8.990.000<sup>₫</sup></del>
                                <span>-30%</span>
                            </div>
                            <div class="price">7.988.000<sup>₫</sup></div>
                            <div class="evaluate">
                                <div class="star">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                </div>
                                <p>100</p>
                            </div>
                        </a>
                    </div>
                    <div class="product-item">
                        <a href="">
                            <img src="./public/img/products/oppo-reno8-t-(2).webp" alt="">
                            <h4>iPhone 15 Plus 128GB</h4>
                            <div class="item-txt-online">
                                <img src="./public/img/icon/tai_xuong.png" alt="">
                                <span>Online giá rẻ quá</span>
                            </div>
                            <div class="old-price">
                                <del>8.990.000<sup>₫</sup></del>
                                <span>-30%</span>
                            </div>
                            <div class="price">7.988.000<sup>₫</sup></div>
                            <div class="evaluate">
                                <div class="star">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                </div>
                                <p>100</p>
                            </div>
                        </a>
                    </div>
                    <div class="product-item">
                        <a href="">
                            <img src="./public/img/products/oppo-reno8-t-(2).webp" alt="">
                            <h4>iPhone 15 Plus 128GB</h4>
                            <div class="item-txt-online">
                                <img src="./public/img/icon/tai_xuong.png" alt="">
                                <span>Online giá rẻ quá</span>
                            </div>
                            <div class="old-price">
                                <del>8.990.000<sup>₫</sup></del>
                                <span>-30%</span>
                            </div>
                            <div class="price">7.988.000<sup>₫</sup></div>
                            <div class="evaluate">
                                <div class="star">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                </div>
                                <p>100</p>
                            </div>
                        </a>
                    </div>
                    <div class="product-item">
                        <a href="">
                            <img src="./public/img/products/oppo-reno8-t-(2).webp" alt="">
                            <h4>iPhone 15 Plus 128GB</h4>
                            <div class="item-txt-online">
                                <img src="./public/img/icon/tai_xuong.png" alt="">
                                <span>Online giá rẻ quá</span>
                            </div>
                            <div class="old-price">
                                <del>8.990.000<sup>₫</sup></del>
                                <span>-30%</span>
                            </div>
                            <div class="price">7.988.000<sup>₫</sup></div>
                            <div class="evaluate">
                                <div class="star">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                </div>
                                <p>100</p>
                            </div>
                        </a>
                    </div>
                    <div class="product-item">
                        <a href="">
                            <img src="./public/img/products/oppo-reno8-t-(2).webp" alt="">
                            <h4>iPhone 15 Plus 128GB</h4>
                            <div class="item-txt-online">
                                <img src="./public/img/icon/tai_xuong.png" alt="">
                                <span>Online giá rẻ quá</span>
                            </div>
                            <div class="old-price">
                                <del>8.990.000<sup>₫</sup></del>
                                <span>-30%</span>
                            </div>
                            <div class="price">7.988.000<sup>₫</sup></div>
                            <div class="evaluate">
                                <div class="star">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                </div>
                                <p>100</p>
                            </div>
                        </a>
                    </div>
                    <div class="product-item">
                        <a href="">
                            <img src="./public/img/products/oppo-reno8-t-(2).webp" alt="">
                            <h4>iPhone 15 Plus 128GB</h4>
                            <div class="item-txt-online">
                                <img src="./public/img/icon/tai_xuong.png" alt="">
                                <span>Online giá rẻ quá</span>
                            </div>
                            <div class="old-price">
                                <del>8.990.000<sup>₫</sup></del>
                                <span>-30%</span>
                            </div>
                            <div class="price">7.988.000<sup>₫</sup></div>
                            <div class="evaluate">
                                <div class="star">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                </div>
                                <p>100</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="other-products">
                <h1>Các sản phẩm khác</h1>
                <div class="same-product-child products">
                    <div class="product-item">
                        <a href="">
                            <img src="./public/img/products/oppo-reno8-t-(2).webp" alt="">
                            <h4>iPhone 15 Plus 128GB</h4>
                            <div class="item-txt-online">
                                <img src="./public/img/icon/tai_xuong.png" alt="">
                                <span>Online giá rẻ quá</span>
                            </div>
                            <div class="old-price">
                                <del>8.990.000<sup>₫</sup></del>
                                <span>-30%</span>
                            </div>
                            <div class="price">7.988.000<sup>₫</sup></div>
                            <div class="evaluate">
                                <div class="star">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                </div>
                                <p>100</p>
                            </div>
                        </a>
                    </div>
                    <div class="product-item">
                        <a href="">
                            <img src="./public/img/products/oppo-reno8-t-(2).webp" alt="">
                            <h4>iPhone 15 Plus 128GB</h4>
                            <div class="item-txt-online">
                                <img src="./public/img/icon/tai_xuong.png" alt="">
                                <span>Online giá rẻ quá</span>
                            </div>
                            <div class="old-price">
                                <del>8.990.000<sup>₫</sup></del>
                                <span>-30%</span>
                            </div>
                            <div class="price">7.988.000<sup>₫</sup></div>
                            <div class="evaluate">
                                <div class="star">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                </div>
                                <p>100</p>
                            </div>
                        </a>
                    </div>
                    <div class="product-item">
                        <a href="">
                            <img src="./public/img/products/oppo-reno8-t-(2).webp" alt="">
                            <h4>iPhone 15 Plus 128GB</h4>
                            <div class="item-txt-online">
                                <img src="./public/img/icon/tai_xuong.png" alt="">
                                <span>Online giá rẻ quá</span>
                            </div>
                            <div class="old-price">
                                <del>8.990.000<sup>₫</sup></del>
                                <span>-30%</span>
                            </div>
                            <div class="price">7.988.000<sup>₫</sup></div>
                            <div class="evaluate">
                                <div class="star">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                </div>
                                <p>100</p>
                            </div>
                        </a>
                    </div>
                    <div class="product-item">
                        <a href="">
                            <img src="./public/img/products/oppo-reno8-t-(2).webp" alt="">
                            <h4>iPhone 15 Plus 128GB</h4>
                            <div class="item-txt-online">
                                <img src="./public/img/icon/tai_xuong.png" alt="">
                                <span>Online giá rẻ quá</span>
                            </div>
                            <div class="old-price">
                                <del>8.990.000<sup>₫</sup></del>
                                <span>-30%</span>
                            </div>
                            <div class="price">7.988.000<sup>₫</sup></div>
                            <div class="evaluate">
                                <div class="star">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                </div>
                                <p>100</p>
                            </div>
                        </a>
                    </div>
                    <div class="product-item">
                        <a href="">
                            <img src="./public/img/products/oppo-reno8-t-(2).webp" alt="">
                            <h4>iPhone 15 Plus 128GB</h4>
                            <div class="item-txt-online">
                                <img src="./public/img/icon/tai_xuong.png" alt="">
                                <span>Online giá rẻ quá</span>
                            </div>
                            <div class="old-price">
                                <del>8.990.000<sup>₫</sup></del>
                                <span>-30%</span>
                            </div>
                            <div class="price">7.988.000<sup>₫</sup></div>
                            <div class="evaluate">
                                <div class="star">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                </div>
                                <p>100</p>
                            </div>
                        </a>
                    </div>
                    <div class="product-item">
                        <a href="">
                            <img src="./public/img/products/oppo-reno8-t-(2).webp" alt="">
                            <h4>iPhone 15 Plus 128GB</h4>
                            <div class="item-txt-online">
                                <img src="./public/img/icon/tai_xuong.png" alt="">
                                <span>Online giá rẻ quá</span>
                            </div>
                            <div class="old-price">
                                <del>8.990.000<sup>₫</sup></del>
                                <span>-30%</span>
                            </div>
                            <div class="price">7.988.000<sup>₫</sup></div>
                            <div class="evaluate">
                                <div class="star">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                </div>
                                <p>100</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </article>
        <div class="view-description">
            <div class="description-all">
                <div class="description-child">
                    jfhaf
                </div>
            </div>
            <div class="btn-close">
                <button><i class="fa-solid fa-x"></i> Đóng</button>
            </div>
        </div>
        <!-- footer -->
        <?php include "./app/views/customer/includes/footer.php" ?>
    </main>
    <script
      type="text/javascript"
      src="https://code.jquery.com/jquery-1.11.0.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
    ></script>
    <script src="./public/js/jQuery.js"></script>
    <script src="./public/js/productDetail.js"></script>
</body>
</html>