<?php
class UserModel
{
    private $db;
    function __construct()
    {
        $this->db = new DataBase();
    }
    public function insertUser($data)
    {
        $sql = "INSERT INTO users (email, password, name, phone) VALUES (?,?,?,?)";
        $param = [$data['email'], $data['password'], $data['name'], $data['phone']];
        return $this->db->insert($sql, param: $param);
    }

    public function checkmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = '$email'";
        return $this->db->getOne($sql);
    }

    public function checkUser($email, $password){
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        return $this->db->getOne($sql);
    }
}
