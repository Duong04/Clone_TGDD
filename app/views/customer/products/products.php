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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <base href="http://localhost/php/php_oop/mvc/" />
    <link rel="stylesheet" href="./public/css/reset.css">
    <link rel="stylesheet" href="./public/css/animation.css">
    <link rel="stylesheet" href="./public/css/jquery.css">
    <link rel="stylesheet" href="./public/css/header.css">
    <link rel="stylesheet" href="./public/css/footer.css">
    <link rel="stylesheet" href="./public/css/products.css">
</head>
<body>
<main class="main">
        <?php include "./app/views/customer/includes/header.php" ?>
        <div class="banner">
            <div class="banner-main">
                <a href="">
                    <img src="./public/img/banner/banner_products/800-200-800x200-59.png" alt="">
                </a>
                <a href="">
                    <img src="./public/img/banner/banner_products/a05-800-200-800x200.png" alt="">
                </a>
                <a href="">
                    <img src="./public/img/banner/banner_products/iPad-10-800-200-800x200-1.png" alt="">
                </a>
                <a href="">
                    <img src="./public/img/banner/banner_products/iPhone-11-800-200-800x200-1.png" alt="">
                </a>
                <a href="">
                    <img src="./public/img/banner/banner_products/ipad9-390x97.png" alt="">
                </a>
                <a href="">
                    <img src="./public/img/banner/banner_products/Loa-800-200-800x200.png" alt="">
                </a>
                <a href="">
                    <img src="./public/img/banner/banner_products/loa-1200-300-1200x300.png" alt="">
                </a>
            </div>
            <div class="banner-right">
                <a href="">
                    <img src="./public/img/banner/banner_products/sticky-s21fe-390x97.png" alt="">
                </a>
                <a href="">
                    <img src="./public/img/banner/banner_products/ipad9-390x97.png" alt="">
                </a>
            </div>
        </div>
        <!-- article -->
        <article>
            <div class="lst-quickfilter">
                <a href=""><img src="./public/img/subcategories/logo-iphone-220x48.png" alt=""></a>
                <a href=""><img src="./public/img/subcategories/logo-iphone-220x48.png" alt=""></a>
                <a href=""><img src="./public/img/subcategories/logo-iphone-220x48.png" alt=""></a>
                <a href=""><img src="./public/img/subcategories/logo-iphone-220x48.png" alt=""></a>
                <a href=""><img src="./public/img/subcategories/logo-iphone-220x48.png" alt=""></a>
                <a href=""><img src="./public/img/subcategories/logo-iphone-220x48.png" alt=""></a>
                <a href=""><img src="./public/img/subcategories/logo-iphone-220x48.png" alt=""></a>
                <a href=""><img src="./public/img/subcategories/logo-iphone-220x48.png" alt=""></a>
                <a href=""><img src="./public/img/subcategories/logo-iphone-220x48.png" alt=""></a>
                <a href=""><img src="./public/img/subcategories/logo-iphone-220x48.png" alt=""></a>
                <a href=""><img src="./public/img/subcategories/logo-iphone-220x48.png" alt=""></a>
            </div>
            <div class="filter">
                <h4>100 điện thoại</h4>
                <div class="checked">
                    <input type="checkbox" name="discount" id="discount">
                    <label for="discount">Giảm giá</label>
                </div>
                <div class="checked">
                    <input type="checkbox" name="latest" id="latest">
                    <label for="latest">Mới nhất</label>
                </div>
                <select name="" id="">
                    <option value="">Giá</option>
                    <option value="">Dưới 1 triệu</option>
                    <option value="">Từ 1 - 5 triệu</option>
                    <option value="">Từ 5 - 10 triệu</option>
                    <option value="">Từ 10 - 15 triệu</option>
                    <option value="">Từ 15 - 20 triệu</option>
                    <option value="">Trên 20 triệu</option>
                </select>
                <select name="" id="">
                    <option value="">Sắp xếp</option>
                    <option value="">Sắp xếp nổi bật</option>
                    <option value="">Giá cao đến thấp</option>
                    <option value="">Giá thấp đến cao</option>
                    <option value="">Từ A - Z</option>
                    <option value="">Từ Z - A</option>
                </select>
            </div>
            <div class="list-product">
                <div class="product-item">
                    <a href="">
                        <img src="./public/img/products/oppo-reno8-t-(2).webp" alt="">
                        <h5>iPhone 15 Pro Max</h4>
                        <div class="item-txt-online">
                            <img src="./public/img/icon/tai_xuong.png" alt="">
                            <span>Online giá rẻ quá</span>
                        </div>
                        <div class="old-price">
                            <del>10.000.000<sup>₫</sup></del>
                            <span>-8%</span>
                        </div>
                        <div class="price">
                            31.000.000<sup>₫</sup>
                        </div>
                        <div class="star">
                            <div>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <span>100</span>
                        </div>
                    </a>
                </div>
                <div class="product-item">
                    <a href="">
                        <img src="./public/img/products/oppo-reno8-t-(2).webp" alt="">
                        <h5>iPhone 15 Pro Max</h4>
                        <div class="item-txt-online">
                            <img src="./public/img/icon/tai_xuong.png" alt="">
                            <span>Online giá rẻ quá</span>
                        </div>
                        <div class="old-price">
                            <del>10.000.000<sup>₫</sup></del>
                            <span>-8%</span>
                        </div>
                        <div class="price">
                            31.000.000<sup>₫</sup>
                        </div>
                        <div class="star">
                            <div>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <span>100</span>
                        </div>
                    </a>
                </div>
                <div class="product-item">
                    <a href="">
                        <img src="./public/img/products/oppo-reno8-t-(2).webp" alt="">
                        <h5>iPhone 15 Pro Max</h4>
                        <div class="item-txt-online">
                            <img src="./public/img/icon/tai_xuong.png" alt="">
                            <span>Online giá rẻ quá</span>
                        </div>
                        <div class="old-price">
                            <del>10.000.000<sup>₫</sup></del>
                            <span>-8%</span>
                        </div>
                        <div class="price">
                            31.000.000<sup>₫</sup>
                        </div>
                        <div class="star">
                            <div>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <span>100</span>
                        </div>
                    </a>
                </div>
                <div class="product-item">
                    <a href="">
                        <img src="./public/img/products/oppo-reno8-t-(2).webp" alt="">
                        <h5>iPhone 15 Pro Max</h4>
                        <div class="item-txt-online">
                            <img src="./public/img/icon/tai_xuong.png" alt="">
                            <span>Online giá rẻ quá</span>
                        </div>
                        <div class="old-price">
                            <del>10.000.000<sup>₫</sup></del>
                            <span>-8%</span>
                        </div>
                        <div class="price">
                            31.000.000<sup>₫</sup>
                        </div>
                        <div class="star">
                            <div>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <span>100</span>
                        </div>
                    </a>
                </div>
                <div class="product-item">
                    <a href="">
                        <img src="./public/img/products/oppo-reno8-t-(2).webp" alt="">
                        <h5>iPhone 15 Pro Max</h4>
                        <div class="item-txt-online">
                            <img src="./public/img/icon/tai_xuong.png" alt="">
                            <span>Online giá rẻ quá</span>
                        </div>
                        <div class="old-price">
                            <del>10.000.000<sup>₫</sup></del>
                            <span>-8%</span>
                        </div>
                        <div class="price">
                            31.000.000<sup>₫</sup>
                        </div>
                        <div class="star">
                            <div>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <span>100</span>
                        </div>
                    </a>
                </div>
                <div class="product-item">
                    <a href="">
                        <img src="./public/img/products/oppo-reno8-t-(2).webp" alt="">
                        <h5>iPhone 15 Pro Max</h4>
                        <div class="item-txt-online">
                            <img src="./public/img/icon/tai_xuong.png" alt="">
                            <span>Online giá rẻ quá</span>
                        </div>
                        <div class="old-price">
                            <del>10.000.000<sup>₫</sup></del>
                            <span>-8%</span>
                        </div>
                        <div class="price">
                            31.000.000<sup>₫</sup>
                        </div>
                        <div class="star">
                            <div>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <span>100</span>
                        </div>
                    </a>
                </div>
                <div class="product-item">
                    <a href="">
                        <img src="./public/img/products/oppo-reno8-t-(2).webp" alt="">
                        <h5>iPhone 15 Pro Max</h4>
                        <div class="item-txt-online">
                            <img src="./public/img/icon/tai_xuong.png" alt="">
                            <span>Online giá rẻ quá</span>
                        </div>
                        <div class="old-price">
                            <del>10.000.000<sup>₫</sup></del>
                            <span>-8%</span>
                        </div>
                        <div class="price">
                            31.000.000<sup>₫</sup>
                        </div>
                        <div class="star">
                            <div>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <span>100</span>
                        </div>
                    </a>
                </div>
                <div class="product-item">
                    <a href="">
                        <img src="./public/img/products/oppo-reno8-t-(2).webp" alt="">
                        <h5>iPhone 15 Pro Max</h4>
                        <div class="item-txt-online">
                            <img src="./public/img/icon/tai_xuong.png" alt="">
                            <span>Online giá rẻ quá</span>
                        </div>
                        <div class="old-price">
                            <del>10.000.000<sup>₫</sup></del>
                            <span>-8%</span>
                        </div>
                        <div class="price">
                            31.000.000<sup>₫</sup>
                        </div>
                        <div class="star">
                            <div>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <span>100</span>
                        </div>
                    </a>
                </div>
                <div class="product-item">
                    <a href="">
                        <img src="./public/img/products/oppo-reno8-t-(2).webp" alt="">
                        <h5>iPhone 15 Pro Max</h4>
                        <div class="item-txt-online">
                            <img src="./public/img/icon/tai_xuong.png" alt="">
                            <span>Online giá rẻ quá</span>
                        </div>
                        <div class="old-price">
                            <del>10.000.000<sup>₫</sup></del>
                            <span>-8%</span>
                        </div>
                        <div class="price">
                            31.000.000<sup>₫</sup>
                        </div>
                        <div class="star">
                            <div>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <span>100</span>
                        </div>
                    </a>
                </div>
                <div class="product-item">
                    <a href="">
                        <img src="./public/img/products/oppo-reno8-t-(2).webp" alt="">
                        <h5>iPhone 15 Pro Max</h4>
                        <div class="item-txt-online">
                            <img src="./public/img/icon/tai_xuong.png" alt="">
                            <span>Online giá rẻ quá</span>
                        </div>
                        <div class="old-price">
                            <del>10.000.000<sup>₫</sup></del>
                            <span>-8%</span>
                        </div>
                        <div class="price">
                            31.000.000<sup>₫</sup>
                        </div>
                        <div class="star">
                            <div>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <span>100</span>
                        </div>
                    </a>
                </div>
                <div class="product-item">
                    <a href="">
                        <img src="./public/img/products/oppo-reno8-t-(2).webp" alt="">
                        <h5>iPhone 15 Pro Max</h4>
                        <div class="item-txt-online">
                            <img src="./public/img/icon/tai_xuong.png" alt="">
                            <span>Online giá rẻ quá</span>
                        </div>
                        <div class="old-price">
                            <del>10.000.000<sup>₫</sup></del>
                            <span>-8%</span>
                        </div>
                        <div class="price">
                            31.000.000<sup>₫</sup>
                        </div>
                        <div class="star">
                            <div>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <span>100</span>
                        </div>
                    </a>
                </div>
                <div class="product-item">
                    <a href="">
                        <img src="./public/img/products/oppo-reno8-t-(2).webp" alt="">
                        <h5>iPhone 15 Pro Max</h4>
                        <div class="item-txt-online">
                            <img src="./public/img/icon/tai_xuong.png" alt="">
                            <span>Online giá rẻ quá</span>
                        </div>
                        <div class="old-price">
                            <del>10.000.000<sup>₫</sup></del>
                            <span>-8%</span>
                        </div>
                        <div class="price">
                            31.000.000<sup>₫</sup>
                        </div>
                        <div class="star">
                            <div>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <span>100</span>
                        </div>
                    </a>
                </div>
                <div class="product-item">
                    <a href="">
                        <img src="./public/img/products/oppo-reno8-t-(2).webp" alt="">
                        <h5>iPhone 15 Pro Max</h4>
                        <div class="item-txt-online">
                            <img src="./public/img/icon/tai_xuong.png" alt="">
                            <span>Online giá rẻ quá</span>
                        </div>
                        <div class="old-price">
                            <del>10.000.000<sup>₫</sup></del>
                            <span>-8%</span>
                        </div>
                        <div class="price">
                            31.000.000<sup>₫</sup>
                        </div>
                        <div class="star">
                            <div>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <span>100</span>
                        </div>
                    </a>
                </div>
            </div>
        </article>
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
</body>
</html>