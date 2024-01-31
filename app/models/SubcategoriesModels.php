<?php 
    class SubcategoriesModels extends Database {
        function selectSubcategories($id) {
            $sql = "SELECT * FROM subcategories S 
                        INNER JOIN categories C 
                        ON S.category_id = C.category_id
                        INNER JOIN users U 
                        ON S.user_id = U.user_id
                        WHERE C.category_id = ?";
            return $this->selectAllWithId($sql, [$id]);
        }

        function addSubcategory($name, $image,$category_id, $user_id) {
            $sql = "INSERT INTO subcategories (subcat_name, subcat_image, category_id, user_id) VALUES ( ?, ?, ?, ?)";
            return $this->cud($sql, [$name, $image, $category_id, $user_id]);
        }

        function deleteSubcategory($id) {
            $sql = "DELETE FROM subcategories WHERE subcat_id = ?";
            return $this->cud($sql, [$id]);
        }

        function selectSubcatId($id) {
            $sql = "SELECT * FROM subcategories S 
                        INNER JOIN categories C 
                        ON S.category_id = C.category_id
                        INNER JOIN users U 
                        ON S.user_id = U.user_id
                        WHERE S.subcat_id = ?";
            return $this->selectOne($sql, [$id]);
        }

        function updateSubcat($name, $image, $user_id, $subcat_id, $checkImage) {
            if ($checkImage != '') {
                $sql = "UPDATE subcategories SET subcat_name = ?, subcat_image = ?, user_id = ? WHERE subcat_id = ?";
                return $this->cud($sql, [$name, $image, $user_id, $subcat_id]);
            }else {
                $sql = "UPDATE subcategories SET subcat_name = ?, user_id = ? WHERE subcat_id = ?";
                return $this->cud($sql, [$name, $user_id, $subcat_id]);
            }
        }
    }
?>