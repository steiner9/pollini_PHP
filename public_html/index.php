<?php

//phpinfo();

try 
{
    $dsn='mysql:host=mysql;dbname=shop;charset=utf8';
    $user='root';
    $password='password';
    $dbh=new PDO($dsn,$user,$password);
    print 'successfully connected! <br />';

}
catch(Exception $e)
{
    print $e . "\n";
    exit();
}
?>
<?php

/*
//Environmental variables defined in .env file
$instanceName = $_SERVER['INSTANCE_NAME'];
$projectColor = $_SERVER['PROJECT_COLOR'];

echo '<h1>Hello from <font color="'.$projectColor.'">'.$instanceName.'</font> instance</h1>';
 */
