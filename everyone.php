<?php
	session_start();
	require("connection/connect.php");
	$tag="";
	if (isset($_GET['tag']))
	$tag=$_GET['tag'];
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Welcome to College Management system</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="jquery-1.11.0.js"></script>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css"/>
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="css/home.css" />
<link rel="stylesheet" type="text/css" href="css/everyone_format.css" />
</head>

<body>
	<div style="margin:8px;" >
    <div class="logout_btn">
        <a href="index.php" class="btn btn-primary btn-large">Logout <i class="icon-white icon-check"></i></a>
    </div>
    <div class="home_btn">
        <a href="everyone.php" class="btn btn-primary btn-large">Home <i class="icon-white icon-check"></i></a>
    </div>
	<br>               
    <div class="dropdownmenu_container">
		<?php        
			include './drop_down_menu.php';
		?><br/>
		
    </div>
		
		<div class="container_middle">		
			
			<div class="container_show_post">
				<?php
						if($tag=="home" or $tag=="")
							include("home.php");
						elseif($tag=="view_department")
							include("department/View_Department.php");
						elseif($tag=="department_entry")
                            include("department/Department_Entry.php");

                        elseif($tag=="student_entry")
                            include("students/Students_Entry.php");
						elseif($tag=="view_students")
                            include("students/View_Students.php");
							
                        elseif($tag=="teachers_entry")
                            include("teachers/Teachers_Entry.php");
						elseif($tag=="view_teachers")
							include("teachers/View_Teachers.php");

						elseif($tag=="subject_entry")
                            include("subjects/Subject_Entry.php");
						elseif($tag=="view_subjects")
							include("subjects/View_Subjects.php");

                        elseif($tag=="score_entry")
                            include("scores/Score_Entry.php");	
						elseif($tag=="view_scores")
							include("scores/View_Scores.php");

						elseif($tag=="test_score")
							include("test_Scores.php");
                        ?>
                    </div>
		</div>                
	</div>
	</div>
	
</body>
</html>