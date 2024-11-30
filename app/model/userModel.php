<?php
class UserModel
{
    private $db;
    function __construct()
    {
        $this->db = new DataBase();
    }
    //thêm người dùng vào db
    public function insertUser($data, $verificationCode)
    {
        $sql = "INSERT INTO users (email, password, name, phone, code) VALUES (?,?,?,?,?)";
        $param = [$data['email'], $data['password'], $data['name'], $data['phone'], $verificationCode];
        return $this->db->insert($sql, param: $param);
    }
    //kiểm tra email khi đăng kí
    public function checkmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = '$email'";
        return $this->db->getOne($sql);
    }
    //kiểm tra người dùng khi đăng nhập
    public function checkUser($email, $password){
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        return $this->db->getOne($sql);
    }
    //kiểm tra khi ng dùng quên mật khẩu
    function checkForgot($email,$phone){
        $sql = "SELECT * FROM users WHERE email = '$email' AND phone = '$phone'";
        return $this->db->getOne($sql);
    }
    //cập nhật mật khẩu mới
    function updatePass($data){
        $sql = "UPDATE users SET password =? WHERE email =? AND phone =?";
        $param = [$data['password'], $data['email'],$data['phone'],];
        return $this->db->update($sql, $param);
    }
    //acvive người dùng
    function verify($code) {
        $sql = "UPDATE users SET active = 1 WHERE code = ? AND active = 0";
        $param = [$code];
        return $this->db->update($sql, $param);
    }
}
