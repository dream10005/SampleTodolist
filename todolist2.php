<html>
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/animate.css">
    <meta charset="utf8_unicode_ci">

<title></title>
</head>
<body>

<div class="container">
<div class="row"><h2>TODO</h2></div>
<div class="row" align="right"><a href="todolist.php" class="btn btn-default">New</a></div>
<div class="row" style="border-bottom: 1px solid;"><b>
	<div class="col-md-4 col-xs-4">Action</div>
	<div class="col-md-1 col-xs-1">Id</div>
	<div class="col-md-4 col-xs-4">Description</div>
	<div class="col-md-3 col-xs-3">Status</div></b>
</div>

<?php
	$servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "todolist";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
	$strSQL = "SELECT * FROM todo";
	$objQuery = mysqli_query($conn,$strSQL);
	while($objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC)){	?>
		<div class="row">
		<div class="col-md-4 col-xs-4"><a href="todo_edit.php?id=<?php echo $objResult["id"];?>">EDIT</a>  <a href="todo_delete.php?id=<?php echo $objResult["id"];?>" onclick="return deleletconfig()"> DEL</a>
		</div>
		<div class="col-md-1 col-xs-1"><?php echo $objResult["id"]; ?></div>
		<div class="col-md-4 col-xs-4"><?php echo $objResult["description"]; ?></div>
		<div class="col-md-3 col-xs-3"><?php echo $objResult["status"]; ?></div>
		</div>
<?php }	
?>

<script>
	function deleletconfig(){
		var del=confirm("Are you sure you want to delete this record?");
		if (del==true){
   			alert ("record deleted")
		}
		return del;
	}
</script>

</div>
</body>
</html>