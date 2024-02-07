<?php 
    class UserModels extends Database {
        function selectUsers() {
            $sql = "SELECT * FROM users";
            return $this->selectAll($sql);
        }
        function inserUsers($userName, $email, $password, $token) {
            $sql = "INSERT INTO users (user_name, email, password, token, role, status, create_date, user_image) values(?, ?, ?, ?, 'Khách Hàng', 'Chưa kích hoạt', NOW(), './public/img/users/default-image.png')";
            return $this->cud($sql, [$userName, $email, $password, $token]);
        }

        function selectEmail($email) {
            $sql = "SELECT * FROM users WHERE email = ?";
            return $this->selectOne($sql, [$email]);
        }

        function selectId($id) {
            $sql = "SELECT * FROM users WHERE user_id = ?";
            return $this->selectOne($sql, [$id]);
        }

        function updateStatusWithToken($token) {
            $sql = "UPDATE users SET status = 'Đã kích hoạt', token = 0 WHERE token = ?";
            return $this->cud($sql, [$token]);
        }

        function updateOtpWithEmail($otp, $email) {
            $sql = "UPDATE users SET otp = ? WHERE email = ?";
            return $this->cud($sql, [$otp, $email]);
        }

        function selectOtp($otp) {
            $sql = "SELECT * FROM users WHERE otp = ?";
            return $this->selectOne($sql, [$otp]);
        }

        function updatePasswordWithEmail($password, $email) {
            $sql = "UPDATE users SET password = ?, otp = 0 WHERE email = ?";
            return $this->cud($sql, [$password, $email]);
        }

        function updateInfoUser($userName, $email, $phone, $address, $image, $target_file, $user_id) {
            if ($image == '') {
                $sql = "UPDATE users SET user_name = ?, email = ?, phone = ?, address = ? WHERE user_id = ?";
                return $this->cud($sql, [$userName, $email, $phone, $address, $user_id]);
            }else {
                $sql = "UPDATE users SET user_name = ?, email = ?, phone = ?, address = ?, user_image = ? WHERE user_id = ?";
                return $this->cud($sql, [$userName, $email, $phone, $address, $target_file, $user_id]);
            }
        }

        function updateRole($role, $id) {
            $sql = "UPDATE users SET role = ? WHERE user_id = ?";
            return $this->cud($sql, [$role, $id]);
        }

        function updateStatus($status, $id) {
            $sql = "UPDATE users SET status = ? WHERE user_id = ?";
            return $this->cud($sql, [$status, $id]);
        }
    }
?>