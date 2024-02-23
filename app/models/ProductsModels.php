<?php 
    class ProductsModels extends Database {
        function selectProducts() {
            $sql = "SELECT * FROM products P 
                            INNER JOIN categories C 
                            ON P.category_id = C.category_id
                            INNER JOIN subcategories S 
                            ON P.subcat_id = S.subcat_id 
                            INNER JOIN users U 
                            ON P.user_id = U.user_id";
            return $this->selectAll($sql);
        }

        function selectProductId($id) {
            $sql = "SELECT * FROM products P 
                    INNER JOIN categories C 
                    ON P.category_id = C.category_id
                    INNER JOIN subcategories S 
                    ON P.subcat_id = S.subcat_id  
                    WHERE P.product_id = ?";
            return $this->selectOne($sql, [$id]);
        }

        function selectProductLike($data) {
            $sql = "SELECT * FROM products P 
                    INNER JOIN categories C 
                    ON P.category_id = C.category_id
                    INNER JOIN subcategories S 
                    ON P.subcat_id = S.subcat_id  
                    WHERE P.product_name like '%$data%' OR C.category_name like '%$data%' OR S.subcat_name like '%$data%' ORDER BY RAND() LIMIT 5";
            return $this->selectAll($sql);
        }

        function selectProductLike_2($data) {
            $sql = "SELECT * FROM products P 
                    INNER JOIN categories C 
                    ON P.category_id = C.category_id
                    INNER JOIN subcategories S 
                    ON P.subcat_id = S.subcat_id  
                    WHERE P.product_name like '%$data%' OR C.category_name like '%$data%' OR S.subcat_name like '%$data%' ORDER BY RAND()";
            return $this->selectAll($sql);
        }

        function selectProductName($name, $subcat_id) {
            $sql = "SELECT * FROM products WHERE product_name = ? AND subcat_id = ?";
            return $this->selectOne($sql, [$name, $subcat_id]);
        }

        function insertProduct($name, $image, $desc, $quantity, $price, $discount, $new_price, $category_id, $subcat_id, $user_id) {
            $sql = "INSERT INTO products (product_name, product_image, description, product_quantity, initial_price, discount, new_price, category_id, subcat_id, user_id,create_date) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
            $this->insertGetId($sql, [$name, $image, $desc, $quantity, $price, $discount, $new_price, $category_id, $subcat_id, $user_id], $lastInsertId);
            return $lastInsertId;
        }

        function updateProduct($name, $image, $desc, $quantity, $price, $discount, $new_price, $category_id, $subcat_id, $user_id, $product_id,$checkImage) {
            if ($checkImage != '') {
                $sql = "UPDATE products SET product_name = ?, product_image = ?, description = ?, product_quantity = ?, initial_price = ?, discount = ?, new_price = ?, category_id = ?, subcat_id = ?, user_id = ?, create_date = NOW() WHERE product_id = ?";
                return $this->cud($sql, [$name, $image, $desc, $quantity, $price, $discount, $new_price, $category_id, $subcat_id, $user_id, $product_id]);
            }else {
                $sql = "UPDATE products SET product_name = ?, description = ?, product_quantity = ?, initial_price = ?, discount = ?, new_price = ?, category_id = ?, subcat_id = ?, user_id = ?, create_date = NOW() WHERE product_id = ?";
                return $this->cud($sql, [$name, $desc, $quantity, $price, $discount, $new_price, $category_id, $subcat_id, $user_id, $product_id]);
            }
        }

        function viewUpdate($product_id) {
            $sql = "UPDATE products SET view = view + 1 WHERE product_id = ?";
            return $this->cud($sql, [$product_id]);
        }

        function deleteProduct($id) {
            $sql = "DELETE FROM products WHERE product_id = ?";
            return $this->cud($sql, [$id]);
        }

        function insertLibrary($image, $product_id) {
            $sql = "INSERT INTO libraryimages (image, product_id) VALUES (?, ?)";
            return $this->cud($sql,[$image, $product_id]);
        }

        function selectLibary($id) {
            $sql = "SELECT * FROM libraryimages L INNER JOIN products P ON L.product_id = P.product_id WHERE L.product_id = ?";
            return $this->selectAllWithId($sql, [$id]);
        }

        function selecetLibraryId($id) {
            $sql = "SELECT * FROM libraryimages WHERE image_id = ?";
            return $this->selectOne($sql, [$id]);
        }

        function checkLibrary($id, $image) {
            $sql = "SELECT * FROM libraryimages WHERE product_id = ? AND image = ?";
            return $this->selectOne($sql, [$id, $image]);
        }

        function deleteImage($id) {
            $sql = "DELETE FROM libraryimages WHERE image_id = ?";
            return $this->cud($sql, [$id]);
        }

        function updateImage($image, $id) {
            $sql = "UPDATE libraryimages SET image = ? WHERE image_id = ?";
            return $this->cud($sql, [$image, $id]);
        }

        function selectProductDiscountest() {
            $sql = "SELECT * FROM products WHERE discount >= 35 LIMIT 15";
            return $this->selectAll($sql);
        }

        function selectProductClockDicount() {
            $sql = "SELECT * FROM products P INNER JOIN categories C ON P.category_id = C.category_id WHERE C.category_name LIKE '%Đồng hồ' AND P.discount >= 40";
            return $this->selectAll($sql);
        }

        function selectProductHP() {
            $sql = "SELECT * FROM products P INNER JOIN subcategories S ON P.subcat_id = S.subcat_id WHERE S.subcat_name LIKE '%HP%' AND P.new_price >= 9190000";
            return $this->selectAll($sql);
        }

        function selectProductRand() {
            $sql = "SELECT * FROM products ORDER BY RAND() LIMIT 10";
            return $this->selectAll($sql);
        }

        function selectLaptopGaming() {
            $sql = "SELECT * FROM products WHERE product_name LIKE '%gaming%' ORDER BY RAND() LIMIT 10";
            return $this->selectAll($sql);
        }

        function selectTablet() {
            $sql = "SELECT * FROM products P INNER JOIN categories C ON P.category_id = C.category_id WHERE C.category_name LIKE '%Tablet' AND P.new_price <= 15000000 LIMIT 10";
            return $this->selectAll($sql);
        }

        function selectProductWithCategories($category_id, $subcat_id=null) {
            $sql = "SELECT * FROM products
                    WHERE category_id = ?";
            if (isset($subcat_id)) {
                $sql .= " AND subcat_id = ?";
                return $this->selectAllWithId($sql, [$category_id, $subcat_id]);
            }
            $sql .= " ORDER BY RAND()";
            return $this->selectAllWithId($sql, [$category_id]);
        }

        function productFilter($category_id, $filter=null, $filter_2 = null, $filter_3, $subcat_id=null) {
            $sql = "SELECT * FROM products WHERE category_id = ?";
            if(isset($filter)) {
                switch ($filter) {
                    case 1:
                        $sql .= " AND new_price <= 1000000";
                        break;
                    case 2:
                        $sql .= " AND (new_price BETWEEN 1000000 AND 5000000)";
                        break;
                    case 3:
                        $sql .= " AND (new_price BETWEEN 5000000 AND 10000000)";
                        break;
                    case 4:
                        $sql .= " AND (new_price BETWEEN 10000000 AND 15000000)";
                        break;
                    case 5:
                        $sql .= " AND (new_price BETWEEN 15000000 AND 20000000)";
                        break;
                    case 6:
                        $sql .= " AND new_price >= 20000000";
                        break;
                    default:
                        $sql .= " ORDER BY RAND()";
                }
            }


            if($filter_3 == 'false') {
                $sql .= " AND discount >= 0";
            }else {
                $sql .= " AND discount > 0";
            }
            
            

            if (isset($filter_2)) {
                switch ($filter_2) {
                    case 'descView':
                        $orderBy = " ORDER BY view DESC";
                        break;
                    case 'descPrice':
                        $orderBy = " ORDER BY new_price DESC";
                        break;
                    case 'ascPrice':
                        $orderBy = " ORDER BY new_price ASC";
                        break;
                    case 'ascName':
                        $orderBy = " ORDER BY product_name ASC";
                        break;
                    case 'descName':
                        $orderBy = " ORDER BY product_name DESC";
                        break;
                }
            }

            if (isset($subcat_id)) {
                $sql .=" AND subcat_id = ?";
            }

            $sql .= isset($orderBy) ? $orderBy : '';

            if (isset($subcat_id)) {
                return $this->selectAllWithId($sql, [$category_id, $subcat_id]);
            }
            
            return $this->selectAllWithId($sql, [$category_id]);
        }

        function similarProduct($product_id, $category_id, $subcat_id) {
            $sql = "SELECT * FROM products WHERE product_id != ? AND (subcat_id = ? OR category_id = ?) ORDER BY RAND() LIMIT 15";
            return $this->selectAllWithId($sql, [$product_id, $subcat_id, $category_id]);
        }

        function otherProduct($category_id) {
            $sql = "SELECT * FROM products WHERE category_id != ? ORDER BY RAND() LIMIT 15";
            return $this->selectAllWithId($sql, [$category_id]);
        }

        function selectPId($product_id) {
            $sql = "SELECT * FROM products WHERE product_id = ?";
            return $this->selectOne($sql, [$product_id]);
        }

        function updateQuantity($product_id, $quantity) {
            $sql = "UPDATE products SET product_quantity = product_quantity - ? WHERE product_id = ?";
            return $this->cud($sql, [$quantity, $product_id]);
        }

        function updateQuantity_2($product_id, $quantity) {
            $sql = "UPDATE products SET product_quantity = product_quantity + ? WHERE product_id = ?";
            return $this->cud($sql, [$quantity, $product_id]);
        }
    }
?>