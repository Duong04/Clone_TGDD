<?php 
    class OrdersModels extends Database {
        function selectOrders() {
            $sql = "SELECT * FROM orders O INNER JOIN users U ON O.user_id = U.user_id";
            return $this->selectAll($sql);
        }
        function insertOrder($user_id, $total_amount, $shipping_fee) {
            $sql = "INSERT INTO orders (user_id, total_amount, shipping_fee, order_date, order_status) 
                    VALUES (?, ?, ?, NOW(), 'Chờ xác nhận')";
            $this->insertGetId($sql, [$user_id, $total_amount, $shipping_fee], $lastInsertId);
            return $lastInsertId;
        }

        function insertOrderDetails ($order_id, $product_id, $quantity, $price) {
            $sql = "INSERT INTO order_details (order_id, product_id, quantity, unit_price) 
                    VALUES (?, ?, ?, ?)";
            return $this->cud($sql, [$order_id, $product_id, $quantity, $price]);
        }

        function selectOrdersWithStatus($status, $user_id) {
            $sql = "SELECT * FROM orders WHERE order_status = ? AND user_id = ?";
            return $this->selectAllWithId($sql, [$status, $user_id]);
        }

        function selectOrderDetail($order_id) {
            $sql = "SELECT * FROM order_details O INNER JOIN products P ON O.product_id = P.product_id WHERE O.order_id = ?";
            return $this->selectAllWithId($sql, [$order_id]);
        }

        function selectOrderDetail_2($order_id) {
            $sql = "SELECT * FROM order_details WHERE order_id = ?";
            return $this->selectAllWithId($sql, [$order_id]);
        }

        function updateOrdersStatus($status, $order_id) {
            $sql = "UPDATE orders set order_status = ? WHERE order_id = ?";
            return $this->cud($sql, [$status, $order_id]);
        }

        function deleteOrder($order_id) {
            $sql = "DELETE FROM orders WHERE order_id = ?";
            return $this->cud($sql, [$order_id]);
        }
    }
?>