<?php
include('../models/config.php');

function ExecuteQuery($conn, $query, $params = array()) {
  $stmt = $conn->prepare($query);
  $stmt->execute($params);
return $stmt;
}

function FetchQuery($conn, $query, $params = array()) {
    return ExecuteQuery($conn, $query, $params)->fetchAll(PDO::FETCH_ASSOC);
}
?>

<?php
 if(isset($_POST["Import"])){
    
    $filename=$_FILES["file"]["tmp_name"];    
     if($_FILES["file"]["size"] > 0)
     {
        $file = fopen($filename, "r");
          while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
           {
             $sql = "INSERT into employeeinfo (emp_id,firstname,lastname,email,reg_date) 
                   values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."')";
        // mysqli_query ?????
                   $result = mysqli_query($con, $sql);
        if(!isset($result))
        {
          echo "<script type=\"text/javascript\">
              alert(\"Invalid File:Please Upload CSV File.\");
              window.location = \"index.php\"
              </script>";    
        }
        else {
            echo "<script type=\"text/javascript\">
            alert(\"CSV File has been successfully Imported.\");
            window.location = \"index.php\"
          </script>";
        }
           }
      
           fclose($file);  
     }
  } 
  
  // Aanmaken van een tijdelijke gebruiker mbv het session_id
  function CreateTempUser($conn){
    $sessionId = session_id();
    
    $stmt = $conn->prepare("INSERT INTO klanten (email) VALUES (?);");
    $stmt->execute([$sessionId]);

    $_SESSION["email"] = $sessionId; 
  } 
?>