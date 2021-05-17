<?php
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
if(isset($_POST['btn_sub'])){
	$dept_name=$_POST['depttxt'];
	$teach_name=$_POST['techtxt'];
	$semester=$_POST['semestertxt'];
	$sub_name=$_POST['subtxt'];
	$note=$_POST['notetxt'];	
	
	

$sql_ins=mysql_query("INSERT INTO subjects 
						VALUES(
							NULL,
							'$dept_name',
							'$teach_name' ,
							'$semester',
							'$sub_name' ,
							'$note'
							)
					");
	
if($sql_ins==true)
	$msg="1 Row Inserted";
else
	$msg="Insert Error:".mysql_error();
	
}

//------------------update data----------
if(isset($_POST['btn_upd'])){
	$dept_name=$_POST['depttxt'];
	$tea_id=$_POST['techtxt'];
	$semester=$_POST['semestertxt'];
	$sub_name=$_POST['subtxt'];
	$note=$_POST['notetxt'];
	
	
	$sql_update=mysql_query("UPDATE subjects SET
							dept_name='$dept_name' ,
							teacher_id='$tea_id' ,
							semester='$semester' ,
							sub_name='$sub_name' ,
							note='$note' 
						WHERE sub_id=$id

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
	$sql_upd=mysql_query("SELECT * FROM subjects WHERE sub_id=$id");
	$rs_upd=mysql_fetch_array($sql_upd);
	
?>
<div class="container" style="width: 800px; ">
<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-th-list"></span> Subject's Update Form</h1></div>
  			<div class="panel-body">
			<div>
				<p style="text-align:center;">Uupdate the subject's records into database.</p>
			</div>
			<div class="container" style="width: 600px; ">
                  <form method="post">    
                    <div class="teacher_bday_box" style="margin-left: 0px;">
					<div class="select_style">
    					<select name="depttxt" style="width: 200px;">
                                            <option>Department's name</option>
                            <?php
                               $dept_name=mysql_query("SELECT * FROM department");
							   while($row=mysql_fetch_array($dept_name)){
								   if($row['dept_name']==$rs_upd['dept_name'])
								   		$iselect="selected";
									else
										$iselect="";
								?>
                        		<option value="<?php echo $row['dept_name'];?>" <?php echo $iselect;?> > <?php echo $row['dept_name'];?> </option>
                                <?php 
							   }
							
                            ?>
                                        </select>
                                        </div>
                    </div><br><br>
            
            <div class="teacher_bday_box" style="margin-left: 0px;">
					<div class="select_style">
                                            <select name="techtxt" style="width: 200px">
                                            <option>Teacher's name</option>
                            <?php
                                $te_name=mysql_query("SELECT * FROM teachers");
								while($row=mysql_fetch_array($te_name)){
									if($row['teacher_id']==$rs_upd['teacher_id'])
								   		$iselect="selected";
									else
										$iselect="";
								?>
                                <option value="<?php echo $row['teacher_id'];?>" <?php echo $iselect?> > <?php echo $row['f_name'] ; echo " "; echo $row['l_name'];?> </option>
                                	
								<?php	
									}
                            ?>
                                        </select>
                                        </div>
            </div><br><br>
            
                            <div>
                                <input type="text" class="form-control" name="semestertxt" id="textbox" value="<?php echo $rs_upd['semester'];?>"  />
                            </div><br>
            
                            <div>
                                <input type="text" class="form-control" name="subtxt"  id="textbox" value="<?php echo $rs_upd['sub_name'];?>" />
                            </div><br>
            
                            <div>
                                <textarea name="notetxt" class="form-control" cols="23" rows="3"><?php echo $rs_upd['note'];?></textarea>
                            </div><br><br>
            
                            <div>
                                <input type="submit" class="btn btn-primary btn-large" name="btn_upd" value="Update" id="button-in"  />
                                <input type="reset" style="margin-left: 9px;" class="btn btn-primary btn-large" value="Cancel" id="button-in"/>                                
                            </div>
                  </form>            
    	</div>
    </form>
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
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-th-list"></span> Subject Entry Form</h1></div>
  			<div class="panel-body">
				    
			<div>
				<p style="text-align:center;">Add new subject's detail to record into database.</p>
			</div>

			<div class="container" style="width: 600px; ">
                        <form method="post">  
<div class="teacher_bday_box" style="margin-left: 0px;">
					<div class="select_style">
    					<select name="depttxt" style="width: 200px;">
                                            <option>Department's name</option>
                            <?php
                               $dept_name=mysql_query("SELECT * FROM department");
							   while($row=mysql_fetch_array($dept_name)){
								?>
                        		<option value="<?php echo $row['dept_name'];?>"> <?php echo $row['dept_name'];?> </option>
                                <?php 
							   }
                            ?>
                    </select>
                                        </div>
</div><br><br>
            
            <div class="teacher_bday_box" style="margin-left: 0px;">
					<div class="select_style">
                                            <select name="techtxt" style="width: 200px">
                                            <option>Teacher's name</option>
                            <?php
                                $te_name=mysql_query("SELECT * FROM teachers");
								while($row=mysql_fetch_array($te_name)){
								?>
                                <option value="<?php echo $row['teacher_id'];?>"> <?php echo $row['f_name'] ; echo " "; echo $row['l_name'];?> </option>
                                	
								<?php	
									}
                            ?>
                    </select>
                                        </div>
            </div><br><br>
            
                <div >
                	<input type="text" class="form-control" name="semestertxt" id="textbox" placeholder="Semester" />
                </div><br>
            
                <div >
                	<input type="text" class="form-control" name="subtxt"  id="textbox" placeholder="Subject's name"/>
                </div><br>
                
                <div >
                	<textarea class="form-control" name="notetxt" cols="23" rows="3" placeholder='Add note..'></textarea>
                </div><br><br>
            
                <div>
                	<input type="submit" class="btn btn-primary btn-large" name="btn_sub" value="Add Now" id="button-in"  />
                        <input type="reset" class="btn btn-primary btn-large" style="margin-left: 9px;" value="Cancel" id="button-in"/>
                </div>
           </form>
    	</div>
    </form>
</div>
</div>
</div>
<?php
}
?>
</body>
</html>