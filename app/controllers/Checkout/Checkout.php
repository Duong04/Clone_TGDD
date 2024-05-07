<?php 
    class Checkout extends Controller {
        protected $listCategories;

        public function __construct() {
            $categoriesModel = $this->model('CategoriesModels');
            $this->listCategories = $categoriesModel->selectCategories();
        }
        public function index() {
            $ordersModels = $this->model('OrdersModels');
            $productsModels = $this->model('ProductsModels');
            $usersModels = $this->model('UserModels'); 

            $user_id = $_SESSION['user_id'];
            $infoUser = $usersModels->selectId($user_id);

            $cart = json_decode($_COOKIE['cart'], true);

            if (!isset($_SESSION['user_id'])) {
                header('Location: ./UserAuthentication/Login');
            }else if (empty($cart)) {
                header('Location: ./Cart');
            }
    


            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['submit'])) {
                    $userName = $_POST['user_name'];
                    $phone = $_POST['phone'];
                    $address = $_POST['address'];
                    $cart = json_decode($_COOKIE['cart'], true);

                    $totalPrice = 0;

                    foreach($cart as $row) {
                        $total = $row['new_price'] * $row['quantity'];
                        $totalPrice += $total;
                    }

                    if ($totalPrice > 0) {
                        $shippingFee = $totalPrice > 10000000 ? 0 : 50000;
                        $insertOrder = $ordersModels->insertOrder($user_id, $totalPrice, $shippingFee);
                        if ($insertOrder) {
                            foreach ($cart as $row) {
                                $product_id = $row['product_id'];
                                $quantity = $row['quantity'];
                                $price = $row['new_price'];

                                $queryProduct = $productsModels->selectPId($product_id);

                                if ($quantity > $queryProduct['product_quantity']) {
                                    $quantity = $queryProduct['product_quantity'];
                                }

                                $insertOrderDetails = $ordersModels->insertOrderDetails($insertOrder, $product_id, $quantity, $price);
                                if ($insertOrderDetails) {
                                    $productsModels->updateQuantity($product_id, $quantity);
                                    $usersModels->updateUser($userName, $phone, $address, $user_id);
                                    $expire = time() - (90 * 24 * 3600);
                                    setcookie('cart', json_encode($cart), $expire, '/');
                                    header("Location: ./Checkout/Thanks");
                                }
                            }
                        }
                    }
                }
            }

            $cart = json_decode($_COOKIE['cart'], true);
            $this->view('customer/checkout/checkout',
                        [
                            'cart' => $cart,
                            'listCategories' => $this->listCategories,
                            'infoUser' => $infoUser,
                        ]);
        }

        public function thanks() {
            $this->view('customer/checkout/thanks',
            [
                'listCategories' => $this->listCategories,
            ]);
        }
    }
?>