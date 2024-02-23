<?php 
    class Statistical extends Database {
        public function orderToday() {
            $today = date("Y-m-d");
            $startOfDay = $today . ' 00:00:00';
            $endOfDay = $today . ' 23:59:59';
            $sql = "SELECT SUM(total_amount) as totalAmount FROM orders WHERE order_date BETWEEN '$startOfDay' AND '$endOfDay' AND order_status = 'Đã giao hàng'";
            return $this->selectStatistical($sql);
        }

        public function orderYesterday() {
            $yesterday = date("Y-m-d", strtotime("-1 day"));
            $startOfDay = $yesterday. ' 00:00:00';
            $endOfDay = $yesterday. ' 23:59:59';
            $sql = "SELECT SUM(total_amount) as totalAmount FROM orders WHERE order_date BETWEEN '$startOfDay' AND '$endOfDay' AND order_status = 'Đã giao hàng'";
            return $this->selectStatistical($sql);
        }

        public function monthlyOrder() {
            $firstDayOfMonth = date("Y-m-01");
            $lastDayOfMonth = date("Y-m-t");
            $sql = "SELECT SUM(total_amount) as totalAmount FROM orders WHERE order_date BETWEEN '$firstDayOfMonth' AND '$lastDayOfMonth' AND order_status = 'Đã giao hàng'";
            return $this->selectStatistical($sql);
        }

        public function lastMonthOrder() {
            $firstDayOfLastMonth = date("Y-m-01", strtotime("last month"));
            $lastDayOfLastMonth = date("Y-m-t", strtotime("last month"));
            $sql = "SELECT SUM(total_amount) as totalAmount FROM orders WHERE order_date BETWEEN '$firstDayOfLastMonth' AND '$lastDayOfLastMonth' AND order_status = 'Đã giao hàng'";
            return $this->selectStatistical($sql);
        }

        public function allOrders() {
            $sql = "SELECT SUM(total_amount) as totalAmount FROM orders WHERE order_status = 'Đã giao hàng'";
            return $this->selectStatistical($sql);
        }

        public function totalOrders() {
            $sql = "SELECT COUNT(*) AS totalOrders FROM orders WHERE order_status != 'Đã hủy'";
            return $this->selectStatistical($sql);
        }

        public function orderConfirmation() {
            $sql = "SELECT COUNT(*) AS totalOrders FROM orders WHERE order_status != 'Đã hủy' AND order_status ='Chờ xác nhận'";
            return $this->selectStatistical($sql);
        }

        public function orderShipping() {
            $sql = "SELECT COUNT(*) AS totalOrders FROM orders WHERE order_status != 'Đã hủy' AND order_status ='Đang vận chuyển'";
            return $this->selectStatistical($sql);
        }

        public function orderDelivered() {
            $sql = "SELECT COUNT(*) AS totalOrders FROM orders WHERE order_status != 'Đã hủy' AND order_status ='Đã giao hàng'";
            return $this->selectStatistical($sql);
        }

        public function statisticalProduct() {
            $sql = "SELECT od.product_id,p.product_name, SUM(od.quantity) AS total_quantity_sold
            FROM order_details od
            JOIN products p ON od.product_id = p.product_id
            JOIN orders o ON od.order_id = o.order_id
            WHERE o.order_status = 'Đã giao hàng'
            GROUP BY od.product_id
            ORDER BY total_quantity_sold DESC
            LIMIT 6";
            return $this->selectAll($sql);
        }

        function statisticalProductsView() {
            $sql = "SELECT product_name, view FROM products limit 6";
            return $this->selectAll($sql);
        }
    }
?>