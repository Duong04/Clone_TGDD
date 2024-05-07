<?php 
    class UserAuthentication extends Controller {
        protected $listCategories;

        public function __construct() {
            $categoriesModel = $this->model('CategoriesModels');
            $this->listCategories = $categoriesModel->selectCategories();
        }

        public function index() {
            header('Location: ./UserAuthentication/Login');
        }

        public function login() {
            $model = $this->model('UserModels');
            $errorEmail = '';
            $errorPsw = '';
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['submit'])) {
                    $email = $_POST['email'];
                    $psw = trim($_POST['psw']);
                    $row = $model->selectEmail($email);
                    if ($row != null) {
                        $role = $row['role'];
                        $status = $row['status'];
                        $user_id = $row['user_id'];
                        $user_name = $row['user_name'];
                        $password = $row['password'];
                        if ($status === 'Chưa kích hoạt') {
                            $errorEmail = 'Tài khoản chưa được kích hoạt';
                        } else if ($status === 'Vô hiệu hóa') {
                            $errorEmail = 'Tài khoản đã bị vô hiệu hóa';
                        } else {
                            if (password_verify($psw, $password)) {
                                if ($role == 'Nhân viên' || $role == 'Admin') {
                                    $_SESSION['userName'] = $user_name;
                                    $_SESSION['role'] = $role;
                                    $_SESSION['user_id'] = $user_id;
                                    $_SESSION['status'] = $status;
                                    header('Location: ../Admin');
                                }else {
                                    $_SESSION['userName'] = $user_name;
                                    $_SESSION['role'] = $role;
                                    $_SESSION['user_id'] = $user_id;
                                    $_SESSION['status'] = $status;
                                    header('Location: ../');
                                }
                            }else {
                                $errorPsw = 'Mật khẩu không đúng';
                            }
                        }
                    }else {
                        $errorEmail = "Email không tồn tại!";
                    }
                }
            }
            $this->view('customer/login/login', 
                    [
                        'listCategories' => $this->listCategories,
                        'errorEmail' => $errorEmail,
                        'errorPsw' => $errorPsw
                    ]); 
        }

        public function register() {
            $model = $this->model('UserModels');
            $emailError = '';
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['submit'])) {
                    $userName = $_POST['userName'];
                    $email = $_POST['email'];
                    $psw = trim($_POST['psw']);
                    $hashPsw = password_hash($psw, PASSWORD_DEFAULT);
                    $token = bin2hex(random_bytes(16));

                    $checkEmail = $model->selectEmail($email);
                    if ($checkEmail == null) {
                        $query = $model->inserUsers($userName, $email, $hashPsw, $token);
                        if ($query) {
                            $title = "Xác nhận đăng ký, kích hoạt tài khoản";
                            $content = "<div>
                                            <img style='width: 130px;' src='https://d15shllkswkct0.cloudfront.net/wp-content/blogs.dir/1/files/2013/05/email-logo.jpg' alt=''>
                                            <p>Để kích hoạt tài khoản bạn hãy click <a href='http://localhost/php/php_oop/mvc/UserAuthentication/ConfirmUser/$token' style='color:blue;'>vào đây</a></p>
                                        </div>"; 
                            $sendMail = send_mail($email, $title, $content, '');
                            if ($sendMail) {
                                header('location: ./checkMail');
                                exit();
                            }
                        }
                    }else {
                        $emailError = "Email này đã tồn tại!";
                    }
                }
            }
            $this->view('customer/register/register', ['listCategories' => $this->listCategories, 'errorEmail' => $emailError]);
        }

        public function confirmUser($token=null) {
            $model = $this->model('UserModels');
            if (isset($token)) {
                $query = $model->updateStatusWithToken($token);
                if ($query) {
                    header ('Location: ../../UserAuthentication');
                }
            }else {
                header ('Location: ../UserAuthentication/Register');
            }
        }

        public function forgetPassword() { 
            $model = $this->model('UserModels');
            $this->view('customer/login/forgetPsw', ['listCategories' => $this->listCategories]);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['submit'])) {
                    $email = $_POST['email'];
                    $checkMail = $model->selectEmail($email);
                    if ($checkMail != null) {
                        $otp = rand(111111,999999);
                        $updateOtp = $model->updateOtpWithEmail($otp, $email);
                        if ($updateOtp) {
                            $title = "Thay đổi mật khẩu";
                            $content = "Nhấp vào liên kết để đổi mật khẩu <a href='http://localhost/php/php_oop/mvc/UserAuthentication/ResetPassword/$otp'>Tại đây</a>";
                            $sendMail = send_mail($email, $title, $content, '');
                            if ($sendMail) {
                                echo "<script>
                                    Swal.fire({
                                        title: 'Gửi mail thành công!',
                                        text: 'Vui lòng check mail để đổi mật khẩu!',
                                        icon: 'success',
                                        timer: 5000
                                    });
                                    </script>";
                            }
                        }
                    }else {
                        echo "<script>
                                Swal.fire({
                                    title: 'Cảnh báo!',
                                    text: 'Email không tồn tại',
                                    icon: 'warning',
                                    timer: 5000
                                });
                            </script>";
                    }
                }
            }

        }

        public function resetPassword($otp=null) {
            $model = $this->model('UserModels');
            if (isset($otp)) {
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if (isset($_POST['submit'])) {
                        $checkOtp = $model->selectOtp($otp);
    
                        if ($checkOtp != null) {
                            $password = password_hash($_POST['psw'], PASSWORD_DEFAULT);
                            $updatePsw = $model->updatePasswordWithEmail($password, $checkOtp['email']);
                            if ($updatePsw) {
                                header('location: ../../UserAuthentication');
                                exit();
                            }
                        }else {
                            echo "<script>
                                    Swal.fire({
                                        title: 'Cảnh báo!',
                                        text: 'Otp không tồn tại',
                                        icon: 'warning',
                                        timer: 5000
                                    });
                                </script>";
                        }
                    }
                }
            }else {
                header('Location: ../UserAuthentication/Register');
            }

            $this->view('customer/login/resetPsw');
        }

        public function checkMail() {
            $this->view('customer/register/checkMail', ['listCategories' => $this->listCategories]);
        }
    }
?>