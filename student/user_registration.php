<html>
	<head>
		<title>student registration </title>
	</head>
	<body>
		<form action="user_registration.php" method="post" align="right">
			<table width='500' border="2" align="center">
				<tr>
					<th bgcolor="yellow" colspan="6">Student Registration</th>
				</tr>
				<tr>
					<td align="right">Student Name:</td>
					<td><input type="text" name="user_name">
							<font color="red"><?php echo @$_GET['name'];?></font>  <!-- display missing data i by using get name -->
						</td>

					</tr>
					<tr>
						<td align="right">Fathers name:</td>
						<td><input type="text" name="father_name">
								<font color="red"><?php echo @$_GET['father'];?></font>
							</td>

						</tr>
						<tr>
							<td align="right">School Name:</td>
							<td><input type="text" name="school_name">
									<font color="red"><?php echo @$_GET['school'];?></font>
								</td>

							</tr>

							<tr>
								<td align="right">Roll No:</td>
								<td><input type="text" name="roll_no">
										<font color="red"><?php echo @$_GET['roll'];?></font>
									</td>


								</tr>
								<tr>
									<td align="right">Class</td>
									<td>
										<select name="student_class" id="class">
											<option value="null"> Select Class</option>
											<option value="Btech">Btech</option>
											<option value="BSc">BSC</option>
											<option value="MSc">MSC</option>
										</select>
										<font color="red"><?php echo @$_GET['class'];?></font>
									</td>
								</tr>
								<tr>
									<td align="center" colspan="6"><input type="submit" name="submit" value="submit"></td>
									</tr>
								</table>
							</form>
						</body>

					</html>

					<?php

// this two line 65,66 use to connect to database

    $conn=mysql_connect("localhost","root","");
    $db= mysql_select_db('students',$conn);
	
    if(isset($_POST['submit']))
    {
        // here creating new variable to store data

    $student_name=$_POST['user_name'];
    $student_father=$_POST['father_name'];
    $student_school=$_POST['school_name'];
    $student_roll=$_POST['roll_no'];
    $student_class=$_POST['student_class'];
    
    // here it is use to display message if any data is missing while filling the form

    if($student_name==''){
      echo"<script>window.open('user_registration.php? name=Name is Required','_self')</script>";
      exit();
    }
    if($student_father==''){
      echo"<script>window.open('user_registration.php? father= father name is Required','_self')</script>";
      exit();
    }
    if($student_school==''){
      echo"<script>window.open('user_registration.php? school= Father Nmae is Required','_self')</script>";
      exit();
    }
    if($student_roll==''){
      echo"<script>window.open('user_registration.php? roll=enter your roll number','_self')</script>";
      exit();
    }
    if($student_class==''){
      echo"<script>window.open('user_registration.php? class=select your class','_self')</script>";
      exit();
    }
	
// here we are inserting data into database

    $que = "insert into u_reg (u_name,u_father,u_school,u_roll,u_class) values ('$student_name','$student_father','$student_school','$student_roll','$student_class')";

    //here we are displatin insereted data on registraton page

	 if(mysql_query($que))
	 {
	  echo " <center><b>The following data has been entered into database</b></center>";
    echo "<table align='center' border='3' >
       <tr>
       <td>$student_name</td>
        <td>$student_father</td>
        <td>$student_school</td>
        <td>$student_roll</td>
        <td>$student_class</td>
   </tr> 
    </table> ";
	 }
	   }
	 
?>