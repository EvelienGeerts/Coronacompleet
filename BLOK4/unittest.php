<?php
use PHPUnit\Framework\TestCase;
include 'models/functions.php';

class unittest extends TestCase {
   

//class unittest extends TestCase {
    public function testExecuteQuery() {
    $query = 'SELECT naam FROM producten
    

}

function ExecuteQuery($conn, $query, $params = array())
{
    $stmt = $conn->prepare($query);
    $stmt->execute($params);
    return $stmt;
}