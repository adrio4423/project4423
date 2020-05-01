<?php
session_start();
session_destroy();

$server = $_SERVER['HTTP_HOST'];
print"<meta http-equiv=\"refresh\" content=\"0;URL=http://$server/padinet/login.php\">";
?>