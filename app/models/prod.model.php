<?php
require_once './app/models/model.php';
class prodModel extends Model
{

    function getDataProduct()
    {

        $query = $this->db->prepare('SELECT product_table.*, category_table.categoryName 
                                FROM product_table 
                                INNER JOIN category_table 
                                ON product_table.id_categoria = category_table.id_categoria');
        $query->execute();

        $productData = $query->fetchAll(PDO::FETCH_OBJ);

        return $productData;
    }

    function getSelectedProd($id)
    {
        $query = $this->db->prepare('SELECT product_table.*, category_table.categoryName 
                                FROM product_table 
                                INNER JOIN category_table 
                                ON product_table.id_categoria = category_table.id_categoria 
                                WHERE product_table.id_product = ?');

        $query->execute([$id]);
        $productData = $query->fetchAll(PDO::FETCH_OBJ);
        return $productData;
    }

    function getProductRelate($idCat)
    {
        $query = $this->db->prepare('SELECT * FROM `product_table` WHERE id_categoria = ?');
        $query->execute([$idCat]);

        $prodsRel = $query->fetchAll(PDO::FETCH_OBJ);

        return $prodsRel;
    }
    function getProductDetails($id)
    {
        $query = $this->db->prepare('SELECT * FROM `product_table` WHERE id_product = ?');
        $query->execute([$id]);

        $prodsDet = $query->fetchAll(PDO::FETCH_OBJ);

        return $prodsDet;
    }
    function insertProductToTable($productName, $productModel, $price, $weight, $height, $storage, $category)
    {
        $query = $this->db->prepare('INSERT INTO product_table (productName, model, price, weightKG, height_cm, storageGB, id_categoria) VALUES (?, ?, ?, ?, ?, ?, ?)');
        $query->execute([$productName, $productModel, $price, $weight, $height, $storage, $category]);

        return $this->db->lastInsertId();
    }
    function updateProdData($id, $productName, $model, $price, $weightKG, $height_cm, $storageGB, $id_categoria)
    {
        $query = $this->db->prepare('UPDATE product_table SET productName = ?, model = ?, price = ?, weightKG = ?, height_cm = ?, storageGB = ?, id_categoria = ? WHERE id_product = ?');
        $query->execute([$productName, $model, $price, $weightKG, $height_cm, $storageGB, $id_categoria, $id]);
    }
    function getProdOrderBy($sort, $order)
    {
        $query = $this->db->prepare("SELECT * FROM `product_table` ORDER BY $sort $order");

        $query->execute();

        $prodOrd = $query->fetchAll(PDO::FETCH_OBJ);

        return $prodOrd;
    }
    function getProdFilter($filterBy, $filterValue)
    {
        $query = $this->db->prepare("SELECT * FROM `product_table` WHERE $filterBy = ?");

        $query->execute([$filterValue]);

        $filterProd = $query->fetchAll(PDO::FETCH_OBJ);

        return $filterProd;
    }
}
