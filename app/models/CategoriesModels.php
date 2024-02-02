<?php 
    class CategoriesModels extends Database {
        function selectCategories() {
            $sql = "SELECT * FROM categories INNER JOIN users ON categories.user_id = users.user_id";
            return $this->selectAll($sql);
        }

        function selectCategoryId($id) {
            $sql = "SELECT * FROM categories WHERE category_id = ?";
            return $this->selectOne($sql, [$id]);
        }

        function selectCategoryName($name) {
            $sql = "SELECT * FROM categories WHERE category_name = ?";
            return $this->selectOne($sql, [$name]);
        }

        function deleteCategories($id) {
            $sql = "DELETE FROM categories WHERE category_id = ?";
            return $this->cud($sql, [$id]);
        }

        function addCategory($name, $user_id) {
            $sql = "INSERT INTO categories (category_name, user_id) VALUES (?, ?)";
            return $this->cud($sql, [$name, $user_id]);
        }

        function UpdateCategory($name, $user_id, $id) {
            $sql = "UPDATE categories SET category_name = ?, user_id = ? WHERE category_id = ?";
            return $this->cud($sql, [$name, $user_id, $id]);
        }
    }
?>