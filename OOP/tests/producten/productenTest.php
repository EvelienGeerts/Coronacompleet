<?php

use PHPUnit\Framework\TestCase;
include 'models/product.php';


class productenTest extends TestCase 
{
    public function testConstructor1()
    {
        $product = new Product('1','mondkap','test','test123', '20', 'imgTest','1000');        
        $this->assertEquals('1', $product->getID())  ; 
    }

    public function testConstructor2()
    {
        $product = new Product('1','mondkap','test','test123', '20', 'imgTest','1000');
        $this->assertEquals('mondkap', $product->getName())  ;

    }    
    public function testConstructor3()
    {
        $product = new Product('1','mondkap','test','test123', '20', 'imgTest','1000');
        $this->assertEquals('test', $product->getDescription())  ;

    }
    public function testConstructor4()
    {
        $product = new Product('1','mondkap','test','test123', '20', 'imgTest','1000');
        $this->assertEquals('test123', $product->getContent())  ;

    }
    public function testConstructor5()
    {
        $product = new Product('1','mondkap','test','test123', '20', 'imgTest','1000');
        $this->assertEquals('20', $product->getPrice())  ;

    }
    public function testConstructor6()
    {
        $product = new Product('1','mondkap','test','test123', '20', 'imgTest','1000');
        $this->assertEquals('imgTest', $product->getImage())  ;

    }
    public function testConstructor7()
    {
        $product = new Product('1','mondkap','test','test123', '20', 'imgTest','1000');
        $this->assertEquals('1000', $product->getSupply())  ;
    }
    
}
