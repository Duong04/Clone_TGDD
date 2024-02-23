<?php 
    class Home extends Controller {
        public function index() {
            $productModel = $this->model('ProductsModels');
            $categoriesModel = $this->model('CategoriesModels');
            $usersModel = $this->model('UserModels');
            
            if (isset($_SESSION['user_id'])) {
                $users = $usersModel->selectId($_SESSION['user_id']);
                if ($users['status'] == 'Vô hiệu hóa' || $users['status'] == 'Chưa kích hoạt') {
                    session_unset();

                    session_destroy();
                    header('Location: ./UserAuthentication/Login');
                }
            }
            $listCategories = $categoriesModel->selectCategories();
            $listProductDiscountest = $productModel->selectProductDiscountest();
            $listProductClockDicount = $productModel->selectProductClockDicount();
            $listProductHp = $productModel->selectProductHP();
            $listProductRand = $productModel->selectProductRand();
            $listLaptopGaming = $productModel->selectLaptopGaming();
            $listTablet = $productModel->selectTablet();
            $this->view('customer/home/home', 
                        [
                            'listCategories' => $listCategories,
                            'listProductDiscountest' => $listProductDiscountest,
                            'listProductClockDicount' => $listProductClockDicount,
                            'listProductHp' => $listProductHp,
                            'listProductRand' => $listProductRand,
                            'listLaptopGaming' => $listLaptopGaming,
                            'listTablet' => $listTablet,
                        ]);
        }

        public function search() {
            $productModel = $this->model('ProductsModels');
            $categoriesModel = $this->model('CategoriesModels');
            $usersModel = $this->model('UserModels');
            
            if (isset($_SESSION['user_id'])) {
                $users = $usersModel->selectId($_SESSION['user_id']);
                if ($users['status'] == 'Vô hiệu hóa' || $users['status'] == 'Chưa kích hoạt') {
                    session_unset();

                    session_destroy();
                    header('Location: ../UserAuthentication/Login');
                }
            }
            
            $listCategories = $categoriesModel->selectCategories();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['searchData'])) {
                    $data = $_POST['searchData'];
                    $searchResult = $productModel->selectProductLike($data);
                    $this->layoutHtmlSearch($searchResult);
                }else if (isset($_POST['submit'])) {
                    $data_2 = $_POST['search'];
                    $searchResult_2 = $productModel->selectProductLike_2($data_2);
                    $this->view('customer/home/search', 
                    [
                        'listCategories' => $listCategories,
                        'listSearchResult' => $searchResult_2,
                    ]);
                }
            }else {
                header('Location: ../');
            }
        }

        public function layoutHtmlSearch($searchResult) {
            if ($searchResult != null) {
                echo '<h6>Sản phẩm gợi ý</h6>';
                foreach ($searchResult as $row) {
                    echo '<div class="search-data-item">
                            <a href="./Products/ProductDetail/'.$row['product_id'].'">
                                <div class="img-item">
                                    <img src="'.$row['product_image'].'" alt="">
                                </div>
                                <div class="search-info">
                                    <p>'.$row['product_name'].'</p>
                                    <div class="b-price">
                                        <span>'.number_format($row['new_price'], 0, ',', '.').'₫</span>';
                    if ($row['discount'] > 0) {
                                    echo '<del>'.number_format($row['initial_price'], 0, ',', '.').'₫</del>
                                    <span>-'.$row['discount'].'%</span></div>
                                    </div>
                                </a>
                            </div>';
                    }else {
                        echo '</div>
                                </div>
                            </a>
                        </div>';
                    }
                }
            }else {
                echo '<h6>Sản phẩm gợi ý</h6>';
                echo '<p>Không tìm thấy kết quả!</p>';
            }
        }

    }
?>
