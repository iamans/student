
<?php
  session_start();
  if(!$_SESSION['admin_name']){
	  header('location:admin_login.php?error=You are not an administrator...!!');
	  
  }
  
?>



<!DOCTYPE html> 
<html>
	<head>
		<title> viewing all records</title>
	</head>
	<body>
		<a href="user_registration.php">Insert New Records</a>

		welcome:<font color="blue" size="4" >
			<?php echo $_SESSION['admin_name']; ?>
		</font>

		<a href="logout.php">Logout</a>


		<center><font color="red" size="6" >
				<?php echo @$_GET['logged']; ?>
				<?php echo @$_GET['updated']; ?>
				<?php echo @$_GET['deleted']; ?>

			</font></center>



		<table width="1000" border="2" align="center">
			<tr>
				<th align="center" colspan="20" bgcolor="yellow"> <h1>Viewing All The Records</h1></th>

			</tr>
			<tr align="center">
				<th>Serial No.</th>
				<th>Student Name</th>
				<th>Father's Name</th>
				<th>Roll No.</th>
				<th>Delete</th>
				<th>Edit</th>
				<th>Details</th>
			</tr>


			<?php
       $conn=mysql_connect("localhost","root","");   //here in line 24 and 25 we'r connecting to database
       $db= mysql_select_db('students',$conn);
	
       $que = "select * from u_reg";     // query to fetch data from database [ry order by 1 DESC Or  DESC]
       $run = mysql_query($que);

       while ($row=mysql_fetch_array($run))   // while loop to execute dynamically
        {

       	$u_id=$row[0];   // or $row[u_id];
       	$u_name=$row[1];  // or $row[u_name];
       	$u_father=$row[2]; // or $row[u_father];
       	$u_roll=$row[4];   // or $row[u_roll];
       	
   ?>
			<tr align="center">
				<td><?php echo $u_id;?></td>
				<td><?php echo $u_name;?></td>
				<td><?php echo $u_father;?></td>
				<td><?php echo $u_roll;?></td>



				<td><a href='delete.php? del=<?php echo $u_id; ?>'> Delete</a></td>
				<td><a href='edit.php? edit=<?php echo $u_id; ?>'> Edit<a/></td>

					<td><a href='view.php?view=<?php echo $u_id;?>' name="details">Details </a></td>

				</tr>

				<?php }   ?>


			</table> <br><br><br><br><br><br>

									<form action="view.php" method="get" align="center">
										<b> Search  Record:<b> <input type="text" name="search">
													<input type="submit" name="submit" value="Find Now" ><br><br><br>
																</form>
																<?php
    if(isset($_GET['search'])){
	$search_record = $_GET['search'];
	$query2 = "select * from u_reg where u_name='$search_record' OR 
	u_roll='$search_record'";
	
	$run2 = mysql_query($query2);
	while($row2=mysql_fetch_assoc($run2))
	{
		$name123 = $row2['u_name'];
		$father123 = $row2['u_father'];
		$school123 = $row2['u_school'];
		$roll123 = $row2['u_roll'];
		$class123 = $row2['u_class'];
		
   
   ?>

																<table width="800" bgcolor="yellow" align="center" border="1" >
																	<tr align="center">
																		<td> <?php echo $name123; ?> </td>
																		<td> <?php echo $father123 ; ?> </td>
																		<td> <?php echo $school123; ?> </td>
																		<td> <?php echo $roll123; ?> </td>
																		<td> <?php echo $class123; ?> </td>


																	</tr>

																</table>
																<?php  } } ?>


	<!-- details login start from here      -->
	<br><br><br><br>


<?php


$conn=mysql_connect("localhost","root",""); 
$db=mysql_select_db('students',$conn);
$view_record= @$_GET['view'];

	
	
	if($view_record !=null){
	$query3 = "select * from u_reg where u_id='$view_record' ";
	
	$run3 = mysql_query($query3);
	while($row2=mysql_fetch_array($run3))
	{
		$name1234 = $row2['u_name'];
		$father1234 = $row2['u_father'];
		$school1234 = $row2['u_school'];
		$roll1234 = $row2['u_roll'];
		$class1234 = $row2['u_class'];
		
	?>
	
	<table width="800" bgcolor="yellow" align="center" border="1" >
		<tr align="center">
        <td> <?php echo $name1234; ?> </td>
		<td> <?php echo $father1234 ; ?> </td>
		<td> <?php echo $school1234; ?> </td>
		<td> <?php echo $roll1234; ?> </td>
	    <td> <?php echo $class1234; ?> </td>


</tr>

</table>
<?php  } } ?>

	
	
	
	
	<!-- details login start from here      -->
	
	
</body>
</html>