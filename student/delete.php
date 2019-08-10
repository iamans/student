<?php

// connecting to database

$conn=mysql_connect("localhost","root",""); 

//selecting database

$db=mysql_select_db('students',$conn);

//creating variables to store del from view.php

$delete_record=$_GET['del'];

// query to delete

$query="delete from u_reg where u_id='$delete_record'";

// creating deleted variable to display message

if(mysql_query($query)){

	echo "<script>window.open('view.php?deleted=Record has been deleted successfully','_self')</script>";
}


?>