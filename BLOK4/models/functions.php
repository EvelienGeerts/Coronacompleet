<?php
  
include_once('config.php');

// ExecuteQuery 
function ExecuteQuery($conn, $query, $params = array())
{
    $stmt = $conn->prepare($query);
    $stmt->execute($params);
    return $stmt;
}


//FetchQuery
function FetchQuery($conn, $query, $params = array())
{
    return ExecuteQuery($conn, $query, $params)->fetchAll(PDO::FETCH_ASSOC);
}

  
// Aanmaken van een tijdelijke gebruiker mbv het session_id
function CreateTempUser($conn)
{
    $sessionId = session_id();

    $stmt = $conn->prepare("INSERT INTO klanten (email) VALUES (?);");
    $stmt->execute([$sessionId]);

    $_SESSION["email"] = $sessionId;
}



// Berekening van het eindtotaal bedrag
function EindTotaal($email, $conn)
{
    $result = FetchQuery($conn, "SELECT * FROM winkelmand INNER JOIN producten ON winkelmand.productnummer = producten.productnummer WHERE email = :email", array(
        ':email' => $email
    ));
    $eindtotaal = 0;
    foreach ($result as $row)
    {
        $tprijs = $row["prijs"] * $row["aantal"];
        $eindtotaal += $tprijs;
    }
    return $eindtotaal;
}


// Controle apenstaartje bij bestellingen.php
function AtSignCheck($semail)
{
    $semail = $_SESSION["email"];
    if (strstr($semail, '@'))
    {
        echo $semail;
    }
}


// Verwijderen van de temp user + de winkelmand van de temp user
function DeleteTempUser($sessionId, $conn)
{
  $sessionId = session_id();
  if ($sessionId == $_SESSION['email']) 
  {
    ExecuteQuery($conn, "DELETE FROM winkelmand WHERE email = ?", array($sessionId));
    ExecuteQuery($conn, "DELETE FROM klanten WHERE email = ?", array($sessionId));
  }
}


// DestroySession logout na 60 min en verwijrderd de Temp User
function DestroySessionTimer($session, $conn)
{
    if ($session && !isset($_SESSION['login_time']))
    {
        if ($session == 1)
        {
            $_SESSION['login_time'] = time();
            $_SESSION['idle_time'] = $_SESSION['login_time'] + 1800; // 1800 = 30min
            
        }
        else
        {
            $_SESSION['login_time'] = "";
        }
    }
    else
    {
        if (time() > $_SESSION['idle_time'])
        {
            $sessionId = session_id();
            DeleteTempUser($sessionId, $conn);
            session_destroy();
            session_unset();
            header("location:../../../../../git-coronacompleet/BLOK4/pagina/logout.php");
        }
    }
}

?>