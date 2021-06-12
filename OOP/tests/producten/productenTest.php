<?php

use PHPUnit\Framework\TestCase;
include 'models/product.php';


class productenTest extends TestCase 
{
    public function testConstructor()
    {
        $product = new Product('1','mondkap','test','test123', '20', 'imgTest','1000');
        $this->assertEquals('1', $product->getID())  ; 
        $this->assertEquals('mondkap', $product->getName())  ;
        $this->assertEquals('test', $product->getDescription())  ;
        $this->assertEquals('test123', $product->getContent())  ;
        $this->assertEquals('20', $product->getPrice())  ;
        $this->assertEquals('imgTest', $product->getImage())  ;
        $this->assertEquals('1000', $product->getSupply())  ;
    }
}
