<?php 
    class Admin extends Controller {
        function index() {
            $this->view('admin/layouts/layoutAdmin', 
                        ['folder'=>'dashboard', 'page'=>'dashboard']);
        }

        // ---------------- Categories -----------------------
        function listCategories() {
            $model = $this->model('CategoriesModels');
            $rows = $model->selectCategories();
            $this->view('admin/layouts/layoutAdmin',
                        ['folder'=>'categories', 
                        'page'=>'list',
                        'rows'=>$rows]);
        }

        function addCategory() {
            $model = $this->model('CategoriesModels');
            $this->view('admin/layouts/layoutAdmin',
                        ['folder'=>'categories', 
                        'page'=>'add']);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['submit'])) {
                    $name = $_POST['category-name'];
                    $user_id = $_SESSION['user_id'];

                    $query = $model->addCategory($name, $user_id);

                    if ($query) {
                        echo "<script>
                                Swal.fire({
                                    title: 'Thành công!',
                                    text: 'Thêm thành công',
                                    icon: 'success',
                                    showConfirmButton: false,
                                    timer: 1000
                                });
                            </script>";
                    }
                }
            }
        }

        function deleteCategories() {
            $model = $this->model('CategoriesModels');
            $id = $_POST['id'];
            if (isset($_POST['id'])) {
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
            $this->view('admin/layouts/layoutAdmin',
            ['folder'=>'categories', 
            'page'=>'update',
            'row'=>$row]);
        }

        function handleCategory() {
            $model = $this->model('CategoriesModels');
            $rows = $model->selectCategories();
            $this->view('admin/layouts/layoutAdmin',
                    ['folder'=>'categories', 
                    'page'=>'list',
                    'rows'=>$rows]);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['submit'])) {
                    $name = $_POST['category-name'];
                    $user_id = $_SESSION['user_id'];
                    $id = $_POST['id'];
            
                    $query = $model->updateCategory($name, $user_id, $id);
            
                    if ($query) {
                        echo "<script>
                                Swal.fire({
                                    title: 'Thành công!',
                                    text: 'Cập nhật thành công',
                                    icon: 'success',
                                    showConfirmButton: false,
                                    timer: 1000
                                });
                                setTimeout(function() {
                                    window.location.href = './Admin/HandleCategory';
                                },800);
                            </script>";
                    }
                }
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

            if (isset($_POST['category_id2'])) {
                $lists = $model->selectSubcategories($_POST['category_id2']);
                foreach ($lists as $list) {
                    echo "<option value='".$list['subcat_id']."'>".$list['subcat_name']."</option>";
                }
            }

            $this->view('admin/layouts/layoutAdmin',
                    ['folder'=>'subcategories', 
                    'page'=>'list',
                    'category_id'=>$category_id,
                    'rows'=>$rows]);
        }

        function addSubcat($category_id) {
            $model = $this->model('SubcategoriesModels');
            $this->view('admin/layouts/layoutAdmin',
                    ['folder'=>'subcategories', 
                    'page'=>'add',
                    'category_id'=>$category_id]);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['submit'])) {
                    $name = $_POST['name'];
                    $image = $_FILES['image']['name'];
                    $user_id = $_SESSION['user_id'];
                    $targetDir = './public/img/subcategories/';
                    $targetFile = $targetDir . basename($image);
                    move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
                    $query = $model->addSubcategory($name, $targetFile, $category_id, $user_id);
                    if ($query) {
                        echo "<script>
                                Swal.fire({
                                    title: 'Thành công!',
                                    text: 'Thêm thành công',
                                    icon: 'success',
                                    showConfirmButton: false,
                                    timer: 1000
                                });
                            </script>";
                    }
                }
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
                    ['folder'=>'subcategories', 
                    'page'=>'update',
                    'category_id'=>$category_id,
                    'row'=>$row]);
        }

        function handleSubcat($category_id) {
            $model = $this->model('SubcategoriesModels');
            $rows = $model->selectSubcategories($category_id);
            $this->view('admin/layouts/layoutAdmin',
                    ['folder'=>'subcategories', 
                    'page'=>'list',
                    'category_id'=>$category_id,
                    'rows'=>$rows]);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['submit'])) {
                    $name = $_POST['name'];
                    $subcat_id = $_POST['subcat_id'];
                    $user_id = $_SESSION['user_id'];
                    $image = $_FILES['image']['name'];
                    $targetDir = './public/img/subcategories/';
                    $targetFile = $targetDir . basename($image);
                    move_uploaded_file($_FILES['image']['tmp_name'], $targetFile); 
            
                    $query = $model->updateSubcat($name, $targetFile, $user_id, $subcat_id, $image);
            
                    if ($query) {
                        echo "<script>
                                Swal.fire({
                                    title: 'Thành công!',
                                    text: 'Cập nhật thành công',
                                    icon: 'success',
                                    showConfirmButton: false,
                                    timer: 1000
                                });
                                setTimeout(function() {
                                    window.location.href = './Admin/HandleSubcat/$category_id';
                                },800);
                            </script>";
                    }
                }
            }
        }

        //------------------- product ---------------------
        function listProducts() {
            $model = $this->model('ProductsModels');
            $rows = $model->selectProducts();
            $this->view('admin/layouts/layoutAdmin',
                        ['folder'=>'products', 
                        'page'=>'list',
                        'rows'=>$rows]);
        }

        function addProduct() {
            $model2 = $this->model('CategoriesModels');
            $listCat = $model2->selectCategories();
            $model = $this->model('ProductsModels');
            $this->view('admin/layouts/layoutAdmin',
                        ['folder'=>'products', 
                        'page'=>'add',
                        'list'=>$listCat]);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['submit'])) {
                    $name = $_POST['product_name'];
                    $image = $_FILES['product_image']['name'];
                    $listImage = $_FILES['library_image']['name'];
                    $quantity = $_POST['product_quantity'];
                    $price = $_POST['initial_price'];
                    $discount = $_POST['discount'];
                    $category_id = $_POST['category_id'];
                    $subcat_id = $_POST['subcat_id'];
                    $desc = $_POST['description'];
                    $user_id = $_SESSION['user_id'];
                    $countPrice = $price - ($price * ($discount / 100));
                    $newPrice = $discount > 0 ? $countPrice : 0;
                    $targetDir = './public/img/products/';
                    $target_file = $targetDir . basename($image);
                    move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file);
                    $query = $model->insertProduct($name, $target_file, $desc, $quantity, $price, $discount, $newPrice, $category_id, $subcat_id, $user_id);
                    if ($query) {
                        foreach ($listImage as $key => $value) {
                            $target_file2 = $targetDir . basename($value);
                            move_uploaded_file($_FILES['library_image']['tmp_name'][$key], $target_file2);
                            $query2 = $model->insertLibrary($target_file2, $query);
                            if ($query2) {
                                echo '<script>
                                            Swal.fire({
                                                title: "Thành công!",
                                                text: "Thêm sản phẩm thành công!",
                                                icon: "success",
                                                timer: 1000
                                            });
                                        </script>';
                            }
                        }
                    }
                }
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
                        ['folder'=>'products', 
                        'page'=>'update',
                        'row'=>$row,
                        'listImage'=>$listImage,
                        'list'=>$listCat]);
        }

        function handleProduct() {
            $model = $this->model('ProductsModels');
            $rows = $model->selectProducts();
            $this->view('admin/layouts/layoutAdmin',
                        ['folder'=>'products', 
                        'page'=>'list',
                        'rows'=>$rows]);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['submit'])) {
                    $product_id = $_POST['product_id'];
                    $name = $_POST['product_name'];
                    $image = $_FILES['product_image']['name'];
                    $listImage = $_FILES['library_image']['name'];
                    $quantity = $_POST['product_quantity'];
                    $price = $_POST['initial_price'];
                    $discount = $_POST['discount'];
                    $category_id = $_POST['category_id'];
                    $subcat_id = $_POST['subcat_id'];
                    $desc = $_POST['description'];
                    $user_id = $_SESSION['user_id'];
                    $countPrice = $price - ($price * ($discount / 100));
                    $newPrice = $discount > 0 ? $countPrice : 0;
                    $targetDir = './public/img/products/';
                    $target_file = $targetDir . basename($image);
                    move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file);
                    $query = $model->updateProduct($name, $target_file, $desc, $quantity, $price, $discount, $newPrice, $category_id, $subcat_id, $user_id, $product_id, $image);
                    if ($query) {
                        foreach ($listImage as $key => $value) {
                            if (is_uploaded_file($_FILES['library_image']['tmp_name'][$key])) {
                                $target_file2 = $targetDir . basename($value);
                                move_uploaded_file($_FILES['library_image']['tmp_name'][$key], $target_file2);
                                $existingImage = $model->checkLibrary($product_id, $target_file2);
                                var_dump($existingImage);
                                if ($existingImage == null) {
                                    $query2 = $model->insertLibrary($target_file2, $product_id);
                                    if ($query2) {
                                        echo "<script>
                                                Swal.fire({
                                                    title: 'Thành công!',
                                                    text: 'Cập nhật thành công',
                                                    icon: 'success',
                                                    showConfirmButton: false,
                                                    timer: 1000
                                                });
                                                
                                            </script>";
                                    }
                                }else {
                                    echo "<script>
                                            Swal.fire({
                                                title: 'Thành công!',
                                                text: 'Cập nhật thành công',
                                                icon: 'success',
                                                showConfirmButton: false,
                                                timer: 1000
                                            });
                                            setTimeout(function() {
                                                window.location.href = './Admin/ListProducts';
                                            },800);
                                        </script>";
                                }
                            }else {
                                echo "<script>
                                        Swal.fire({
                                            title: 'Thành công!',
                                            text: 'Cập nhật thành công',
                                            icon: 'success',
                                            showConfirmButton: false,
                                            timer: 1000
                                        });
                                        setTimeout(function() {
                                                window.location.href = './Admin/ListProducts';
                                        },800);
                                    </script>";
                            }
                        }
                        
                    }
                }
            }   
        }

        // -------------- libraries -----------------
        function listImage() {
            $model = $this->model('ProductsModels');
            $rows = $model->selectProducts();
            $this->view('admin/layouts/layoutAdmin',
                        ['folder'=>'libraryImages', 
                        'page'=>'listProduct',
                        'rows'=>$rows]);
        }

        function libraryImageDetail($id=null) {
            $model = $this->model('ProductsModels');
            if (isset($id)) {
                $rows = $model->selectLibary($id);
            }
            $this->view('admin/layouts/layoutAdmin',
                        ['folder'=>'libraryImages', 
                        'page'=>'list',
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
            $model = $this->model('ProductsModels');
            $this->view('admin/layouts/layoutAdmin',
                        ['folder'=>'libraryImages', 
                        'page'=>'add',
                        'product_id'=>$id]);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['submit'])) {
                    $targetDir = "./public/img/products/";
                    $listImage = $_FILES['library_image']['name'];
                    foreach ($listImage as $key => $value) {
                        $target_file2 = $targetDir . basename($value);
                        move_uploaded_file($_FILES['library_image']['tmp_name'][$key], $target_file2);
                        $query2 = $model->insertLibrary($target_file2, $id);
                        if ($query2) {
                            echo '<script>
                                        Swal.fire({
                                            title: "Thành công!",
                                            text: "Thêm ảnh thành công!",
                                            icon: "success",
                                            timer: 1000
                                        });
                                    </script>';
                        }
                    }
                }
            }
        }

        function updateImage($id, $product_id) {
            $model = $this->model('ProductsModels');
            $row = $model->selecetLibraryId($id);
            $this->view('admin/layouts/layoutAdmin',
                        ['folder'=>'libraryImages', 
                        'page'=>'update',
                        'product_id'=>$product_id,
                        'row'=>$row]);
        }

        function handleImage($product_id=null) {
            $model = $this->model('ProductsModels');
            if (isset($product_id)) {
                $rows = $model->selectLibary($product_id);
            }
            $this->view('admin/layouts/layoutAdmin',
                        ['folder'=>'libraryImages', 
                        'page'=>'list',
                        'product_id'=>$product_id,
                        'rows'=>$rows]);
            if ($_SERVER['REQUEST_METHOD'] = 'POST') {
                if (isset($_POST['submit'])) {
                    $image = $_FILES['image']['name'];
                    $id = $_POST['image_id'];

                    if ($image != '') {
                        $targetDir = "./public/img/products/";
                        $targetFile = $targetDir . basename($image);
                        move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
                        $query = $model->updateImage($targetFile, $id);
                        if ($query) {
                            echo "<script>
                                    Swal.fire({
                                        title: 'Thành công!',
                                        text: 'Cập nhật thành công',
                                        icon: 'success',
                                        showConfirmButton: false,
                                        timer: 1000
                                    });
                                    setTimeout(function() {
                                        window.location.href = './Admin/HandleImage/$product_id';
                                    },800);
                                </script>";
                        }
                    }else {
                        echo "<script>
                                Swal.fire({
                                    title: 'Thành công!',
                                    text: 'Cập nhật thành công',
                                    icon: 'success',
                                    showConfirmButton: false,
                                    timer: 1000
                                });
                                setTimeout(function() {
                                    window.location.href = './Admin/HandleImage/$product_id';
                                },800);
                            </script>";
                    }
                }
            }
        }
    }
?>