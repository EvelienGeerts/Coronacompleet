
<?php
include('../models/config.php');

function ExecuteQuery($conn, $query, $params = array()) {
  $stmt = $conn->prepare($query);
  $stmt->execute($params);
return $stmt;
}

function FetchQuery($conn, $query, $params = array())
{
    return ExecuteQuery($conn, $query, $params)->fetchAll(PDO::FETCH_ASSOC);
}
?>