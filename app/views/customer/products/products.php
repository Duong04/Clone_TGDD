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
                <?php foreach ($datas['listSubcat'] as $row) { ?>
                <a href="./Products/Categories/<?=$row['category_id']?>/<?=$row['subcat_id']?>"><img src="<?=$row['subcat_image']?>" alt=""></a>
                <?php } ?>
            </div>
            <div class="filter">
            <h4><span id="product-count"><?=count($datas['listProducts'])?></span> <?=$datas['listCategory']['category_name'].' '.(isset($datas['subcat']) ? $datas['subcat']['subcat_name'] : '')?></h4>
                <div class="checked">
                    <input value="discount" onchange="filterWithChecked(this, <?=$datas['listCategory']['category_id']?>, <?=isset($datas['subcat']) ? $datas['subcat']['subcat_id'] : ''?>)" type="checkbox" name="discount" id="discount">
                    <label for="discount">Giảm giá</label>
                </div>
                <select onchange="productFilter(this, null, <?=$datas['listCategory']['category_id']?>, <?=isset($datas['subcat']) ? $datas['subcat']['subcat_id'] : ''?>)" name="" id="product-filter">
                    <option value="">Giá</option>
                    <option value="1">Dưới 1 triệu</option>
                    <option value="2">Từ 1 - 5 triệu</option>
                    <option value="3">Từ 5 - 10 triệu</option>
                    <option value="4">Từ 10 - 15 triệu</option>
                    <option value="5">Từ 15 - 20 triệu</option>
                    <option value="6">Trên 20 triệu</option>
                </select>
                <select onchange="productFilter(null, this, <?=$datas['listCategory']['category_id']?>, <?=isset($datas['subcat']) ? $datas['subcat']['subcat_id'] : ''?>)" name="" id="">
                    <option value="">Sắp xếp</option>
                    <option value="descView">Sắp xếp nổi bật</option>
                    <option value="descPrice">Giá cao đến thấp</option>
                    <option value="ascPrice">Giá thấp đến cao</option>
                    <option value="ascName">Từ A - Z</option>
                    <option value="descName">Từ Z - A</option>
                </select>
            </div>
            <div class="list-product" id="product-list">
                <?php 
                foreach ($datas['listProducts'] as $row) { 
                    $newPriceF = number_format($row['new_price'], 0, ',', '.');
                    $initialPriceF = number_format($row['initial_price'], 0, ',', '.');
                    $numRand = rand(11, 399);
                ?>
                <div class="product-item">
                    <a href="./Products/ProductDetail/<?=$row['product_id']?>">
                        <div class="product-img">
                            <img src="<?=$row['product_image']?>" alt="">
                        </div>
                        <h5><?=$row['product_name']?></h4>
                        <div class="item-txt-online">
                            <img src="./public/img/icon/tai_xuong.png" alt="">
                            <span>Online giá rẻ quá</span>
                        </div>
                        <?php if ($row['discount'] > 0) { ?>
                        <div class="old-price">
                            <del><?=$initialPriceF?><sup>₫</sup></del>
                            <span>-<?=$row['discount']?>%</span>
                        </div>
                        <div class="price">
                            <?=$newPriceF?><sup>₫</sup>
                        </div>
                        <?php } else { ?>
                        <div class="price">
                            <?=$initialPriceF?><sup>₫</sup>
                        </div>
                        <?php } ?>
                        <div class="star">
                            <div>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <span><?=$numRand?></span>
                        </div>
                    </a>
                </div>
                <?php } ?>
            </div>
        </article>
        <!-- footer -->
        <?php include "./app/views/customer/includes/footer.php" ?>
    </main>
    <script
    src="https://code.jquery.com/jquery-3.7.1.js"
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
    <script src="./public/js/ajax.js"></script>
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