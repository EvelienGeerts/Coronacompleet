<?php

use PHPUnit\Framework\TestCase;
import model\products;

class productenTest extends TestCase {
    public function testConstructor()
    {
        $product = new Product('1');
        $this->assertEquels('1', $product->getID())  ;       
    }
}
