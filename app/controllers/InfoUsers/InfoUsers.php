<?php 
    class InfoUsers extends Controller {
        function index() {
            $model = $this->model('UserModels');
            if (isset($_SESSION['user_id'])) {
                $user_id = $_SESSION['user_id'];
                $row = $model->selectId($user_id);
                $this->view('customer/layouts/layoutInfoUser', 
                                ['page'=>'profile', 
                                'row'=>$row],
                            );
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if (isset($_POST['submit'])) {
                        $userName = $_POST['userName'];
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];
                        $address = $_POST['address'];
                        $image = $_FILES['user-image']['name'];
                        $target_dir = './public/img/users/';
                        $target_file = $target_dir . basename($image);
                        move_uploaded_file($_FILES['user-image']['tmp_name'], $target_file);
                        $query = $model->updateInfoUser($userName, $email, $phone, $address, $image, $target_file, $user_id);
                        if ($query) {
                            echo "<script>
                                    Swal.fire({
                                        title: 'Thành công!',
                                        text: 'Cập nhật thành công',
                                        icon: 'success',
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                    setTimeout(function() {
                                        window.location.href = './InfoUsers';
                                    },800);
                                </script>";
                        }else {
                            echo 'Lỗi';
                        }
                    }
                }
            }else {
                header('Location: ./UserAuthentication');
            }
        }

        function logout() {
            unset($_SESSION['userName']);
            unset($_SESSION['role']);
            unset($_SESSION['user_id']);
            unset($_SESSION['status']);
            header('Location: ../UserAuthentication');
            exit();
        }
    }
?>