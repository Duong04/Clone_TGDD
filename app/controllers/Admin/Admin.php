<?php 
    class Admin extends Controller {
        function index() {
            $this->view('admin/layouts/layoutAdmin', ['page'=>'dashboard/dashboard']);
        }

        // function Notification
        function showSuccessMessage($message) {
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
    
        function showInfoMessage($message) {
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
    
        // ---------------- Categories -----------------------
    
        function listCategories() {
            $model = $this->model('CategoriesModels');
            $rows = $model->selectCategories();
            $this->view('admin/layouts/layoutAdmin', ['page'=>'categories/list', 'rows'=>$rows]);
        }
    
        function addCategory() {
            $this->view('admin/layouts/layoutAdmin', ['page'=>'categories/add']);
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                $this->processAddCategory();
            }
        }
    
        function processAddCategory() {
            $model = $this->model('CategoriesModels');
            $name = $_POST['category-name'];
            $user_id = $_SESSION['user_id'];
    
            $checkName = $model->selectCategoryName($name);
            if ($checkName == null) {
                $query = $model->addCategory($name, $user_id);
    
                if ($query) {
                    $this->showSuccessMessage('Thêm thành công');
                }
            } else {
                $this->showInfoMessage('Tên danh mục đã tồn tại');
            }
        }
    
        function deleteCategories() {
            if (isset($_POST['id'])) {
                $model = $this->model('CategoriesModels');
                $id = $_POST['id'];
                $result = $model->deleteCategories($id);
                if ($result) {
                    echo "true"; 
                }
            }
        }
    
        function updateCategory($id=null) {
            $model = $this->model('CategoriesModels');
            if (isset($id)) {
                $row = $model->selectCategoryId($id);
            }
            $this->view('admin/layouts/layoutAdmin', ['page'=>'categories/update', 'row'=>$row]);
        }
    
        function handleCategory() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                $this->processUpdateCategory();
            }else {
                header("Location: ../Admin/ListCategories");
            }
        }
    
        function processUpdateCategory() {
            $model = $this->model('CategoriesModels');
            $name = $_POST['category-name'];
            $user_id = $_SESSION['user_id'];
            $id = $_POST['id'];
        
            $checkId = $model->selectCategoryId($id);
            $checkName = $model->selectCategoryName($name);
            if ($checkName == null || $checkId['category_name'] == $name) {
                $query = $model->updateCategory($name, $user_id, $id);
                $rows = $model->selectCategories();
                $this->view('admin/layouts/layoutAdmin', ['page'=>'categories/list', 'rows'=>$rows]);
                if ($query) {
                    $this->showSuccessMessage('Cập nhật thành công');
                }
            } else {
                $row = $model->selectCategoryId($id);
                $this->view('admin/layouts/layoutAdmin', ['page'=>'categories/update', 'row'=>$row]);
                $this->showInfoMessage('Tên danh mục đã tồn tại');
            }
        }

        // ------------------Subcategories
        function subcategories($category_id=null) {
            $model = $this->model('SubcategoriesModels');
            if (isset($category_id)) {
                $rows = $model->selectSubcategories($category_id);
            }

            if (isset($_POST['category_id'])) {
                $lists = $model->selectSubcategories($_POST['category_id']);
                foreach ($lists as $list) {
                    echo "<option value='".$list['subcat_id']."'>".$list['subcat_name']."</option>";
                }
            }

            $this->view('admin/layouts/layoutAdmin',
                    ['page'=>'subcategories/list',
                    'category_id'=>$category_id,
                    'rows'=>$rows]);
        }

        function addSubcat($category_id) {
            $this->view('admin/layouts/layoutAdmin',
                    ['page'=>'subcategories/add',
                    'category_id'=>$category_id]);
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                $this->processAddSubcat($category_id);
            }
        }

        function processAddSubcat($category_id) {
            $model = $this->model('SubcategoriesModels');
            $name = $_POST['name'];
            $image = $_FILES['image']['name'];
            $user_id = $_SESSION['user_id'];
            $targetDir = './public/img/subcategories/';
            $targetFile = $targetDir . basename($image);

            $checkName = $model->selectSubName($name, $category_id);
            if ($checkName == null) {
                move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
                $query = $model->addSubcategory($name, $targetFile, $category_id, $user_id);
                if ($query) {
                    $this->showSuccessMessage('Thêm thành công!');
                }
            }else {
                $this->showInfoMessage('Tên danh mục con đã tồn tại!');
            }
        }

        function deleteSubcat() {
            $model = $this->model('SubcategoriesModels');
            $id = $_POST['id'];
            if (isset($_POST['id'])) {
                $result = $model->deleteSubcategory($id);;
                if ($result) {
                    echo "true"; 
                }
            }
        }

        function updateSubcat($category_id, $subcat_id=null) {
            $model = $this->model('SubcategoriesModels');
            if (isset($subcat_id)) {
                $row = $model->selectSubcatId($subcat_id);
            }
            $this->view('admin/layouts/layoutAdmin',
                    ['page'=>'subcategories/update',
                    'category_id'=>$category_id,
                    'row'=>$row]);
        }

        function handleSubcat($category_id) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                $this->processUpdateSubcat($category_id);
            }else {
                header("Location: ../Admin/Subcategories/$category_id");
            }
        }

        function processUpdateSubcat($category_id) {
            $model = $this->model('SubcategoriesModels');
            $name = $_POST['name'];
            $subcat_id = $_POST['subcat_id'];
            $user_id = $_SESSION['user_id'];
            $image = $_FILES['image']['name'];
            $targetDir = './public/img/subcategories/';
            $targetFile = $targetDir . basename($image);
            $checkId = $model->selectSubcatId($subcat_id);
            $checkName = $model->selectSubName($name, $category_id);

            if ($checkName == null || $checkId['subcat_name'] == $name) {
                move_uploaded_file($_FILES['image']['tmp_name'], $targetFile); 
                $query = $model->updateSubcat($name, $targetFile, $user_id, $subcat_id, $image);
                $rows = $model->selectSubcategories($category_id);
                $this->view('admin/layouts/layoutAdmin',
                    ['page'=>'subcategories/list',
                    'category_id'=>$category_id,
                    'rows'=>$rows]);
                
                if ($query) {
                    $this->showSuccessMessage('Cập nhật thành công!');
                }
            }else {
                $row = $model->selectSubcatId($subcat_id);
                $this->view('admin/layouts/layoutAdmin',
                    ['page'=>'subcategories/update',
                    'category_id'=>$category_id,
                    'row'=>$row]);
                $this->showInfoMessage('Tên danh mục con đã tồn tại');
            }
        }

        //------------------- product ---------------------
        function listProducts() {
            $model = $this->model('ProductsModels');
            $rows = $model->selectProducts();
            $this->view('admin/layouts/layoutAdmin',
                        ['page'=>'products/list',
                        'rows'=>$rows]);
        }

        function addProduct() {
            $model2 = $this->model('CategoriesModels');
            $listCat = $model2->selectCategories();
            $this->view('admin/layouts/layoutAdmin',
                        ['page'=>'products/add',
                        'list'=>$listCat]);
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                $this->processAddProduct();
            }
        }

        function processAddProduct() {
            $model = $this->model('ProductsModels');
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
            $newPrice = $discount > 0 ? $countPrice : 0;
            $targetDir = './public/img/products/';
            $target_file = $targetDir . basename($image);

            $checkName = $model->selectProductName($name, $subcat_id);

            if ($checkName == null) {
                move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file);
                $query = $model->insertProduct($name, $target_file, $desc, $quantity, $price, $discount, $newPrice, $category_id, $subcat_id, $user_id);
                if ($query) {
                    foreach ($listImage as $key => $value) {
                        $target_file2 = $targetDir . basename($value);
                        move_uploaded_file($_FILES['library_image']['tmp_name'][$key], $target_file2);
                        $query2 = $model->insertLibrary($target_file2, $query);
                        if ($query2) {
                            $this->showSuccessMessage('Thêm sản phẩm thành công!');
                        }
                    }
                }
            }else {
                $this->showInfoMessage('Tên sản phẩm đã tồn tại!');
            }
        }

        function deleteProduct() {
            $model = $this->model('ProductsModels');
            $id = $_POST['id'];
            if (isset($_POST['id'])) {
                $result = $model->deleteProduct($id);
                if ($result) {
                    echo "true"; 
                }
            }
        }

        function updateProduct($id=null) {
            $model2 = $this->model('CategoriesModels');
            $listCat = $model2->selectCategories();
            $model = $this->model('ProductsModels');
            if (isset($id)) {
                $row = $model->selectProductId($id);
                $listImage = $model->selectLibary($id);
            }
            $this->view('admin/layouts/layoutAdmin',
                        ['page'=>'products/update',
                        'row'=>$row,
                        'listImage'=>$listImage,
                        'list'=>$listCat]);
        }

        function handleProduct() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                $this->processUpdateProduct();
            }else {
                header('Location: ../Admin/ListProducts');
            }   
        }

        function processUpdateProduct() {
            $model = $this->model('ProductsModels');
            $model2 = $this->model('CategoriesModels');

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
            $newPrice = $discount > 0 ? $countPrice : 0;
            $targetDir = './public/img/products/';
            $target_file = $targetDir . basename($image);

            $checkId = $model->selectProductId($product_id);
            $checkName = $model->selectProductName($name, $subcat_id);

            if ($checkName == null || $checkId['product_name'] == $name) {
                move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file);
                $query = $model->updateProduct($name, $target_file, $desc, $quantity, $price, $discount, $newPrice, $category_id, $subcat_id, $user_id, $product_id, $image);
                $rows = $model->selectProducts();
                $this->view('admin/layouts/layoutAdmin',
                        ['page'=>'products/list',
                        'rows'=>$rows]);
                if ($query) {
                    foreach ($listImage as $key => $value) {
                        if (is_uploaded_file($_FILES['library_image']['tmp_name'][$key])) {
                            $target_file2 = $targetDir . basename($value);
                            move_uploaded_file($_FILES['library_image']['tmp_name'][$key], $target_file2);
                            $existingImage = $model->checkLibrary($product_id, $target_file2);
                            if ($existingImage == null) {
                                $query2 = $model->insertLibrary($target_file2, $product_id);
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
                $listCat = $model2->selectCategories();
                $row = $model->selectProductId($product_id);
                $listImage = $model->selectLibary($product_id);
                $this->view('admin/layouts/layoutAdmin',
                        ['page'=>'products/update',
                        'row'=>$row,
                        'listImage'=>$listImage,
                        'list'=>$listCat]);
                $this->showInfoMessage('Tên sản phẩm này đã tồn tại');
            }
        }

        // -------------- libraries -----------------
        function listImage() {
            $model = $this->model('ProductsModels');
            $rows = $model->selectProducts();
            $this->view('admin/layouts/layoutAdmin',
                        ['page'=>'libraryImages/listProduct',
                        'rows'=>$rows]);
        }

        function libraryImageDetail($id=null) {
            $model = $this->model('ProductsModels');
            if (isset($id)) {
                $rows = $model->selectLibary($id);
            }
            $this->view('admin/layouts/layoutAdmin',
                        ['page'=>'libraryImages/list',
                        'product_id'=>$id,
                        'rows'=>$rows]);
        }

        function deleteImage() {
            $model = $this->model('ProductsModels');
            $id = $_POST['id'];
            if (isset($_POST['id'])) {
                $result = $model->deleteImage($id);
                if ($result) {
                    echo "true"; 
                }
            }
        }

        function addImage($id) {
            $this->view('admin/layouts/layoutAdmin',
                        ['page'=>'libraryImages/add',
                        'product_id'=>$id]);
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                $this->processAddImage($id);
            }
        }

        function processAddImage($id) {
            $model = $this->model('ProductsModels');
            $targetDir = "./public/img/products/";
            $listImage = $_FILES['library_image']['name'];
            foreach ($listImage as $key => $value) {
                $target_file2 = $targetDir . basename($value);
                move_uploaded_file($_FILES['library_image']['tmp_name'][$key], $target_file2);
                $query2 = $model->insertLibrary($target_file2, $id);
                if ($query2) {
                    $this->showSuccessMessage('Thêm ảnh thành công');
                }
            }
        }

        function updateImage($id, $product_id) {
            $model = $this->model('ProductsModels');
            $row = $model->selecetLibraryId($id);
            $this->view('admin/layouts/layoutAdmin',
                        ['page'=>'libraryImages/update',
                        'product_id'=>$product_id,
                        'row'=>$row]);
        }

        function handleImage($product_id) {
            if ($_SERVER['REQUEST_METHOD'] = 'POST' && isset($_POST['submit'])) {
                $this->processUpdateImage($product_id);
            }
        }

        function processUpdateImage($product_id) {
            $model = $this->model('ProductsModels');
            $image = $_FILES['image']['name'];
            $id = $_POST['image_id'];

            if ($image != '') {
                $targetDir = "./public/img/products/";
                $targetFile = $targetDir . basename($image);
                move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
                $query = $model->updateImage($targetFile, $id);
                $rows = $model->selectLibary($product_id);
                $this->view('admin/layouts/layoutAdmin',
                        ['page'=>'libraryImages/list',
                        'product_id'=>$product_id,
                        'rows'=>$rows]);
                if ($query) {
                    $this->showSuccessMessage('Cập nhật ảnh thành công');
                }
            }else {
                $rows = $model->selectLibary($product_id);
                $this->view('admin/layouts/layoutAdmin',
                        ['page'=>'libraryImages/list',
                        'product_id'=>$product_id,
                        'rows'=>$rows]);
                $this->showSuccessMessage('Cập nhật ảnh thành công');
            }
        }

        function listUsers() {
            $model = $this->model('UserModels');
            $rows = $model->selectUsers();
            $this->view('admin/layouts/layoutAdmin',
                        ['page'=>'users/list', 
                        'rows'=>$rows]);
        }

        function updateRole() {
            $model = $this->model('UserModels');
            if (isset($_POST['id'], $_POST['role'])) {
                $query = $model->updateRole($_POST['role'],$_POST['id']);
                if ($query) {
                    echo $_POST['role'];
                }
            }
        }

        function updateStatus() {
            $model = $this->model('UserModels');
            if (isset($_POST['id'], $_POST['status'])) {
                $query = $model->updateStatus($_POST['status'],$_POST['id']);
                if ($query) {
                    echo $_POST['status'];
                }
            }
        }

    }
?>