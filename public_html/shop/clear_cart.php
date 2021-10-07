<?php
session_start();
$_SESSION = array();
if ($_COOKIE[session_name()] == true)
{
    setcookie(session_name(), '', time() - 420000, '/');
}
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
カートを空にしました。。<br />

</body>
</html>


