<?php 
    class Products extends Controller {
        function categories($category_id = null, $subcat_id=null) {
            $productModel = $this->model('ProductsModels');
            $categoriesModel = $this->model('CategoriesModels');
            $subcatModel = $this->model('SubCategoriesModels');
            $listCategories = $categoriesModel->selectCategories();
            if (isset($category_id)) {
                $listCategory = $categoriesModel->selectCategoryId($category_id);
                $listSubcat = $subcatModel->selectSubcategories($category_id);
                $subcat = null;
                if (isset($subcat_id)) {
                    $subcat = $subcatModel->selectSubcatId($subcat_id);
                    $listProducts = $productModel->selectProductWithCategories($category_id, $subcat_id);
                }else {
                    $listProducts = $productModel->selectProductWithCategories($category_id);
                }
                $this->view('customer/products/products', 
                            [
                                'listCategory' => $listCategory,
                                'subcat' => $subcat,
                                'listCategories'=> $listCategories,
                                'listSubcat'=> $listSubcat,
                                'listProducts' => $listProducts
                            ]);
            }else {
                header('Location: ../');
            }
        }

        function productFilterProcessing() {
            $productModel = $this->model('ProductsModels');
            if (isset($_POST['category_id'])) {
                $value_1 = isset($_POST['values_1']) ? $_POST['values_1'] : null;
                $value_2 = isset($_POST['values_2']) ? $_POST['values_2'] : null;
                $value_3 = isset($_POST['element']) ? $_POST['element'] : 'false';
                if ($_POST['subcat_id']) {
                    $listProduct = $productModel->productFilter($_POST['category_id'], $value_1, $value_2, $value_3, $_POST['subcat_id']);
                    $this->htmlLayoutProduct($listProduct);
                } else {
                    $listProduct = $productModel->productFilter($_POST['category_id'], $value_1, $value_2, $value_3);
                    $this->htmlLayoutProduct($listProduct);
                }
            }
        }

        function htmlLayoutProduct($listProduct) {
            if ($listProduct != null) {
                foreach ($listProduct as $row) {
                    $newPriceF = number_format($row['new_price'], 0, ',', '.');
                    $initialPriceF = number_format($row['initial_price'], 0, ',', '.');
                    $numRand = rand(11, 399);
                    echo '
                    <div class="product-item">
                        <a href="./Products/ProductDetail/'.$row['product_id'].'">
                            <div class="product-img">
                                <img src="' . $row['product_image'] . '" alt="">
                            </div>
                            <h5>' . $row['product_name'] . '</h5>
                            <div class="item-txt-online">
                                <img src="./public/img/icon/tai_xuong.png" alt="">
                                <span>Online giá rẻ quá</span>
                            </div>';
                    if ($row['discount'] > 0) {
                        echo '
                            <div class="old-price">
                                <del>' . $initialPriceF . '<sup>₫</sup></del>
                                <span>-' . $row['discount'] . '%</span>
                            </div>
                            <div class="price">
                                ' . $newPriceF . '<sup>₫</sup>
                            </div>';
                    } else {
                        echo '
                            <div class="price">
                                ' . $newPriceF . '<sup>₫</sup>
                            </div>';
                    }
                    echo '
                            <div class="star">
                                <div>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                </div>
                                <span>' . $numRand . '</span>
                            </div>
                        </a>
                    </div>';
                }
            } else {
                echo "<h3>Không có kết quá!</h3>";
            }
        }

        function productDetail($product_id = null) {
            $productModel = $this->model('ProductsModels');
            $categoriesModel = $this->model('CategoriesModels');
            $listCategories = $categoriesModel->selectCategories();
            if (isset($product_id)) {
                $productModel->viewUpdate($product_id);
                $productDetail = $productModel->selectProductId($product_id);
                $listImages = $productModel->selectLibary($product_id);
                $similarProduct = $productModel->similarProduct($product_id, $productDetail['category_id'], $productDetail['subcat_id']);
                $otherProduct = $productModel->otherProduct($productDetail['category_id']); 
                $this->view('customer/products/productDetail', 
                            [
                                'listCategories' => $listCategories,
                                'productDetail' => $productDetail,
                                'listImages' => $listImages,
                                'similarProduct' => $similarProduct,
                                'otherProduct' => $otherProduct
                            ]);
            }else {
                header('Location: ../');
            }
        }
    }
?>