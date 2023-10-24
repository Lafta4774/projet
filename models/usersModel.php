<?php
class users
{
    public $id;
    public $username;
    public $email;
    public $password;
    public $id_roles;
    private $db;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=tp;charset=utf8', 'root', '');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function add()
    {
        $query = 'INSERT INTO `xso6r_users`(`username`, `email`, `password`, `id_roles`) VALUES (:username,:email,:password,3)';
        $request = $this->db->prepare($query);
        $request->bindValue(':username', $this->username, PDO::PARAM_STR);
        $request->bindValue(':email', $this->email, PDO::PARAM_STR);
        $request->bindValue(':password', $this->password, PDO::PARAM_STR);
        return $request->execute();
    }
    public function checkIfExistsByUsername()
    {
        $query = 'SELECT COUNT(*) FROM `xso6r_users` WHERE username = :username';
        $request = $this->db->prepare($query);
        $request->bindValue(':username', $this->username, PDO::PARAM_STR);
        $request->execute();
        return $request->fetch(PDO::FETCH_COLUMN);
    }
    public function checkIfExistsByEmail()
    {
        $query = 'SELECT COUNT(*) FROM `xso6r_users` WHERE email = :email';
        $request = $this->db->prepare($query);
        $request->bindValue(':email', $this->email, PDO::PARAM_STR);
        $request->execute();
        return $request->fetch(PDO::FETCH_COLUMN);
    }
    public function getPassword()
    {
        $query = 'SELECT `password` FROM `xso6r_users` WHERE `username` = :username';
        $request = $this->db->prepare($query);
        $request->bindValue(':username', $this->username, PDO::PARAM_STR);
        $request->execute();
        return $request->fetch(PDO::FETCH_COLUMN);
    }
    public function getId()
    {
        $query = 'SELECT `id` FROM `xso6r_users` WHERE `username` = :username';
        $request = $this->db->prepare($query);
        $request->bindValue(':username', $this->username, PDO::PARAM_STR);
        $request->execute();
        return $request->fetch(PDO::FETCH_COLUMN);
    }
    public function getInfo()
    {
        $query = 'SELECT `username`, `email` FROM `xso6r_users` WHERE `id` = :id';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        $request->execute();
        return $request->fetch(PDO::FETCH_OBJ);
    }
    public function updateUsername()
    {
        $query = 'UPDATE `xso6r_users` SET `username` = :username WHERE `id` = :id';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        $request->bindValue(':username', $this->username, PDO::PARAM_STR);
        return $request->execute();
    }
    public function updateEmail()
    {
        $query = 'UPDATE `xso6r_users` SET `email` = :email WHERE `id` = :id';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        $request->bindValue(':email', $this->email, PDO::PARAM_STR);
        return $request->execute();
    }
    public function updatePassword()
    {
        $query = 'UPDATE `xso6r_users` SET `password` = :password WHERE `id` = :id';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        $request->bindValue(':password', $this->password, PDO::PARAM_STR);
        return $request->execute();
    }
    public function delete()
    {
        $query = 'DELETE FROM `xso6r_users` WHERE `id` = :id';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $request->execute();
    }
}
