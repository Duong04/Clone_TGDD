<?php 
    class InfoUsers extends Controller {
        public function index() {
            header('Location: ./InfoUsers/Profile');
        }

        public function profile() {
            $model = $this->model('UserModels');
            $categoriesModel = $this->model('CategoriesModels');
            $listCategories = $categoriesModel->selectCategories();
            if (isset($_SESSION['user_id'])) {
                $user_id = $_SESSION['user_id'];
                $row = $model->selectId($user_id);
                $this->view('customer/infoUsers/profile', 
                                ['listCategories'=> $listCategories,
                                'row'=>$row],
                            );
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if (isset($_POST['submit'])) {
                        $userName = $_POST['userName'];
                        $phone = $_POST['phone'];
                        $address = $_POST['address'];
                        $image = $_FILES['user-image']['name'];
                        $target_dir = './public/img/users/';
                        $target_file = $target_dir . basename($image);
                        move_uploaded_file($_FILES['user-image']['tmp_name'], $target_file);
                        $query = $model->updateInfoUser($userName, $phone, $address, $image, $target_file, $user_id);
                        if ($query) {
                            echo "<script>
                                    Swal.fire({
                                        title: 'Thành công!',
                                        text: 'Cập nhật thành công',
                                        icon: 'success',
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                    setTimeout(function() {
                                        window.location.href = './InfoUsers';
                                    },800);
                                </script>";
                        }
                    }
                }
            }else {
                header('Location: ../UserAuthentication/Login');
                exit();
            }
        }

        public function orders($status = null, $order_id = null) {
            $model = $this->model('UserModels');
            $categoriesModel = $this->model('CategoriesModels');
            $ordersModel = $this->model('OrdersModels');

            $listCategories = $categoriesModel->selectCategories();
            if (isset($_SESSION['user_id'])) {
                $user_id = $_SESSION['user_id'];
                $confirmation = $ordersModel->selectOrdersWithStatus('Chờ xác nhận', $user_id);
                $confirmed = $ordersModel->selectOrdersWithStatus('Đã xác nhận', $user_id);
                $preparingOrder = $ordersModel->selectOrdersWithStatus('Chuẩn bị đơn hàng', $user_id);
                $shipping = $ordersModel->selectOrdersWithStatus('Đang vận chuyển', $user_id);
                $delivered = $ordersModel->selectOrdersWithStatus('Đã giao hàng', $user_id);
                $cancelled = $ordersModel->selectOrdersWithStatus('Đã hủy', $user_id); 
                $row = $model->selectId($user_id);

                if ($row['status'] == 'Vô hiệu hóa' || $row['status'] == 'Chưa kích hoạt') {
                    session_unset();

                    session_destroy();
                    header('Location: ../UserAuthentication/Login');
                }
                
                $this->view('customer/infoUsers/orders',
                            [
                                'confirmation' => $confirmation,
                                'confirmed' => $confirmed,
                                'preparingOrder' => $preparingOrder,
                                'shipping' => $shipping,
                                'delivered' => $delivered,
                                'cancelled' => $cancelled,
                                'listCategories'=> $listCategories,
                                'row'=>$row
                            ]);
                if (isset($status, $order_id)) {
                    $this->updateOrder($status, $order_id);
                    echo '<script>
                            Swal.fire({
                            title: "Thành công!",
                            icon: "success",
                            timer: 1000
                            });
                            setTimeout(function() {
                                window.location.href = "./InfoUsers/Orders";
                            },800);
                        </script>';
                }
            }else {
                header('Location: ../UserAuthentication/Login');
                exit();
            }
        }

        public function updateOrder($status, $order_id) {
            $ordersModel = $this->model('OrdersModels');
            $productsModels = $this->model('ProductsModels');
            if ($status == 'cancelled') {
                $listOrderDetails = $ordersModel->selectOrderDetail_2($order_id);
                foreach ($listOrderDetails as $row) {
                    $quantity = $row['quantity'];
                    $productsModels->updateQuantity_2($row['product_id'], $quantity);
                }
                $ordersModel->updateOrdersStatus('Đã hủy', $order_id);
            }else if ($status == 'repurchase') {
                $listOrderDetails = $ordersModel->selectOrderDetail_2($order_id);
                foreach ($listOrderDetails as $row) {
                    $quantity = $row['quantity'];
                    $productsModels->updateQuantity($row['product_id'], $quantity);
                }
                $ordersModel->updateOrdersStatus('Chờ xác nhận', $order_id);
            }else if ($status == 'deleteHistory') {
                $ordersModel->deleteOrder($order_id);
            }
        }

        public function orderDetail($order_id) {
            $model = $this->model('UserModels');
            $categoriesModel = $this->model('CategoriesModels');
            $ordersModel = $this->model('OrdersModels');

            $listCategories = $categoriesModel->selectCategories();
            if (isset($_SESSION['user_id'])) {
                echo $order_id;
                $user_id = $_SESSION['user_id'];
                $listOrderDetail = $ordersModel->selectOrderDetail($order_id);
                $row = $model->selectId($user_id);
                $this->view('customer/infoUsers/orderDetail',
                            [
                                'listCategories'=> $listCategories,
                                'row'=>$row,
                                'listOrderDetail'=>$listOrderDetail
                            ]);
            }else {
                header('Location: ../../UserAuthentication/Login');
                exit();
            }
        }

        public function logout() {
            session_unset();

            session_destroy();
            
            header('Location: ../UserAuthentication/Login');
            exit();
        }
    }
?>