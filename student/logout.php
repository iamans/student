<?php

//logout and trnasfer to login.php page
//header is a deafult php command

session_start();

session_destroy();

header ('location:admin_login.php');

?>



