<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/animate.css">
    <meta charset="utf8_unicode_ci">
<tilte>
</titile>
</head>
<body>

<div class="container">
<form action="" method="post">
<div class="row">
<div class="col-md-2 col-xs-2" align="right">
<label for="id">id :</label>
</div>
<div class="col-md-10 col-xs-10"><?php $id = Gen_ID(); echo $id; ?><input type="hidden" name="id" value="<?php echo $id; ?>"></div>
</div>
<div class="row">
<div class="col-md-2 col-xs-2" align="right"><label for="description">Description :</label></div>
<div class="col-md-10 col-xs-10"><input type="text" class="form-control" name="description" placeholder="Description"></div>
</div>
<div class="row">
<div class="col-md-2 col-xs-2" align="right"><label for="assignee">Assignee :</label></div>
<div class="col-md-10 col-xs-10"><input type="email" name="assignee" class="form-control"></div>
</div>
<div class="row">
<div class="col-md-2 col-xs-2" align="right"><label for="status">Status :</label></div>
<div class="col-md-10 col-xs-10">
	<select name="status" class="form-control">
  		<option value="Open">Open</option>
  		<option value="In progress">In Progress</option>
  		<option value="Done">Done</option>
	</select></div>
</div>
<div class="row">
<div class="col-md-2 col-xs-2" align="right"><label for="date">Due Date :</label></div>
<div class="col-md-10 col-xs-10"><input type="Date" name="date" class="form-control"></div>
</div>
<div class="row">
<div class="col-md-2 col-xs-2" align="right"><label for="comment">Comment :</label></div>
<div class="col-md-10 col-xs-10"><textarea name="comment" rows="10" cols="30" class="form-control"></textarea></div>
</div>
<div class="row">
<div class="col-md-2 col-xs-2"></div>
<div class="col-md-2 col-xs-2"><a href="todolist2.php" class="btn btn-default">Cancel</a>
<button type="submit" name="save" value="1" class="btn btn-primary">Save</button></div>
</div>
</form>

<?php 
                    if(isset($_POST['save'])){
                
                            updater($_POST['id'],$_POST['description'],$_POST['assignee'],$_POST['status'],$_POST['date'],$_POST['comment']);
                    	
                    }

                        function updater($id, $description, $assignee, $status, $date, $comment){
                        $servername = "localhost";
                        $username = "root";
                        $password = "root";
                        $dbname = "todolist";
                        $conn = mysqli_connect($servername, $username, $password, $dbname);

                       
                       	$sql = "INSERT INTO todo (id, description, assignee, status, date, comment) VALUES ('$id','$description','$assignee','$status','$date','$comment')";
          
    
                       	$result = mysqli_query($conn, $sql);

                       	echo "
                                <html>
                                    <meta http-equiv=\"Refresh\" content=\"0; URL=todolist2.php\">
                                </html>
                            "; 
                    }

                 	 	function Gen_ID(){		
							$servername = "localhost";
                        	$username = "root";
                        	$password = "root";
                        	$dbname = "todolist";
                        	$conn = mysqli_connect($servername, $username, $password, $dbname);
							$New_ID = 0;
							$Current_ID = 0;
							$strSQL = "SELECT * FROM todo";
							$objQuery = mysqli_query($conn,$strSQL);
							while($objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC)){	
								$Current_ID = $objResult["id"];
							}	
								$New_ID	= $Current_ID + 1;
							return $New_ID;
							}	
            
                    ?>
</div>
</body>
</html>