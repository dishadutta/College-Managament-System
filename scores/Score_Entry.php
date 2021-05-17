<?php
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
						
if(isset($_POST['btn_sub'])){
	$stu_name=$_POST['sudenttxt'];
	$dept_name=$_POST['depttxt'];
	$sub_name=$_POST['subjecttxt'];
	$miderm=$_POST['midermtxt'];
	$final=$_POST['finaltxt'];
	$note=$_POST['notetxt'];	
	

$sql_ins=mysql_query("INSERT INTO student_score 
						VALUES(
							NULL,
							'$stu_name',
							'$dept_name' ,
							'$sub_name',
							'$miderm',
							'$final',
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
	$stu_id=$_POST['sudenttxt'];
	$dept_id =$_POST['depttxt'];
	$sub_id=$_POST['subjecttxt'];
	$miderm=$_POST['midermtxt'];
	$final=$_POST['finaltxt'];
	$note=$_POST['notetxt'];
	
	$sql_update=mysql_query("UPDATE student_score SET
							stu_id='$stu_id' ,
							dept_id='$dept_id' ,
							sub_id='$sub_id' ,
							miderm='$miderm' ,	
							final='$final' ,
							note='$note' 
						WHERE ss_id=$id

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
	$sql_upd=mysql_query("SELECT * FROM student_score WHERE ss_id=$id");
	$rs_upd=mysql_fetch_array($sql_upd);
?>

<div class="container" style="width: 800px; ">
<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-star-empty"></span> Score's Update Form</h1></div>
  			<div class="panel-body">
			<div >
				<p style="text-align:center;">Update the score's records into database.</p>
			</div>
			<div class="container" style="width: 600px; ">
                  <form method="post">    
                    <div class="teacher_bday_box" style="margin-left: 0px;">
					<div class="select_style">
    					<select name="sudenttxt" style="width: 200px;">
                                            <option>Student's name</option>
                            <?php
                          		$student_name=mysql_query("SELECT * FROM student");
								while($row=mysql_fetch_array($student_name)){
									 if($row['stu_id']==$rs_upd['stu_id'])
								   		$iselect="selected";
									else
										$iselect="";
								?>
                                <option value="<?php echo $row['stu_id'];?>" <?php echo $iselect ;?> > <?php echo $row['f_name']; echo" "; echo $row['l_name'];?> </option>
								<?php	
								}
                            ?>
                            
                    </select>
                </div>
            </div><br><br>
            
            <div class="teacher_bday_box" style="margin-left: 0px;">
					<div class="select_style">
                                            <select name="depttxt" style="width: 200px">
                                            <option>Department's name</option>
                            <?php
                               $dept_name=mysql_query("SELECT * FROM department");
							   while($row=mysql_fetch_array($dept_name)){
								    if($row['dept_id']==$rs_upd['dept_id'])
								   		$iselect="selected";
									else
										$iselect="";
								?>
                        		<option value="<?php echo $row['dept_id'];?>" <?php echo $iselect ;?> > <?php echo $row['dept_name'];?> </option>
                                <?php 
							   }
                            ?>
                    </select>
                </div>
            </div><br><Br>
            
            <div class="teacher_bday_box" style="margin-left: 0px;">
					<div class="select_style">
                                            <select name="subjecttxt" style="width: 200px">
                                            <option>Subject's name</option>
                            <?php
                               $subject=mysql_query("SELECT * FROM subjects");
							   while($row=mysql_fetch_array($subject)){
								   if($row['sub_id']==$rs_upd['sub_id'])
								   		$iselect="selected";
									else
										$iselect="";
							?>
                            <option value="<?php echo $row['sub_id'];?>" <?php echo $iselect ;?> > <?php echo $row['sub_name'];?> </option>
                            <?php	   
							   }
                            ?>
                    </select>
                </div>
            </div><br><br>
                    
                    <div>
                	<input type="text" name="midermtxt" class="form-control" id="textbox" value="<?php echo $rs_upd['miderm'];?> "/>
                    </div><br>
                    
                    <div>
                	<input type="text" name="finaltxt" class="form-control" id="textbox" value="<?php echo $rs_upd['final'];?>" />
                    </div><br>
                    
                    <div>
                	<textarea name="notetxt" class="form-control" cols="23" rows="3"><?php echo $rs_upd['note'];?></textarea>
                    </div><br><br>
                    
                    <div>
                	<input type="submit" class="btn btn-primary btn-large" name="btn_upd" value="Update" id="button-in" title="Update"  />
                        <input type="reset" style="margin-left: 9px;" class="btn btn-primary btn-large" value="Cancel" id="button-in"/>
                    </div>
                    </div>
					</form>
					</div>
   </div>
</div>
</div>
<?php	
}
else
{
?>
	<div class="container" style="width: 800px; ">
    <div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-star-empty"></span> Score's Entry Form</h1></div>
  			<div class="panel-body">
			<div>
				<p style="text-align:center;">Entry the score's records into database.</p>
			</div>
			<div class="container" style="width: 600px; ">
                  <form method="post">    
                    <div class="teacher_bday_box" style="margin-left: 0px;">
					<div class="select_style">
    					<select name="sudenttxt" style="width: 200px;">
                                            <option>Student's name</option>
                            <?php
                          		$student_name=mysql_query("SELECT * FROM student");
								while($row=mysql_fetch_array($student_name)){
								?>
                                <option value="<?php echo $row['stu_id'];?>"> <?php echo $row['f_name']; echo" "; echo $row['l_name'];?> </option>
								<?php	
								}
                            ?>
                            
                    </select>
                </div>
                </div><br><br>
            
            <div class="teacher_bday_box" style="margin-left: 0px;">
					<div class="select_style">
                                            <select name="depttxt" style="width: 200px">
                                            <option>Department's name</option>
                            <?php
                               $dept_name=mysql_query("SELECT * FROM department");
							   while($row=mysql_fetch_array($dept_name)){
								?>
                        		<option value="<?php echo $row['dept_id'];?>"> <?php echo $row['dept_name'];?> </option>
                                <?php 
							   }
                            ?>
                    </select>
                </div>
            </div><br><br>
            
            <div class="teacher_bday_box" style="margin-left: 0px;">
					<div class="select_style">
                                            <select name="subjecttxt" style="width: 200px">
                                            <option>Subject's name</option>
                            <?php
                               $subject=mysql_query("SELECT * FROM subjects");
							   while($row=mysql_fetch_array($subject)){
							?>
                            <option value="<?php echo $row['sub_id'];?>"> <?php echo $row['sub_name'];?> </option>
                            <?php	   
							   }
                            ?>
                    </select>
                </div>
            </div><br><br>
                
                <div>
                	<input class="form-control" type="text" name="midermtxt" id="textbox" placeholder='Midterm' />
                </div><br>
            
                <div>
                	<input type="text" class="form-control" name="finaltxt"  id="textbox" placeholder='Final'/>
                </div><br>
                
                <div>
                	<textarea name="notetxt" cols="23" class="form-control" rows="3" placeholder='Add note..'></textarea>
                </div><br><br>
                
                <div>
                    <input type="submit" class="btn btn-primary btn-large" name="btn_sub" value="Add Now" id="button-in"  />
                    <input type="reset" style="margin-left: 9px;" class="btn btn-primary btn-large" value="Cancel" id="button-in"/>                	
                </div>
                </form>
				</div>
                </div>
    </div>
	</div>
<?php
}
?>
</body>
</html>