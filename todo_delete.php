<html>
<head>
<title>
</title>
</head>
<body>

<?php 
	$id = $_GET["id"];
	$servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "todolist";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $sql = "DELETE FROM todo WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    echo "
    	<html>
        <meta http-equiv=\"Refresh\" content=\"0; URL=todolist2.php\">
        </html>
        "; 
?>
</body>
</html>