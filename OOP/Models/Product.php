<?php

require_once ( 'Model.php' );

class Product extends model
{
    public int $ID;
    public string $Name;
    public string $Description;
    public string $Content;
    public string $Price;
    public string $Image;
    public int $Supply;

    public function __construct(int $id, string $name, string $description, string $content, string $price, string $image, int $supply)
    {
        $this->ID = $id;
        $this->Name = $name;
        $this->Description = $description;
        $this->Content = $content;
        $this->Price = $price;
        $this->Image = $image;
        $this->Supply = $supply;
    }

    public static function getAll()
    {
        $pdo = DB::connect();

        $stmt = $pdo->prepare("SELECT * FROM producten");
        $stmt->execute();

        $productArray = [];

        $allProducts = $stmt->fetchAll();

        foreach($allProducts as $product)
        {
            array_push($productArray , new Product($product['productnummer'], $product['naam'], $product['description'], $product['content'], $product['prijs'], $product['image'], $product['voorraad']) );
        }

        return $productArray;
    }

    public static function getByID($id)
    {
        $pdo = DB::connect();

        $stmt = $pdo->prepare("SELECT * FROM producten where productnummer = :productnummer");
        $stmt->execute([
            ':productnummer' => $id
        ]);

        $product = $stmt->fetch();

        if($stmt->rowCount() > 0)
        {
            $returnProduct = new Product($product['productnummer'], $product['naam'], $product['description'], $product['content'], $product['prijs'], $product['image'], $product['voorraad']);
            return $returnProduct;
        }

        throw new Exception('Record niet gevonden...');
    }
}