<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <base href="http://localhost/php/php_oop/mvc/" />
    <link rel="stylesheet" href="./public/css/reset.css">
    <link rel="stylesheet" href="./public/css/animation.css">
    <link rel="stylesheet" href="./public/css/jquery.css">
    <link rel="stylesheet" href="./public/css/header.css">
    <link rel="stylesheet" href="./public/css/footer.css">
    <link rel="stylesheet" href="./public/css/home.css">
</head>

<body>
    <main class="main">
        <?php include "./app/views/customer/includes/header.php" ?>
        <!-- banner -->
        <div class="banner">
            <a href=""><img src="./public/img/banner/Banner-big--1920x450-1920x450-2.webp" alt=""></a>
        </div>
        <!-- Article -->
        <article>
            <!-- section -->
            <section id="section">
                <div class="owl-stage-outer">
                    <div class="owl-item">
                        <a href=""><img src="./public/img/section/C67-tet-720-220-720x220-3.webp" alt=""></a>
                    </div>
                    <div class="owl-item">
                        <a href=""><img src="./public/img/section/iPhone-15-Pro-Max-720-220-720x220.webp"
                                alt=""></a>
                    </div>
                    <div class="owl-item">
                        <a href=""><img src="./public/img/section/Kidcare-720-220-720x220-1.webp" alt=""></a>
                    </div>
                    <div class="owl-item">
                        <a href=""><img src="./public/img/section/A15-A25--720-220-720x220.webp" alt=""></a>
                    </div>
                    <div class="owl-item">
                        <a href=""><img src="./public/img/section/Lap-tet-720-220-720x220.webp" alt=""></a>
                    </div>
                    <div class="owl-item">
                        <a href=""><img src="./public/img/section/Redmi-Note-13-Pre-720-220-720x220-16.webp"
                                alt=""></a>
                    </div>
                </div>
            </section>
            <!-- section 2 -->
            <section id="section-2">
                <ul>
                    <li><a href="">
                            <img src="./public/img/icon/120x120-240x240-5.webp" alt="">
                            <span>Smartphone Đặc Quyền</span>
                        </a></li>
                    <li><a href="">
                            <img src="./public/img/icon/iCON-BUTTON-ngay-8-1-100x100-2.webp" alt="">
                            <span>Loa | Tai Nghe Từ 150.000đ</span>
                        </a></li>
                    <li><a href="">
                            <img src="./public/img/icon/icon-dhxk-ne--1--200x200-1.webp" alt="">
                            <span>Hotsale Đồng hồ lên đến 50%++</span>
                        </a></li>
                    <li><a href="">
                            <img src="./public/img/icon/icon-100x100-dcc-100x103.webp" alt="">
                            <span>Giảm đến 50%++</span>
                        </a></li>
                </ul>
            </section>
            <!-- section 3 -->
            <section id="section-3">
                <a href=""><img src="./public/img/banner/1200x100-1200x100.webp" alt=""></a>
            </section>
            <!-- Product sale -->
            <section id="section-4">
                <div class="timeline-title">
                    <img src="./public/img/banner-title/Tet-FS-1200x120.gif" alt="">
                    <div class="countdown" onload="showTime()"></div>
                </div>
                <div class="products product-sale">
                    <?php 
                        foreach ($datas['listProductDiscountest'] as $row) {
                            $newPriceF = number_format($row['new_price'], 0, ',', '.');
                            $initialPriceF = number_format($row['initial_price'], 0, ',', '.');
                    ?>
                    <div class="product-item">
                        <a href="./Products/ProductDetail/<?=$row['product_id']?>">
                            <div class="product-img">
                                <img src="<?=$row['product_image']?>" alt="">
                            </div>
                            <h4><?=$row['product_name']?></h4>
                            <div class="price"><?=$newPriceF?><sup>₫</sup></div>
                            <div class="old-price">
                                <del><?=$initialPriceF?><sup>₫</sup></del>
                                <span>-<?=$row['discount']?>%</span>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                </div>
                <img src="./public/img/icon/Decor-frame-1-1200x56-1.png" alt="">
            </section>
            <!-- product accessory -->
            <section id="section-5">
                <div class="banner-accessory">
                    <a href=""><img src="./public/img/banner-title/Group-232963-1200x120.webp" alt=""></a>
                </div>
                <div class="products product-accessory">
                    <?php 
                        foreach($datas['listProductClockDicount'] as $row) {
                            $newPriceF = number_format($row['new_price'], 0, ',', '.');
                            $numRand = rand(11, 399);
                    ?>
                    <div class="product-item-2">
                        <a href="./Products/ProductDetail/<?=$row['product_id']?>">
                            <img src="./public/img/bgr/Frame-knockout-desktop-226x500.webp" alt="">
                            <div class="product-img">
                                <img class="img-hv" src="<?=$row['product_image']?>" alt="">
                            </div>
                            <h4><?=$row['product_name']?></h4>
                            <div class="onl">
                                <img src="./public/img/icon/tai_xuong.png" alt="">
                                <span>Online giá rẻ quá</span>
                            </div>
                            <div class="price-2">
                                <span><?=$newPriceF?><sup>₫</sup></span>
                                <span>-<?=$row['discount']?>%</span>
                            </div>
                            <div class="star"><span>4.3 <i class="fa-solid fa-star"></i> </span>(<?=$numRand?>)</div>
                        </a>
                    </div>
                    <?php } ?>
                </div>
                <img src="./public/img/icon/Decor-frame-1-1200x56-1.png" alt="">
            </section>
            <!-- section 6 -->
            <section id="section-6">
                <h1>TUẦN LỄ HP - GIÁ CHỈ TỪ 9.190.000đ</h1>
                <div class="owl-stage-outer-2">
                    <a href=""><img src="./public/img/hp/tuan-le-hp-desk-1-380x200.webp" alt=""></a>
                    <a href=""><img src="./public/img/hp/tuan-le-hp-desk-2-380x200.webp" alt=""></a>
                    <a href=""><img src="./public/img/hp/tuan-le-hp-desk-3-380x200.webp" alt=""></a>
                    <a href=""><img src="./public/img/hp/tuan-le-hp-desk-4-380x200-1.webp" alt=""></a>
                    <a href=""><img src="./public/img/hp/tuan-le-hp-desk-6-380x200.webp" alt=""></a>
                </div>
                <div class="products product-hp">
                    <?php 
                        foreach($datas['listProductHp'] as $row) {
                            $price = $row['discount'] > 0 ? $row['new_price'] : $row['initial_price'];
                            $priceF = number_format($price, 0, ',', '.');
                            $numRand = rand(11, 399);
                    ?>
                    <div class="product-hp-item">
                        <a href="./Products/ProductDetail/<?=$row['product_id']?>">
                            <div class="product-img">
                                <img class="img-hv" src="<?=$row['product_image']?>" alt="">
                            </div>
                            <h4><?=$row['product_name']?></h4>
                            <div class="onl">
                                <img src="./public/img/icon/tai_xuong.png" alt="">
                                <span>Online giá rẻ quá</span>
                            </div>
                            <div class="price-2">
                                <span><?=$priceF?><sup>₫</sup></span>
                                <?php if ($row['discount'] > 0) { ?>
                                    <span>-<?=$row['discount']?>%</span>
                                <?php } ?>
                            </div>
                            <div class="star"><span>4.3 <i class="fa-solid fa-star"></i> </span>(<?=$numRand?>)</div>
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </section>
            <!-- section 7 -->
            <section id="section-7">
                <h2>XU HƯỚNG MUA SẮM</h2>
                <div class="slider-four shopping-trends">
                    <div class="shopping-trend-item">
                        <a href="">
                            <img src="./public/img/shopping-trends/Des-280x235.webp" alt="">
                            <span>iPhone 14 Pro Max</span>
                            <strong>Chỉ Từ 27.190.000đ</strong>
                        </a>
                    </div>
                    <div class="shopping-trend-item">
                        <a href="">
                            <img src="./public/img/shopping-trends/CAMERA-Desk-280x235.webp" alt="">
                            <span>Loa tai nghe</span>
                            <strong>Chỉ từ 150.000đ</strong>
                        </a>
                    </div>
                    <div class="shopping-trend-item">
                        <a href="">
                            <img src="./public/img/shopping-trends/desk-280x235.webp" alt="">
                            <span>BeFit B3s</span>
                            <strong>Giảm 200K hoặc Quà 390K</strong>
                        </a>
                    </div>
                    <div class="shopping-trend-item">
                        <a href="">
                            <img src="./public/img/shopping-trends/xu-huong-gaming-desk-280x235.webp" alt="">
                            <span><span>Laptop Gaming</span></span>
                            <strong>Chỉ từ 15.990.000đ</strong>
                        </a>
                    </div>
                </div>
            </section>
            <!-- section 8 -->
            <section id="section-8">
                <h1><i class="fa-brands fa-slack"></i> KHUYẾN MÃI CHỈ CÓ TRÊN ONLINE</h1>
                <div class="owl-carousel">
                    <a href=""><img src="./public/img/banner-title/1200x150-tgdd-1200x150-1.png" alt=""></a>
                </div>
                <div class="service-conv">
                    <h1>DỊCH VỤ TIỆN ÍCH</h1>
                    <div class="slider-four service-conv-child">
                        <div class="service-conv-item">
                            <div class="service-conv-flex">
                                <div class="service-icon">
                                    <i class="fa-solid fa-tablet-screen-button"></i>
                                </div>
                                <div class="service-text">
                                    <h5>Mua mã thẻ cào</h5>
                                    <p><strong>Giảm 2%</strong> cho mệnh giá từ 100.000 trở lên</p>
                                </div>
                            </div>
                        </div>
                        <div class="service-conv-item">
                            <div class="service-conv-flex">
                                <div class="service-icon">
                                    <i class="fa-solid fa-bolt"></i>
                                </div>
                                <div class="service-text">
                                    <h5>Dịch Vụ Đóng Tiền</h5>
                                    <p>Điện, Nước, Trả Góp, Internet, Cước điện thoại trả sau</p>
                                </div>
                            </div>
                        </div>
                        <div class="service-conv-item">
                            <div class="service-conv-flex">
                                <div class="service-icon">
                                    <i class="fa-solid fa-gamepad"></i>
                                </div>
                                <div class="service-text">
                                    <h5>Mua mã thẻ cào</h5>
                                    <p><strong>Giảm 2%</strong>  cho mệnh giá từ 100.000 trở lên</p>
                                </div>
                            </div>
                        </div>
                        <div class="service-conv-item">
                            <div class="service-conv-flex">
                                <div class="service-icon">
                                    <i class="fa-brands fa-microsoft"></i>
                                </div>
                                <div class="service-text">
                                    <h5>Office bản quyền</h5>
                                    <p>Mua Microsoft Office giá chỉ từ 990k</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- section 9 -->
            <section id="section-9">
                <h1>GỢI Ý HÔM NAY</h1>
                <div class="tab">
                    <div class="tab-item">
                        <img src="./public/img/icon/icon-tab/goiy-1.webp" alt="">
                        <span>Cho bạn</span>
                    </div>
                    <div class="tab-item">
                        <img src="./public/img/icon/icon-tab/icon-laptop-gaming-desk-50x50-50x50-50x50-1.webp" alt="">
                        <span>Laptop Gaming</span>
                    </div>
                    <div class="tab-item">
                        <img src="./public/img/icon/icon-tab/pk-50-50x50-50x50-2.webp" alt="">
                        <span>Phụ kiện giảm sốc</span>
                    </div>
                    <div class="tab-item">
                        <img src="./public/img/icon/icon-tab/desk11-50x50-1-50x50-1-50x50.webp" alt="">
                        <span>Tablet giá rẻ</span>
                    </div>
                </div>
                <div class="tab-product">
                    <div class="tab-product-child active">
                        <?php 
                            foreach ($datas['listProductRand'] as $row) {
                                $priceF = number_format($row['new_price'], 0, ',', '.');
                                $numRand = rand(11, 399);
                        ?>
                        <div class="tab-product-item">
                            <a href="./Products/ProductDetail/<?=$row['product_id']?>">
                                <div class="product-img">
                                    <img class="img-hv" src="<?=$row['product_image']?>" alt="">
                                </div>
                                <h4><?=$row['product_name']?></h4>
                                <div class="onl">
                                    <img src="./public/img/icon/tai_xuong.png" alt="">
                                    <span>Online giá rẻ quá</span>
                                </div>
                                <div class="price-2">
                                    <span><?=$priceF?><sup>₫</sup></span>
                                    <?php if ($row['discount'] > 0) { ?>
                                        <span>-<?=$row['discount']?>%</span>
                                    <?php } ?>
                                </div>
                                <div class="star"><span>4.3 <i class="fa-solid fa-star"></i> </span>(<?=$numRand?>)</div>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="tab-product-child">
                        <?php 
                            foreach ($datas['listLaptopGaming'] as $row) {
                                $priceF = number_format($row['new_price'], 0, ',', '.');
                                $numRand = rand(11, 399);
                        ?>
                        <div class="tab-product-item">
                            <a href="./Products/ProductDetail/<?=$row['product_id']?>">
                                <div class="product-img">
                                    <img class="img-hv" src="<?=$row['product_image']?>" alt="">
                                </div>
                                <h4><?=$row['product_name']?></h4>
                                <div class="onl">
                                    <img src="./public/img/icon/tai_xuong.png" alt="">
                                    <span>Online giá rẻ quá</span>
                                </div>
                                <div class="price-2">
                                    <span><?=$priceF?><sup>₫</sup></span>
                                    <?php if ($row['discount'] > 0) { ?>
                                        <span>-<?=$row['discount']?>%</span>
                                    <?php } ?>
                                </div>
                                <div class="star"><span>4.3 <i class="fa-solid fa-star"></i> </span>(<?=$numRand?>)</div>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="tab-product-child">
                        <div class="tab-product-item">
                            <a href="">
                                <img class="img-hv" src="./public/img/products/pin-sac-du-phong-polymer-10000mah-ava-jp299-thumb-1-600x600.webp" alt="">
                                <h4>Loa Bluetooth Rezo Pulse E20</h4>
                                <div class="onl">
                                    <img src="./public/img/icon/tai_xuong.png" alt="">
                                    <span>Online giá rẻ quá</span>
                                </div>
                                <div class="price-2">
                                    <span>7.000.000<sup>₫</sup></span>
                                    <span>15%</span>
                                </div>
                                <div class="star"><span>4.3 <i class="fa-solid fa-star"></i> </span>(53)</div>
                            </a>
                        </div>
                        <div class="tab-product-item">
                            <a href="">
                                <img class="img-hv" src="./public/img/products/pin-sac-du-phong-polymer-10000mah-ava-jp299-thumb-1-600x600.webp" alt="">
                                <h4>Loa Bluetooth Rezo Pulse E20</h4>
                                <div class="onl">
                                    <img src="./public/img/icon/tai_xuong.png" alt="">
                                    <span>Online giá rẻ quá</span>
                                </div>
                                <div class="price-2">
                                    <span>7.000.000<sup>₫</sup></span>
                                    <span>15%</span>
                                </div>
                                <div class="star"><span>4.3 <i class="fa-solid fa-star"></i> </span>(53)</div>
                            </a>
                        </div>
                        <div class="tab-product-item">
                            <a href="">
                                <img class="img-hv" src="./public/img/products/pin-sac-du-phong-polymer-10000mah-ava-jp299-thumb-1-600x600.webp" alt="">
                                <h4>Loa Bluetooth Rezo Pulse E20</h4>
                                <div class="onl">
                                    <img src="./public/img/icon/tai_xuong.png" alt="">
                                    <span>Online giá rẻ quá</span>
                                </div>
                                <div class="price-2">
                                    <span>7.000.000<sup>₫</sup></span>
                                    <span>15%</span>
                                </div>
                                <div class="star"><span>4.3 <i class="fa-solid fa-star"></i> </span>(53)</div>
                            </a>
                        </div>
                        <div class="tab-product-item">
                            <a href="">
                                <img class="img-hv" src="./public/img/products/pin-sac-du-phong-polymer-10000mah-ava-jp299-thumb-1-600x600.webp" alt="">
                                <h4>Loa Bluetooth Rezo Pulse E20</h4>
                                <div class="onl">
                                    <img src="./public/img/icon/tai_xuong.png" alt="">
                                    <span>Online giá rẻ quá</span>
                                </div>
                                <div class="price-2">
                                    <span>7.000.000<sup>₫</sup></span>
                                    <span>15%</span>
                                </div>
                                <div class="star"><span>4.3 <i class="fa-solid fa-star"></i> </span>(53)</div>
                            </a>
                        </div>
                        <div class="tab-product-item">
                            <a href="">
                                <img class="img-hv" src="./public/img/products/pin-sac-du-phong-polymer-10000mah-ava-jp299-thumb-1-600x600.webp" alt="">
                                <h4>Loa Bluetooth Rezo Pulse E20</h4>
                                <div class="onl">
                                    <img src="./public/img/icon/tai_xuong.png" alt="">
                                    <span>Online giá rẻ quá</span>
                                </div>
                                <div class="price-2">
                                    <span>7.000.000<sup>₫</sup></span>
                                    <span>15%</span>
                                </div>
                                <div class="star"><span>4.3 <i class="fa-solid fa-star"></i> </span>(53)</div>
                            </a>
                        </div>
                        <div class="tab-product-item">
                            <a href="">
                                <img class="img-hv" src="./public/img/products/pin-sac-du-phong-polymer-10000mah-ava-jp299-thumb-1-600x600.webp" alt="">
                                <h4>Loa Bluetooth Rezo Pulse E20</h4>
                                <div class="onl">
                                    <img src="./public/img/icon/tai_xuong.png" alt="">
                                    <span>Online giá rẻ quá</span>
                                </div>
                                <div class="price-2">
                                    <span>7.000.000<sup>₫</sup></span>
                                    <span>15%</span>
                                </div>
                                <div class="star"><span>4.3 <i class="fa-solid fa-star"></i> </span>(53)</div>
                            </a>
                        </div>
                        <div class="tab-product-item">
                            <a href="">
                                <img class="img-hv" src="./public/img/products/pin-sac-du-phong-polymer-10000mah-ava-jp299-thumb-1-600x600.webp" alt="">
                                <h4>Loa Bluetooth Rezo Pulse E20</h4>
                                <div class="onl">
                                    <img src="./public/img/icon/tai_xuong.png" alt="">
                                    <span>Online giá rẻ quá</span>
                                </div>
                                <div class="price-2">
                                    <span>7.000.000<sup>₫</sup></span>
                                    <span>15%</span>
                                </div>
                                <div class="star"><span>4.3 <i class="fa-solid fa-star"></i> </span>(53)</div>
                            </a>
                        </div>
                        <div class="tab-product-item">
                            <a href="">
                                <img class="img-hv" src="./public/img/products/pin-sac-du-phong-polymer-10000mah-ava-jp299-thumb-1-600x600.webp" alt="">
                                <h4>Loa Bluetooth Rezo Pulse E20</h4>
                                <div class="onl">
                                    <img src="./public/img/icon/tai_xuong.png" alt="">
                                    <span>Online giá rẻ quá</span>
                                </div>
                                <div class="price-2">
                                    <span>7.000.000<sup>₫</sup></span>
                                    <span>15%</span>
                                </div>
                                <div class="star"><span>4.3 <i class="fa-solid fa-star"></i> </span>(53)</div>
                            </a>
                        </div>
                        <div class="tab-product-item">
                            <a href="">
                                <img class="img-hv" src="./public/img/products/pin-sac-du-phong-polymer-10000mah-ava-jp299-thumb-1-600x600.webp" alt="">
                                <h4>Loa Bluetooth Rezo Pulse E20</h4>
                                <div class="onl">
                                    <img src="./public/img/icon/tai_xuong.png" alt="">
                                    <span>Online giá rẻ quá</span>
                                </div>
                                <div class="price-2">
                                    <span>7.000.000<sup>₫</sup></span>
                                    <span>15%</span>
                                </div>
                                <div class="star"><span>4.3 <i class="fa-solid fa-star"></i> </span>(53)</div>
                            </a>
                        </div>
                        <div class="tab-product-item">
                            <a href="">
                                <img class="img-hv" src="./public/img/products/pin-sac-du-phong-polymer-10000mah-ava-jp299-thumb-1-600x600.webp" alt="">
                                <h4>Loa Bluetooth Rezo Pulse E20</h4>
                                <div class="onl">
                                    <img src="./public/img/icon/tai_xuong.png" alt="">
                                    <span>Online giá rẻ quá</span>
                                </div>
                                <div class="price-2">
                                    <span>7.000.000<sup>₫</sup></span>
                                    <span>15%</span>
                                </div>
                                <div class="star"><span>4.3 <i class="fa-solid fa-star"></i> </span>(53)</div>
                            </a>
                        </div>
                    </div>
                    <div class="tab-product-child">
                        <?php 
                            foreach ($datas['listTablet'] as $row) {
                                $priceF = number_format($row['new_price'], 0, ',', '.');
                                $numRand = rand(11, 399);
                        ?>
                        <div class="tab-product-item">
                            <a href="./Products/ProductDetail/<?=$row['product_id']?>">
                                <img class="img-hv" src="<?=$row['product_image']?>" alt="">
                                <h4><?=$row['product_name']?></h4>
                                <div class="onl">
                                    <img src="./public/img/icon/tai_xuong.png" alt="">
                                    <span>Online giá rẻ quá</span>
                                </div>
                                <div class="price-2">
                                    <span><?=$priceF?><sup>₫</sup></span>
                                    <?php if ($row['discount'] > 0) { ?>
                                        <span>-<?=$row['discount']?>%</span>
                                    <?php } ?>
                                </div>
                                <div class="star"><span>4.3 <i class="fa-solid fa-star"></i> </span>(<?=$numRand?>)</div>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
            <!-- section 10 -->
            <section id="section-10">
                <h1>CHUYÊN TRANG THƯƠNG HIỆU</h1>
                <div class="trademark owl-stage-outer-2">
                    <a href=""><img src="./public/img/trademark/chuyentrang-appleDT-390x210.webp" alt=""></a>
                    <a href=""><img src="./public/img/trademark/chuyentrang-HP-390x210.webp" alt=""></a>
                    <a href=""><img src="./public/img/trademark/chuyentrang-lenovo-390x210-1.webp" alt=""></a>
                </div>
            </section>
            <section id="section-11">
                <h1>CHUỖI MỚI DEAL KHỦNG</h1>
                <div class="newchain owl-stage-outer-2">
                    <a href=""><img src="./public/img/newchain/760-400-760x400-2.webp" alt=""></a>
                    <a href=""><img src="./public/img/newchain/760x400--1--760x400-1.webp" alt=""></a>
                    <a href=""><img src="./public/img/newchain/760x400--1--760x400-2.webp" alt=""></a>
                    <a href=""><img src="./public/img/newchain/760x400--1--760x400-3.webp" alt=""></a>
                    <a href=""><img src="./public/img/newchain/760x400-760x400-7.webp" alt=""></a>
                    <a href=""><img src="./public/img/newchain/760x400-760x400-8.webp" alt=""></a>
                    <a href=""><img src="./public/img/newchain/760x400-760x400-14.webp" alt=""></a>
                    <a href=""><img src="./public/img/newchain/ip15-760-400-760x400-3.webp" alt=""></a>
                </div>
            </section>
        </article>
        <div class="aside-left">
            <a href="#">
                <img src="./public/img/aside/Trai-80x270-1.webp" alt="">
            </a>
        </div>
        <div class="aside-right">
            <a href="#">
                <img src="./public/img/aside/Phai-80x270-3.webp" alt="">
            </a>
        </div>
        <?php include_once "./app/views/customer/includes/footer.php" ?>
    </main>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="./public/js/jQuery.js" type="module"></script>
    <script src="./public/js/home.js"></script>
</body>

</html>