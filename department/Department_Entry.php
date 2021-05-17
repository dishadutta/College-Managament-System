<?php
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
if(isset($_POST['btn_sub'])){
	$department_name=$_POST['dept_name'];
	$note=$_POST['notetxt'];	
	

$sql_ins=mysql_query("INSERT INTO department 
						VALUES(
							NULL,
							'$dept_name',
							'$note'
							)
					");
if($sql_ins==true)
	$msg="1 Row Inserted";
else
	$msg="Insert Error:".mysql_error();
	
}

//------------------uodate data----------
if(isset($_POST['btn_upd'])){
	$dept_name=$_POST['dept_name'];
	$note=$_POST['notetxt'];	
	
	$sql_update=mysql_query("UPDATE department SET 
								dept_name='$dept_name',
								note='$note'
							WHERE
								dept_id=$id
							");
	if($sql_update==true)
		echo "<div style='background-color: white;padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                . "<span class='p_font'>"
                . "Record Updated Successfully... !"
                . "</span>"
                . "</div>";
	else
		$msg="Update Failed...!";
	}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style_entry.css" />
</head>

<body>

<?php

if($opr=="upd")
{
	$sql_upd=mysql_query("SELECT * FROM department WHERE dept_id=$id");
	$rs_upd=mysql_fetch_array($sql_upd);
	
?>
<div class="container" style="width: 800px; ">
<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-hdd"></span> Department's Update Form</h1></div>
  			<div class="panel-body">
			<div >
				<p style="text-align:center;">Update the department's detail to record into database.</p>
			</div>

<div class="container" style="padding-left:  240px;">
    <form method="post">
        <div style="width:270px;">
            <input type="text" style="width: 250px;" class="form-control" name="fnametxt" value="<?php echo $rs_upd['dept_name'];?>"/><br>
            <textarea name="notetxt" class="form-control" cols="18" value='<?php  echo $rs_upd['note'];?>' rows="4"></textarea><br><Br>
            <input type="submit" name="btn_upd" href="#"  class="btn btn-primary btn-large" value="Register" />&nbsp;&nbsp;&nbsp;
	    	<input type="reset"  href="#" class="btn btn-primary btn-large" value="Cancel" />
        </div>
    </form>
</div>
</div>
<?php	
}
else
{
?>
<div class="container" style="width: 800px; ">
<div class="panel panel-default" >
  		<div class="panel-heading" style="background-color:grey;"><h1 ><span class="glyphicon glyphicon-hdd"></span> Department's Entry Form</h1></div>
  			<div class="panel-body">
			<div>
				<p style="text-align:center;">Add new department's detail to record into database.</p>
			</div>

<div class="container" style="padding-left:  240px;">
    <form method="post">
        <div style="width:270px;">
            <input type="text" style="width: 250px;" class="form-control" name="dept_name" placeholder='Department name'/><br>
            <textarea name="notetxt" class="form-control" cols="18" placeholder='Add notes..' rows="4"></textarea><br><Br>
            <input type="submit" name="btn_sub" href="#" class="btn btn-primary btn-large" value="Register" />&nbsp;&nbsp;&nbsp;
	    	<input type="reset"  href="#" class="btn btn-primary btn-large" value="Cancel" />
        </div>
    </form>
</div>
</div>
<?php
}
?>
</body>
</html>