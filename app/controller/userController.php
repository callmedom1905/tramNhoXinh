<?php
class UserController
{
    private $user;
    private $mailController;

    function __construct()
    {
        $this->user = new UserModel();
        $this->mailController = new MailerController();
    }

    public function register()
    {
        if (isset($_POST['dangky'])) {
            $data = [];
            $data['email'] = $_POST['re-email'];
            $pasword = $_POST['mk'];
            $repass = $_POST['remk'];
            $data['name'] = $_POST['hoten'];
            $data['phone'] = $_POST['sdt'];

            if ($pasword === $repass) {
                $result = $this->user->checkmail($data['email']);
                if ($result) {
                    echo "<script>
                   alert('Email đã tồn tại');
               </script>";

                    echo "<script>
                   location.href='index.php';
               </script>";
                } else {
                    $data['password'] = md5($pasword);
                    $verificationCode = bin2hex(random_bytes(32));
                    $this->user->insertUser($data, $verificationCode);
                    $this->mailController->sendVerificationEmail($data['email'], $verificationCode);
                    echo "<script>
                   alert('Đăng ký thành công');
               </script>";

                    echo "<script>
                   location.href='index.php';
               </script>";
                }
            } else {
                echo "<script>
                   alert('Mật khẩu không trùng khớp ');
               </script>";

                echo "<script>
                   location.href='index.php';
               </script>";
            }
        }
    }

    public function login()
    {
        if (isset($_POST['dangnhap'])) {
            $email = $_POST['email'];
            $password = md5($_POST['mklogin']);
            $result = $this->user->checkUser($email, $password);
            if (is_array($result)) {
                if ($result['role'] == 1 && $result['active'] == 1) {
                    // $_SESSION['admin'] = $result['username'];
                    echo "<script>
                    alert('Đăng nhập admin thành công');
                </script>";
                    echo "<script>
                    location.href='admin/index.php';
                </script>";
                } else if ($result['role'] == 0 && $result['active'] == 1) {
                    $_SESSION['user'] = $result['email'];
                    echo "<script>
                    alert('Đăng nhập thành công');
                </script>";
                    echo "<script>
                    location.href='index.php';
                </script>";
                } else if ($result['role'] == 0 && $result['active'] == 0) {
                    echo "<script>
                    alert('Bạn chưa xác nhận tài khoản qua Email, vui lòng xác nhận!');
                </script>";
                    echo "<script>
                    location.href='index.php';
                </script>";
                } else if ($result['role'] == 0 && $result['active'] == 2) {
                    echo "<script>
                    alert('Tài khoản của bạn đã bị khóa (X)');
                </script>";
                    echo "<script>
                    location.href='index.php';
                </script>";
                } else {
                    echo "<script>
                    alert('Tài khoản không tồn tại, vui lòng đăng ký tài khoản mới');
                </script>";
                    echo "<script>
                    location.href='index.php';
                </script>";
                }
            } else {
                echo "<script>
                alert('Sai email hoặc mật khẩu, vui lòng nhập lại');
            </script>";
                echo "<script>
                location.href='index.php';
            </script>";
            }
        }
    }

    function forgotPass()
    {
        if (isset($_POST['quenPass'])) {
            $data = [];
            $data['email'] = $_POST['forgot-email'];
            $data['password'] = md5($_POST['forgot-password']);
            $repass = md5($_POST['forgot-Repassword']);
            $data['phone'] = $_POST['forgot-phone'];
            if ($data['password'] == $repass && $this->user->checkForgot($data['email'], $data['phone'])) {
                $this->user->updatePass($data);
                echo '<script>alert("Cập nhật thành công")</script>';
                echo '<script>location.href="index.php"</script>';
            } else {
                echo '<script>alert("Chưa cập nhật được mật khẩu. Hãy kiểm tra lại email, số điện thoại hoặc mật khẩu")</script>';
                echo '<script>location.href="index.php"</script>';
            }

        }
    }

    function verifyEmail()
    {
        $code = $_GET['code'] ?? '';
        if ($this->user->verify($code)) {
            echo "<script>alert('Xác thực thành công! Vui lòng đăng nhập để sử dụng dịch vụ của chúng tôi.')</script>";
            header("Location: index.php");
        } else {
            echo "Liên kết xác minh không hợp lệ hoặc đã hết hạn.";
        }
    }




}