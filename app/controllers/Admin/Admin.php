<?php 
    class Admin extends Controller {
        public function index() {
            header("Location: ./Admin/Dashboard");
        }

        // public function Notification
        private function showSuccessMessage($message) {
            echo "<script>
                Swal.fire({
                    title: 'Thành công!',
                    text: '$message',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1000
                });
            </script>";
        }
    
        private function showInfoMessage($message) {
            echo "<script>
                Swal.fire({
                    title: 'Cảnh báo!',
                    text: '$message',
                    icon: 'info',
                    timer: 3000,
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown animate__faster'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutDown animate__faster'
                    }
                });
            </script>";
        }
        // -----------------------------
        public function dashboard() {
            $userModels = $this->model('UserModels');
            $statistical = $this->model('Statistical');
            $user = $userModels->selectId($_SESSION['user_id']);
            $orderToday = $statistical->orderToday();
            $orderYesterday = $statistical->orderYesterday();
            $monthlyOrder = $statistical->monthlyOrder();
            $lastMonthOrder = $statistical->lastMonthOrder();
            $allOrders = $statistical->allOrders();
            $totalOrders = $statistical->totalOrders();
            $orderConfirmation = $statistical->orderConfirmation();
            $orderShipping = $statistical->orderShipping(); 
            $orderDelivered = $statistical->orderDelivered();
            $statisticalProduct = $statistical->statisticalProduct();
            $statisticalProductsView = $statistical->statisticalProductsView();
            $this->view('admin/layouts/layoutAdmin', 
                        [
                            'page' => 'dashboard/dashboard', 
                            'user' => $user,
                            'orderToday' => $orderToday,
                            'orderYesterday' => $orderYesterday,
                            'monthlyOrder' => $monthlyOrder,
                            'lastMonthOrder' => $lastMonthOrder,
                            'allOrders' => $allOrders,
                            'totalOrders' => $totalOrders,
                            'orderConfirmation' => $orderConfirmation,
                            'orderShipping' => $orderShipping,
                            'orderDelivered' => $orderDelivered,
                            'statisticalProduct' => $statisticalProduct,
                            'statisticalProductsView' => $statisticalProductsView
                        ]);
        }
    
        // ---------------- Categories -----------------------
    
        public function listCategories() {
            $categoriesModels = $this->model('CategoriesModels');
            $userModels = $this->model('UserModels');
            $user = $userModels->selectId($_SESSION['user_id']);
            $rows = $categoriesModels->selectCategories();
            $this->view('admin/layouts/layoutAdmin', ['page'=>'categories/list', 'rows'=>$rows, 'user'=>$user]);
        }
    
        public function addCategory() {
            $userModels = $this->model('UserModels');
            $user = $userModels->selectId($_SESSION['user_id']);
            $this->view('admin/layouts/layoutAdmin', ['page'=>'categories/add', 'user'=>$user]);
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                $this->processAddCategory();
            }
        }
    
        public function processAddCategory() {
            $categoriesModels = $this->model('CategoriesModels');
            $name = $_POST['category-name'];
            $user_id = $_SESSION['user_id'];
    
            $checkName = $categoriesModels->selectCategoryName($name);
            if ($checkName == null) {
                $query = $categoriesModels->addCategory($name, $user_id);
    
                if ($query) {
                    $this->showSuccessMessage('Thêm thành công');
                }
            } else {
                $this->showInfoMessage('Tên danh mục đã tồn tại');
            }
        }
    
        public function deleteCategories() {
            if (isset($_POST['id'])) {
                $model = $this->model('CategoriesModels');
                $id = $_POST['id'];
                $result = $model->deleteCategories($id);
                if ($result) {
                    echo "true"; 
                }
            }
        }
    
        public function updateCategory($id=null) {
            $categoriesModels = $this->model('CategoriesModels');
            $userModels = $this->model('UserModels');
            $user = $userModels->selectId($_SESSION['user_id']);
            if (isset($id)) {
                $row = $categoriesModels->selectCategoryId($id);
            }
            $this->view('admin/layouts/layoutAdmin', ['page'=>'categories/update', 'row'=>$row, 'user'=>$user]);
        }
    
        public function handleCategory() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                $this->processUpdateCategory();
            }else {
                header("Location: ../Admin/ListCategories");
            }
        }
    
        public function processUpdateCategory() {
            $categoriesModels = $this->model('CategoriesModels');
            $userModels = $this->model('UserModels');
            $user = $userModels->selectId($_SESSION['user_id']);
            $name = $_POST['category-name'];
            $user_id = $_SESSION['user_id'];
            $id = $_POST['id'];
        
            $checkId = $categoriesModels->selectCategoryId($id);
            $checkName = $categoriesModels->selectCategoryName($name);
            if ($checkName == null || $checkId['category_name'] == $name) {
                $query = $categoriesModels->updateCategory($name, $user_id, $id);
                $rows = $categoriesModels->selectCategories();
                $this->view('admin/layouts/layoutAdmin', ['page'=>'categories/list', 'rows'=>$rows, 'user'=>$user]);
                if ($query) {
                    $this->showSuccessMessage('Cập nhật thành công');
                }
            } else {
                $row = $categoriesModels->selectCategoryId($id);
                $this->view('admin/layouts/layoutAdmin', ['page'=>'categories/update', 'row'=>$row, 'user'=>$user]);
                $this->showInfoMessage('Tên danh mục đã tồn tại');
            }
        }

        // ------------------Subcategories
        public function subcategories($category_id=null) {
            $subcategoriesModels = $this->model('SubcategoriesModels');
            $userModels = $this->model('UserModels');
            $user = $userModels->selectId($_SESSION['user_id']);
            if (isset($category_id)) {
                $rows = $subcategoriesModels->selectSubcategories($category_id);
            }

            if (isset($_POST['category_id'])) {
                $lists = $subcategoriesModels->selectSubcategories($_POST['category_id']);
                foreach ($lists as $list) {
                    echo "<option value='".$list['subcat_id']."'>".$list['subcat_name']."</option>";
                }
            }

            $this->view('admin/layouts/layoutAdmin',
                    ['page'=>'subcategories/list',
                    'category_id'=>$category_id,
                    'rows'=>$rows,
                    'user'=>$user
                ]);
        }

        public function addSubcat($category_id) {
            $userModels = $this->model('UserModels');
            $user = $userModels->selectId($_SESSION['user_id']);
            $this->view('admin/layouts/layoutAdmin',
                    ['page'=>'subcategories/add',
                    'category_id'=>$category_id,
                    'user'=>$user
                ]);
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                $this->processAddSubcat($category_id);
            }
        }

        public function processAddSubcat($category_id) {
            $subcategoriesModels = $this->model('SubcategoriesModels');
            $name = $_POST['name'];
            $image = $_FILES['image']['name'];
            $user_id = $_SESSION['user_id'];
            $targetDir = './public/img/subcategories/';
            $targetFile = $targetDir . basename($image);

            $checkName = $subcategoriesModels->selectSubName($name, $category_id);
            if ($checkName == null) {
                move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
                $query = $subcategoriesModels->addSubcategory($name, $targetFile, $category_id, $user_id);
                if ($query) {
                    $this->showSuccessMessage('Thêm thành công!');
                }
            }else {
                $this->showInfoMessage('Tên danh mục con đã tồn tại!');
            }
        }

        public function deleteSubcat() {
            $subcategoriesModels = $this->model('SubcategoriesModels');
            $id = $_POST['id'];
            if (isset($_POST['id'])) {
                $result = $subcategoriesModels->deleteSubcategory($id);;
                if ($result) {
                    echo "true"; 
                }
            }
        }

        public function updateSubcat($category_id, $subcat_id=null) {
            $subcategoriesModels = $this->model('SubcategoriesModels');
            $userModels = $this->model('UserModels');
            $user = $userModels->selectId($_SESSION['user_id']);
            if (isset($subcat_id)) {
                $row = $subcategoriesModels->selectSubcatId($subcat_id);
            }
            $this->view('admin/layouts/layoutAdmin',
                    ['page'=>'subcategories/update',
                    'category_id'=>$category_id,
                    'row'=>$row,
                    'user'=>$user
                ]);
        }

        public function handleSubcat($category_id) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                $this->processUpdateSubcat($category_id);
            }else {
                header("Location: ../Admin/Subcategories/$category_id");
            }
        }

        public function processUpdateSubcat($category_id) {
            $subcategoriesModels = $this->model('SubcategoriesModels');
            $userModels = $this->model('UserModels');
            $user = $userModels->selectId($_SESSION['user_id']);
            $name = $_POST['name'];
            $subcat_id = $_POST['subcat_id'];
            $user_id = $_SESSION['user_id'];
            $image = $_FILES['image']['name'];
            $targetDir = './public/img/subcategories/';
            $targetFile = $targetDir . basename($image);
            $checkId = $subcategoriesModels->selectSubcatId($subcat_id);
            $checkName = $subcategoriesModels->selectSubName($name, $category_id);

            if ($checkName == null || $checkId['subcat_name'] == $name) {
                move_uploaded_file($_FILES['image']['tmp_name'], $targetFile); 
                $query = $subcategoriesModels->updateSubcat($name, $targetFile, $user_id, $subcat_id, $image);
                $rows = $subcategoriesModels->selectSubcategories($category_id);
                $this->view('admin/layouts/layoutAdmin',
                    ['page'=>'subcategories/list',
                    'category_id'=>$category_id,
                    'rows'=>$rows,
                    'user'=>$user
                ]);
                
                if ($query) {
                    $this->showSuccessMessage('Cập nhật thành công!');
                }
            }else {
                $row = $subcategoriesModels->selectSubcatId($subcat_id);
                $this->view('admin/layouts/layoutAdmin',
                    ['page'=>'subcategories/update',
                    'category_id'=>$category_id,
                    'row'=>$row,
                    'user'=>$user
                ]);
                $this->showInfoMessage('Tên danh mục con đã tồn tại');
            }
        }

        //------------------- product ---------------------
        public function listProducts() {
            $productsModels = $this->model('ProductsModels');
            $userModels = $this->model('UserModels');
            $user = $userModels->selectId($_SESSION['user_id']);
            $rows = $productsModels->selectProducts();
            $this->view('admin/layouts/layoutAdmin',
                        ['page'=>'products/list',
                        'rows'=>$rows,
                        'user'=>$user
                    ]);
        }

        public function addProduct() {
            $categoriesModels = $this->model('CategoriesModels');
            $userModels = $this->model('UserModels');
            $user = $userModels->selectId($_SESSION['user_id']);
            $listCat = $categoriesModels->selectCategories();
            $this->view('admin/layouts/layoutAdmin',
                        ['page'=>'products/add',
                        'list'=>$listCat,
                        'user'=>$user
                    ]);
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                $this->processAddProduct();
            }
        }

        public function processAddProduct() {
            $productsModels = $this->model('ProductsModels');
            $name = $_POST['product_name'];
            $image = $_FILES['product_image']['name'];
            $listImage = $_FILES['library_image']['name'];
            $quantity = $_POST['product_quantity'];
            $price = $_POST['initial_price'];
            $discount = !empty($_POST['discount']) ? $_POST['discount'] : 0;
            $category_id = $_POST['category_id'];
            $subcat_id = $_POST['subcat_id'];
            $desc = $_POST['description'];
            $user_id = $_SESSION['user_id'];
            $countPrice = $price - ($price * ($discount / 100));
            $newPrice = $discount > 0 ? $countPrice : $price;
            $targetDir = './public/img/products/';
            $target_file = $targetDir . basename($image);

            $checkName = $productsModels->selectProductName($name, $subcat_id);

            if ($checkName == null) {
                move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file);
                $query = $productsModels->insertProduct($name, $target_file, $desc, $quantity, $price, $discount, $newPrice, $category_id, $subcat_id, $user_id);
                if ($query) {
                    foreach ($listImage as $key => $value) {
                        $target_file2 = $targetDir . basename($value);
                        move_uploaded_file($_FILES['library_image']['tmp_name'][$key], $target_file2);
                        $query2 = $productsModels->insertLibrary($target_file2, $query);
                        if ($query2) {
                            $this->showSuccessMessage('Thêm sản phẩm thành công!');
                        }
                    }
                }
            }else {
                $this->showInfoMessage('Tên sản phẩm đã tồn tại!');
            }
        }

        public function deleteProduct() {
            $productsModels = $this->model('ProductsModels');
            $id = $_POST['id'];
            if (isset($_POST['id'])) {
                $result = $productsModels->deleteProduct($id);
                if ($result) {
                    echo "true"; 
                }
            }
        }

        public function updateProduct($id=null) {
            $categoriesModels = $this->model('CategoriesModels');
            $userModels = $this->model('UserModels');
            $user = $userModels->selectId($_SESSION['user_id']);
            $listCat = $categoriesModels->selectCategories();
            $productsModels = $this->model('ProductsModels');
            if (isset($id)) {
                $row = $productsModels->selectProductId($id);
                $listImage = $productsModels->selectLibary($id);
            }
            $this->view('admin/layouts/layoutAdmin',
                        ['page'=>'products/update',
                        'row'=>$row,
                        'listImage'=>$listImage,
                        'list'=>$listCat, 
                        'user'=>$user
                    ]);
        }

        public function handleProduct() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                $this->processUpdateProduct();
            }else {
                header('Location: ../Admin/ListProducts');
            }   
        }

        public function processUpdateProduct() {
            $productsModels = $this->model('ProductsModels');
            $categoriesModels = $this->model('CategoriesModels');
            $userModels = $this->model('UserModels');
            $user = $userModels->selectId($_SESSION['user_id']);

            $product_id = $_POST['product_id'];
            $name = $_POST['product_name'];
            $image = $_FILES['product_image']['name'];
            $listImage = $_FILES['library_image']['name'];
            $quantity = $_POST['product_quantity'];
            $price = $_POST['initial_price'];
            $discount = !empty($_POST['discount']) ? $_POST['discount'] : 0;
            $category_id = $_POST['category_id'];
            $subcat_id = $_POST['subcat_id'];
            $desc = $_POST['description'];
            $user_id = $_SESSION['user_id'];
            $countPrice = $price - ($price * ($discount / 100));
            $newPrice = $discount > 0 ? $countPrice : $price;
            $targetDir = './public/img/products/';
            $target_file = $targetDir . basename($image);

            $checkId = $productsModels->selectProductId($product_id);
            $checkName = $productsModels->selectProductName($name, $subcat_id);

            if ($checkName == null || $checkId['product_name'] == $name) {
                move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file);
                $query = $productsModels->updateProduct($name, $target_file, $desc, $quantity, $price, $discount, $newPrice, $category_id, $subcat_id, $user_id, $product_id, $image);
                $rows = $productsModels->selectProducts();
                $this->view('admin/layouts/layoutAdmin',
                        ['page'=>'products/list',
                        'rows'=>$rows,
                        'user'=>$user
                    ]);
                if ($query) {
                    foreach ($listImage as $key => $value) {
                        if (is_uploaded_file($_FILES['library_image']['tmp_name'][$key])) {
                            $target_file2 = $targetDir . basename($value);
                            move_uploaded_file($_FILES['library_image']['tmp_name'][$key], $target_file2);
                            $existingImage = $productsModels->checkLibrary($product_id, $target_file2);
                            if ($existingImage == null) {
                                $query2 = $productsModels->insertLibrary($target_file2, $product_id);
                                if ($query2) {
                                    $this->showSuccessMessage('Cập nhật sản phẩm thành công!');
                                }
                            }else {
                                $this->showSuccessMessage('Cập nhật sản phẩm thành công!');
                            }
                        }else {
                            $this->showSuccessMessage('Cập nhật sản phẩm thành công!');
                        }
                    }
                            
                }
            }else {
                $listCat = $categoriesModels->selectCategories();
                $row = $productsModels->selectProductId($product_id);
                $listImage = $productsModels->selectLibary($product_id);
                $this->view('admin/layouts/layoutAdmin',
                        ['page'=>'products/update',
                        'row'=>$row,
                        'listImage'=>$listImage,
                        'list'=>$listCat,
                        'user'=>$user
                    ]);
                $this->showInfoMessage('Tên sản phẩm này đã tồn tại');
            }
        }

        // -------------- libraries -----------------
        public function listImage() {
            $productsModels = $this->model('ProductsModels');
            $userModels = $this->model('UserModels');
            $user = $userModels->selectId($_SESSION['user_id']);
            $rows = $productsModels->selectProducts();
            $this->view('admin/layouts/layoutAdmin',
                        ['page'=>'libraryImages/listProduct',
                        'rows'=>$rows, 
                        'user'=>$user
                    ]);
        }

        public function libraryImageDetail($id=null) {
            $productsModels = $this->model('ProductsModels');
            $userModels = $this->model('UserModels');
            $user = $userModels->selectId($_SESSION['user_id']);
            if (isset($id)) {
                $rows = $productsModels->selectLibary($id);
            }
            $this->view('admin/layouts/layoutAdmin',
                        ['page'=>'libraryImages/list',
                        'product_id'=>$id,
                        'rows'=>$rows, 
                        'user'=>$user]);
        }

        public function deleteImage() {
            $productsModels = $this->model('ProductsModels');
            $id = $_POST['id'];
            if (isset($_POST['id'])) {
                $result = $productsModels->deleteImage($id);
                if ($result) {
                    echo "true"; 
                }
            }
        }

        public function addImage($id) {
            $userModels = $this->model('UserModels');
            $user = $userModels->selectId($_SESSION['user_id']);
            $this->view('admin/layouts/layoutAdmin',
                        ['page'=>'libraryImages/add',
                        'product_id'=>$id, 
                        'user'=>$user]);
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                $this->processAddImage($id);
            }
        }

        public function processAddImage($id) {
            $productsModels = $this->model('ProductsModels');
            $targetDir = "./public/img/products/";
            $listImage = $_FILES['library_image']['name'];
            foreach ($listImage as $key => $value) {
                $target_file2 = $targetDir . basename($value);
                move_uploaded_file($_FILES['library_image']['tmp_name'][$key], $target_file2);
                $query2 = $productsModels->insertLibrary($target_file2, $id);
                if ($query2) {
                    $this->showSuccessMessage('Thêm ảnh thành công');
                }
            }
        }

        public function updateImage($id, $product_id) {
            $productsModels = $this->model('ProductsModels');
            $userModels = $this->model('UserModels');
            $user = $userModels->selectId($_SESSION['user_id']);
            $row = $productsModels->selecetLibraryId($id);
            $this->view('admin/layouts/layoutAdmin',
                        ['page'=>'libraryImages/update',
                        'product_id'=>$product_id,
                        'row'=>$row, 
                        'user'=>$user]);
        }

        public function handleImage($product_id) {
            if ($_SERVER['REQUEST_METHOD'] = 'POST' && isset($_POST['submit'])) {
                $this->processUpdateImage($product_id);
            }
        }

        public function processUpdateImage($product_id) {
            $productsModels = $this->model('ProductsModels');
            $userModels = $this->model('UserModels');
            $user = $userModels->selectId($_SESSION['user_id']);
            $image = $_FILES['image']['name'];
            $id = $_POST['image_id'];

            if ($image != '') {
                $targetDir = "./public/img/products/";
                $targetFile = $targetDir . basename($image);
                move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
                $query = $productsModels->updateImage($targetFile, $id);
                $rows = $productsModels->selectLibary($product_id);
                $this->view('admin/layouts/layoutAdmin',
                        ['page'=>'libraryImages/list',
                        'product_id'=>$product_id,
                        'rows'=>$rows, 
                        'user'=>$user]);
                if ($query) {
                    $this->showSuccessMessage('Cập nhật ảnh thành công');
                }
            }else {
                $rows = $productsModels->selectLibary($product_id);
                $this->view('admin/layouts/layoutAdmin',
                        ['page'=>'libraryImages/list',
                        'product_id'=>$product_id,
                        'rows'=>$rows, 
                        'user'=>$user]);
                $this->showSuccessMessage('Cập nhật ảnh thành công');
            }
        }

        public function listUsers() {
            $userModels = $this->model('UserModels');
            $user = $userModels->selectId($_SESSION['user_id']);
            $rows = $userModels->selectUsers();
            $this->view('admin/layouts/layoutAdmin',
                        ['page'=>'users/list', 
                        'rows'=>$rows,
                        'user'=>$user
                    ]);
        }

        public function addUser() {
            $userModels = $this->model('UserModels');
            $user = $userModels->selectId($_SESSION['user_id']);

            $this->view('admin/layouts/layoutAdmin',
            ['page'=>'users/add', 'user'=>$user]);

            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                $userName = $_POST['userName'];
                $email = $_POST['email'];
                $password = trim($_POST['password']);
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $status = $_POST['status'];
                $checkEmail = $userModels->selectEmail($email);
                
                if ($checkEmail == null) {
                    $query = $userModels->inserUsers2($userName, $email, $passwordHash, $status);
                    if ($query) {
                        $this->showSuccessMessage('Thêm tài khoản thành công!');
                    }
                }else {
                    $this->showInfoMessage('Email này đã tồn tại!');
                }
            }
        }

        public function updateRole() {
            $userModels = $this->model('UserModels');
            if (isset($_POST['id'], $_POST['role'])) {
                $query = $userModels->updateRole($_POST['role'],$_POST['id']);
                if ($query) {
                    echo $_POST['role'];
                }
            }
        }

        public function updateStatus() {
            $userModels = $this->model('UserModels');
            if (isset($_POST['id'], $_POST['status'])) {
                $query = $userModels->updateStatus($_POST['status'],$_POST['id']);
                if ($query) {
                    echo $_POST['status'];
                }
            }
        }

        // order
        public function listOrders() {
            $orderModel = $this->model('OrdersModels');
            $userModels = $this->model('UserModels');
            $user = $userModels->selectId($_SESSION['user_id']);
            $listOrders = $orderModel->selectOrders();
            $this->view('admin/layouts/layoutAdmin',
                        [
                            'page'=>'orders/list',
                            'listOrders'=>$listOrders,
                            'user'=>$user
                         ]);
        }

        public function listOrderDetails($order_id = null) {
            $orderModel = $this->model('OrdersModels');
            $userModels = $this->model('UserModels');
            $user = $userModels->selectId($_SESSION['user_id']);
            if (isset($order_id)) {
                $listOrderDetails = $orderModel->selectOrderDetail($order_id);
                $this->view('admin/layouts/layoutAdmin',
                        [
                            'page'=>'orders/listDetail',
                            'listOrderDetails'=>$listOrderDetails,
                            'user'=>$user
                         ]);
            }else {
                header('Location: ./Admin/ListOrders');
            }
        }

        public function updateOrderStatus() {
            $orderModel = $this->model('OrdersModels');
            if (isset($_POST['order_id'])) {
                $status = $_POST['status'];
                $order_id = $_POST['order_id'];
                $result = $orderModel->updateOrdersStatus($status, $order_id);
                if ($result) {
                    echo $status;
                }
            }
        }

        public function updateOrderStatus2() {
            $orderModel = $this->model('OrdersModels');
            if (isset($_POST['order_id'])) {
                $status = $_POST['status'];
                $order_id = $_POST['order_id'];
                $result = $orderModel->updateOrdersStatus($status, $order_id);
                $buttons = '<div>
                            <button disabled data-bs-toggle="tooltip" data-bs-placement="top" title="Xác nhận đơn hàng" class="btn btn-primary"><i class="fa-solid fa-user-check"></i></button>
                            <button disabled data-bs-toggle="tooltip" data-bs-placement="top" title="Chuẩn bị đơn hàng" class="btn btn-warning"><i class="fa-solid fa-user-clock"></i></button>
                            <button disabled data-bs-toggle="tooltip" data-bs-placement="top" title="Đang vận chuyển" class="btn btn-info"><i class="fa-solid fa-truck-fast"></i></button>
                            <button disabled data-bs-toggle="tooltip" data-bs-placement="top" title="Đã giao hàng" class="btn btn-success"><i class="fa-solid fa-truck-front"></i></button>
                            <button disabled data-bs-toggle="tooltip" data-bs-placement="top" title="Hủy đơn hàng" class="btn btn-danger"><i class="fa-solid fa-ban"></i></button>
                        </div>';
                if ($result) {
                    echo $buttons;
                }
            }
        }

    }
?>