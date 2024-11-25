<?php
class UserController{
    private $user;
    
    function __construct(){
        $this->user = new UserModel();
    }

    public function register(){
        if(isset($_POST['dangky'])){
           $data = [];
           $data['email'] = $_POST['re-email'];
           $data['password'] = $_POST['mk'];
           $repass = $_POST['remk'];
           $data['name'] = $_POST['hoten'];
           $data['phone'] = $_POST['sdt'];

           if($data['password'] === $repass){
               $result = $this->user->checkmail($data['email']);
               if($result){
                   echo "<script>
                   alert('Email đã tồn tại');
               </script>";
           
               echo "<script>
                   location.href='index.php';
               </script>";
               }else{
                   $this->user->insertUser($data);
                   echo "<script>
                   alert('Đăng ký thành công');
               </script>";
           
               echo "<script>
                   location.href='index.php';
               </script>";
               }
           }else{
               echo "<script>
                   alert('Mật khẩu không trùng khớp ');
               </script>";

               echo "<script>
                   location.href='index.php';
               </script>";
           }
         }
   }

   public function login(){
    if(isset($_POST['dangnhap'])){
        $email = $_POST['email'];
        $password = $_POST['mklogin']; 
        $result = $this->user->checkUser($email, $password);
        if(is_array($result)){
            if($result['role'] == 1 && $result['active'] == 1){
                // $_SESSION['admin'] = $result['username'];
                echo "<script>
                    alert('Đăng nhập admin thành công');
                </script>";
                echo "<script>
                    location.href='admin/index.php';
                </script>";
            }else if ($result['role'] == 0 && $result['active'] == 1){
                $_SESSION['user'] = $result['email'];
                echo "<script>
                    alert('Đăng nhập thành công');
                </script>";
                echo "<script>
                    location.href='index.php';
                </script>";
            }else{
                echo "<script>
                    alert('Tài khoản không tồn tại, vui lòng đăng ký tài khoản mới');
                </script>";
                echo "<script>
                    location.href='index.php';
                </script>";
            }
        }else{
            echo "<script>
                alert('Sai tên hoặc mật khẩu');
            </script>";
            echo "<script>
                location.href='index.php';
            </script>";
        }
    }
}

}