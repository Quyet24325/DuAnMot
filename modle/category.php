<?php
require_once '../connect/connect.php';
class Category extends connect
{
    public function  listCategory()
    {
        $sql = "select * from categories";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function create($name, $images, $status, $description)
    {
        $sql = 'insert into categories(name,image,status,description) value (?,?,?,?)';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name, $images, $status, $description]);
    }
}
