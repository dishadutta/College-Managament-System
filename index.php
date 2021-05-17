<?php
	session_start();
	require("connection/connect.php");
	$msg="";
	if(isset($_POST['btn_log'])){
		$uname=$_POST['unametxt'];
		$pwd=$_POST['pwdtxt'];
		
		$sql=mysql_query("SELECT * FROM users WHERE username='$uname' AND password='$pwd' ");
						
		$cout=mysql_num_rows($sql);
			if($cout>0){
				$row=mysql_fetch_array($sql);
					if($row['type']=='admin')
						$msg="Login error...";	
					else
						header("location: everyone.php");
			}
			else
					$msg="Invalid login authentication, try again!";
}

?>

<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
<title>College Database Management System</title>
</head>

<body>
<br>
	<div class="container" style="dispalay:block; margin-top: 200px; ">
    	<div>
			<h5 style="text-align: center;">Admin Login</h5>
    		<h6 style="text-align: center;">Only for college authorities and staff members</h6>
    	</div><br>
		<div class="container" style="width: 400px;">
    		<form method="post">
                <input type="text" class="form-control" name="unametxt" placeholder="Username" title="Enter username here" /><br>
                <input type="password" class="form-control" name="pwdtxt" placeholder="Password" title="Enter username here" /><br>
    			<input style="margin-left: 150px;" type="submit" href="#" class="btn btn-primary" name="btn_log" value="Sign in"/>
    		</form>
		</div>
    </div>
	
        <h2 style="color: #FF0000; text-align: center; font-size: 20px;">
            <?php echo $msg; ?>
        </h2>    
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
</body>
</html>