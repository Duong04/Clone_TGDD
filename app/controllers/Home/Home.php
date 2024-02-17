<?php 
    class Home extends Controller {
        public function index() {
            $productModel = $this->model('ProductsModels');
            $categoriesModel = $this->model('CategoriesModels');
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
                            'listProductClockDicount' =>$listProductClockDicount,
                            'listProductHp' => $listProductHp,
                            'listProductRand' => $listProductRand,
                            'listLaptopGaming' => $listLaptopGaming,
                            'listTablet' => $listTablet
                        ]);
        }

    }
?>
