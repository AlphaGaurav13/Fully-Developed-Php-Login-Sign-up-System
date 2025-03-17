<?php

session_start();

session_unset();

session_destroy();

header("location: /Login_System_2/login.php");
exit;

?>