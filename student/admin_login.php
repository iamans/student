<?php

//write session on that page where we have to apply

session_start();

?>


<html>
   <head>
		<title>Admin Login</title>

	</head>

	<body>
		<form action="admin_login.php" method="post">
			<table width="400" border="2" align="center" bgcolor="orange">

				<tr>

					<td align="center" bgcolor="pink" colspan="6"> Admin Panel Form</td>

				</tr>



				<tr> 
					<td align="right"> Admin Name:</td>
					<td><input type="text" name="admin_name"></td>
					</tr>

					<tr> 
						<td align="right"> Admin Password:</td>
						<td><input type="password" name="admin_pass"></td>
						</tr>  

						<tr> 

							<td colspan="4" align="center"><input type="submit" name="login" value="login"></td>
							</tr>  

						</table>


					</form>
					
					<!-- displying error message on view php.page  -->
					
					<center><?php echo @$_GET['error'];  ?></center>

				</body>


			</html>
			
			
			
<?php
$con = mysql_connect("localhost","root","");
$db = mysql_select_db('students',$con);

 if(isset($_POST['login'])){

	 $admin_name = $_SESSION['admin_name'] = $_POST['admin_name'];  //applying session
	 $admin_pass = $_POST['admin_pass'];
	 
	
	 
$query = "select * from login where user_name='$admin_name' 
AND user_password='$admin_pass'";	 
	 
	 
$run = mysql_query($query); 
if(mysql_num_rows($run)>0)	{

echo "<script>window.open('view.php?logged=Logged in Successful...!!','_self')</script>";


}

else{
	
   echo "<script>alert('Password or Username is Incorrect..!')</script>";

}	
 }
	 
 

?>			