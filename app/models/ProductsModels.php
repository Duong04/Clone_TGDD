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
            $sql = "SELECT * FROM products WHERE product_id = ?";
            return $this->selectOne($sql, [$id]);
        }

        function insertProduct($name, $image, $desc, $quantity, $price, $discount, $new_price, $category_id, $subcat_id, $user_id) {
            $sql = "INSERT INTO products (product_name, product_image, description, product_quantity, initial_price, discount, new_price, category_id, subcat_id, user_id) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $this->insertGetId($sql, [$name, $image, $desc, $quantity, $price, $discount, $new_price, $category_id, $subcat_id, $user_id], $lastInsertId);
            return $lastInsertId;
        }

        function updateProduct($name, $image, $desc, $quantity, $price, $discount, $new_price, $category_id, $subcat_id, $user_id, $product_id,$checkImage) {
            if ($checkImage != '') {
                $sql = "UPDATE products SET product_name = ?, product_image = ?, description = ?, product_quantity = ?, initial_price = ?, discount = ?, new_price = ?, category_id = ?, subcat_id = ?, user_id = ? WHERE product_id = ?";
                return $this->cud($sql, [$name, $image, $desc, $quantity, $price, $discount, $new_price, $category_id, $subcat_id, $user_id, $product_id]);
            }else {
                $sql = "UPDATE products SET product_name = ?, description = ?, product_quantity = ?, initial_price = ?, discount = ?, new_price = ?, category_id = ?, subcat_id = ?, user_id = ? WHERE product_id = ?";
                return $this->cud($sql, [$name, $desc, $quantity, $price, $discount, $new_price, $category_id, $subcat_id, $user_id, $product_id]);
            }
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
    }
?>