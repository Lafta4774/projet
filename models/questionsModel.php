<?php
class questions
{
    public $id;
    public $title;
    public $date;
    public $content;
    public $id_users;
    public $id_categories;
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
        $query = 'INSERT INTO `xso6r_questions` (`title`, `date`, `content`, `id_users`, `id_categories`) VALUES (:title, NOW(), :content, :id_users, :id_categories)';
        $request = $this->db->prepare($query);
        $request->bindValue(':title', $this->title, PDO::PARAM_STR);
        $request->bindValue(':content', $this->content, PDO::PARAM_STR);
        $request->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $request->bindValue(':id_categories', $this->id_categories, PDO::PARAM_INT);
        return $request->execute();
    }

    public function getList()
    {
        $query = 'SELECT `xso6r_questions`.`id`, `title`, DATE_FORMAT(`date`, "%d/%m/%Y %Hh%i") as `date`, `content`, `name`, `username` FROM `xso6r_questions` INNER JOIN `xso6r_users` ON `xso6r_users`.`id` = `xso6r_questions`.`id_users` INNER JOIN `xso6r_categories` ON `xso6r_categories`.`id` = `xso6r_questions`.`id_categories`';
        $request = $this->db->query($query);
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    public function getSingleQuestion(){
        $query='SELECT `title`, DATE_FORMAT(`date`, "%d/%m/%Y %Hh%i") as `date`, `content`, `name`, `username`, `id_categories`, `id_users` FROM `xso6r_questions` INNER JOIN `xso6r_users` ON `xso6r_users`.`id` = `xso6r_questions`.`id_users` INNER JOIN `xso6r_categories` ON `xso6r_categories`.`id` = `xso6r_questions`.`id_categories` WHERE `xso6r_questions`.`id` = :id';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        $request->execute();
        return $request->fetch(PDO::FETCH_OBJ);
    }

    public function modify(){
        $query='UPDATE `xso6r_questions` SET `title` = :title, `id_categories`=:id_categories, `date`=NOW(), `content`=:content WHERE `id` =:id';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        $request->bindValue(':title', $this->title, PDO::PARAM_STR);
        $request->bindValue(':content', $this->content, PDO::PARAM_STR);
        $request->bindValue(':id_categories', $this->id_categories, PDO::PARAM_INT);
        return $request->execute();
    }
    
    public function delete(){
        $query = 'DELETE FROM `xso6r_questions` WHERE `id` = :id';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $request->execute();
    }
}
