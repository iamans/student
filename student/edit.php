<?php

$conn=mysql_connect("localhost","root","");

$db= mysql_select_db('students',$conn);

// update data when click on update button i.e submit button name

if(isset($_POST['update']))
   {
	
	 $edit_record1 = $_GET['edit'];   //use to catch data 
	  // logic to save data
	 
	 $student_name =   $_POST['user_name1'];
	 $student_father = $_POST['father_name1'];
	 $student_school = $_POST['school_name1'];
	 $student_roll  =  $_POST['roll_no1'];
     $student_class =  $_POST['student_class1'];
	 
  // applying query
	 
$query1="update u_reg set u_name='$student_name'
,u_father='$student_father',u_school='$student_school'
,u_roll='$student_roll',u_class='$student_class'
 where u_id='$edit_record1'";
	 
	if(mysql_query($query1))
	{
	   echo "<script>window.open('view.php?updated=Record Has Been Updated','_self')</script>";
	}
}




$edit_record=@$_GET['edit'];
$query = "select * from u_reg where u_id ='$edit_record' ";

$run=mysql_query($query);

while ($row=mysql_fetch_array($run))
{
	$edit_id =  $row['u_id'];
	$s_name =   $row[1];
	$s_father = $row[2];
	$s_school = $row[3];
	$s_roll =   $row[4];
	$s_class =  $row[5];
	
}

?>

<html>
	<head>
		<title>Record Updation </title>
	</head>
	<body>
		<form method='post' action='edit.php?edit=<?php echo $edit_id; ?>'>
			<table width='500' border="2" align="center">
				<tr>
					<th bgcolor="yellow" colspan="6">Updating Form</th>
				</tr>
				<tr>
					<td align="right">Student Name:</td>
					<td>
					<input type="text" name="user_name1" value='<?php echo $s_name;?>'>

						</td>

					</tr>
					<tr>
						<td align="right">Fathers name:</td>
						<td><input type="text" name="father_name1" <input type="text" name="user_name" value='<?php echo $s_father;?>'>
								
							</td>

						</tr>
						<tr>
							<td align="right">School Name:</td>
							<td><input type="text" name="school_name1" <input type="text" name="user_name" value='<?php echo $s_school;?>'>

								</td>

							</tr>

							<tr>
								<td align="right">Roll No:</td>
								<td><input type="text" name="roll_no1" <input type="text" name="user_name" value='<?php echo $s_roll;?>'>

									</td>


								</tr>
								<tr>
									<td align="right">Class</td>
									<td>
										<select name="student_class1" id="class">
											<option value='<?php echo $s_class;?>'> <?php echo $s_class;?></option>
											<option value="Btech">Btech</option>
											<option value="BSc">BSC</option>
											<option value="MSc">MSC</option>
										</select>

									</td>
								</tr>
								<tr>
									<td align="center" colspan="6"><input type="submit" name="update" value="Update"></td>
									</tr>
								</table>
							</form>
						</body>

					</html>
					
		