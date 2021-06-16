<?php
//Class product met attributen en methoden
class Product 
{
    public int $ID;
    public string $Name;
    public string $Description;
    public string $Content;
    public string $Price;
    public string $Image;
    public int $Supply;
// het initialiseren van de attributen
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
    // Class get tests // 
    public function getID()
    {
        return $this->ID;
    }
    public function getName()
    {
        return $this->Name;
    }
    public function getDescription()
    {
        return $this->Description;
    }
    public function getContent()
    {
        return $this->Content;
    }
    public function getPrice()
    {
        return $this->Price;
    }
    public function getImage()
    {
        return $this->Image;
    }
    public function getSupply()
    {
        return $this->Supply;
    }
// Array van de producten en in een array opslaan 
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