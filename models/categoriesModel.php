<?php
class categories
{
    public $id;
    public $name;
    private $db;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=tp;charset=utf8', 'root', '');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getList()
    {
        $query = 'SELECT `id`, `name` FROM `xso6r_categories`';
        $request = $this->db->query($query);
        return $request->fetchAll(PDO::FETCH_OBJ);
    }
}
