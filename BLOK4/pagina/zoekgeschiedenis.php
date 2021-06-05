<?php
$page = 'admin';
include_once ('../models/server.php');
include_once ('../models/config.php');
include_once ('../models/functions.php');
require_once 'header.php';

if (isset($_POST['save']) && isset($_POST['check']))
{
    $checkbox = $_POST['check'];
    for ($i = 0;$i < count($checkbox);$i++)
    {
        $delete_id = $checkbox[$i];
        ExecuteQuery($conn, "DELETE FROM zoekgeschiedenis WHERE zoekID='" . $delete_id . "'");
        $message = "Data succesvol verwijderd!";
    }
}
$result = ExecuteQuery($conn, "SELECT * FROM zoekgeschiedenis");
?>
<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<title>Delete zoeksleutels</title>
</head>
<body>
<div><?php if (isset($message))
{
    echo $message;
} ?>
</div>
<form method="post" action="">
<table class="table table-bordered">
<thead>
	<tr>

		<th>zoekterm</th>
		<th>datum</th>
		<th>gebruiker</th>
		<th>zoekID</th>
	    <th><input type="checkbox" id="checkAl"> Select All</th>
	</tr>
</thead>
<?php
$i = 0;
foreach ($result as $row)
{
?>
<tr>
	<td><?php echo $row["zoekterm"]; ?></td>
	<td><?php echo $row["datum"]; ?></td>
	<td><?php echo $row["gebruiker"]; ?></td>
	<td><?php echo $row["zoekID"]; ?></td>
  <td><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $row["zoekID"]; ?>"></td>
</tr>
<?php
    $i++;
}
?>
</table>
<p align="center"><button type="submit" class="btn btn-success" name="save">DELETE</button></p>
</form>
<script>
$("#checkAl").click(function () {
$('input:checkbox').not(this).prop('checked', this.checked);
});
</script>
</body>
</html>
