<?php 
    class Cart extends Controller {
        public function index() {
            $cookieCart = isset($_COOKIE['cart']) ? $_COOKIE['cart'] : null;
            $cart = json_decode($cookieCart, true);
        
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
                    $product_id = $_POST['product_id'];
                    $new_quantity = $_POST['quantity'];
                    if (isset($_COOKIE['cart'])) {
                        
                        $cart = json_decode($_COOKIE['cart'], true);
            
                        // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng không
                        if (isset($cart[$product_id])) {
                            // Cập nhật số lượng của sản phẩm trong giỏ hàng
                            $cart[$product_id]["quantity"] = $new_quantity;
            
                            // Cập nhật lại cookie giỏ hàng với thông tin đã cập nhật
                            setcookie('cart', json_encode($cart), time() + (90 * 24 * 3600), '/');
                            echo json_encode($this->calculateCartTotal($cart, $product_id));
                            exit;
                        }
                    }
                }

                if (isset($_POST['submit'])) {
                    // Lấy thông tin sản phẩm từ form
                    $product_id = $_POST['product_id'];
                    $product_name = $_POST['product_name'];
                    $product_image = $_POST['product_image'];
                    $new_price = $_POST['new_price'];
                    
                    // Số lượng sản phẩm mặc định
                    $quantity = 1;
        
                    // Kiểm tra xem giỏ hàng đã có dữ liệu từ cookie chưa
                    if (isset($_COOKIE['cart'])) {
                        // Nếu có, lấy dữ liệu từ cookie và chuyển đổi thành mảng PHP
                        $cart = json_decode($_COOKIE['cart'], true);
                    }
        
                    // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
                    if (isset($cart[$product_id])) {
                        // Nếu có, tăng số lượng sản phẩm lên
                        $cart[$product_id]['quantity'] += $quantity;
                    } else {
                        // Nếu chưa, thêm sản phẩm vào giỏ hàng
                        $cart_item = array(
                            'product_id' => $product_id,
                            'product_name' => $product_name,
                            'product_image' => $product_image,
                            'new_price' => $new_price,
                            'quantity' => $quantity
                        );
        
                        $cart[$product_id] = $cart_item;
                    }
        
                    // Lưu giỏ hàng vào cookie
                    $expire = time() + (90 * 24 * 3600);
                    setcookie('cart', json_encode($cart), $expire, '/');
                }
            }
        
            $categoriesModel = $this->model('CategoriesModels');
            $usersModel = $this->model('UserModels');
            $listCategories = $categoriesModel->selectCategories();
            
            if (isset($_SESSION['user_id'])) {
                $users = $usersModel->selectId($_SESSION['user_id']);
                if ($users['status'] == 'Vô hiệu hóa' || $users['status'] == 'Chưa kích hoạt') {
                    session_unset();

                    session_destroy();
                    header('Location: ../UserAuthentication/Login');
                }
            }

            $this->view('customer/Cart/Cart', 
                        [
                            'cart' => $cart,
                            'listCategories' => $listCategories,
                        ]);
        }

        public function calculateCartTotal($cart, $product_id) {
            $newSubTotal = 0;
            foreach ($cart as $row) {
                $totalPrice = $row['new_price'] * $row['quantity'];
                $newSubTotal += $totalPrice;
            }
            $newSubTotalF = number_format($newSubTotal, 0, ',', '.');
        
            $newTotalPrice = $cart[$product_id]["quantity"] * $cart[$product_id]["new_price"];
            $newTotalPriceF = number_format($newTotalPrice, 0, ',', '.');
        
            return ["newTotalPrice" => $newTotalPriceF . "<sup>₫</sup>", 'totalPrice' => $newSubTotalF . "<sup>₫</sup>"];
        }

        public function removeCart() {
            if (isset($_POST['product_id'])) {
                $product_id = $_POST['product_id'];
                if (isset($_COOKIE['cart'])) {
                    // Lấy dữ liệu giỏ hàng từ cookie
                    $cart = json_decode($_COOKIE['cart'], true);
        
                    if (isset($cart[$product_id])) {
                        unset($cart[$product_id]);
                        
                        $updated_cart_json = json_encode($cart);
                        setcookie('cart', $updated_cart_json, time() + (90 * 24 * 3600), '/');
                        
                        $subtotal = $this->calculateSubtotal($cart);
        
                        echo number_format($subtotal, 0, ',', '.')."<sup>₫</sup>";
                    }
                }
            }
        }
        
        public function calculateSubtotal($cart) {
            $subtotal = 0;
            foreach ($cart as $row) {
                $totalPrice = $row['new_price'] * $row['quantity'];
                $subtotal += $totalPrice;
            }
            return $subtotal;
        }
    }
?>