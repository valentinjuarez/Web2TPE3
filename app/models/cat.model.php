<?php

class catModel
{

    function getConnection()
    {
        $db = new PDO('mysql:host=localhost;dbname=crownytech;charset=utf8', 'root', '');
        return $db;
    }

    function getCategory()
    {
        $db = $this->getConnection();
        $query = $db->prepare('SELECT * FROM `category_table`');

        $query->execute();

        $categoryData = $query->fetchAll(PDO::FETCH_OBJ);

        return $categoryData;
    }
    function getSelectedCat($id)
    {
        $db = $this->getConnection();
        $query = $db->prepare('SELECT * FROM `category_table` WHERE id_categoria = ?');
    
        $query->execute([$id]);
        $categoryData = $query->fetchAll(PDO::FETCH_OBJ);
        return $categoryData;
    }
    function insertCategory($categoryName, $descripcion)
    {
        $db = $this->getConnection();
        $query = $db->prepare('INSERT INTO category_table (categoryName, descripcion) VALUES (?, ?)');
        $query->execute([$categoryName, $descripcion]);

        return $db->lastInsertId();
    }
    function updateCatData($id, $categoryName, $descripcion)
    {
        $db = $this->getConnection();
        $query = $db->prepare('UPDATE category_table SET categoryName = ?, descripcion = ? WHERE id_categoria = ?');
        $query->execute([$categoryName, $descripcion, $id]);
    }
}
