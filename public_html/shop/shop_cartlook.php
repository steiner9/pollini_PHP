<?php
session_start();
session_regenerate_id(true);
if (isset($_SESSION['member_login']) == false)
{
    print 'ようこそゲスト様　<br />';
    print '<a href="member_login.html">会員ログインへ</a>';
    print '<br />';
}
else
{
    print 'ようこそ';
    print $_SESSION['member_name'];
    print '様　';
    print '<a href="member_logout.php">ログアウト</a><br />';
    print '<br />';
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php

try
{

    $cart = $_SESSION['cart'];
    $max = count($cart);
    
    $dsn='mysql:host=mysql;dbname=bookshop;charset=utf8';
    $user='root';
    $password='password';
    $dbh=new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    foreach($cart as $key => $val)
    {
        $sql = 'SELECT code, name, price, gazou FROM bookname WHERE code = ?' ;
        $stmt = $dbh -> prepare($sql);
        $data[0] = $val;
        $stmt -> execute($data);

        $rec = $stmt -> fetch(PDO::FETCH_ASSOC);

        $pro_name[] = $rec['name'];
        $pro_price[] = $rec['price'];
        if ($rec['gazou'] == '')
        {
            $pro_gazou[] = '';
        }
        else 
        {
            $pro_gazou[] = '<img src="../bookname/gazou/'.$rec['gazou'].'">';
        }
    }
    $dbh = null;

    for ($i = 0; $i < $max; $i++)
    {
        print $pro_name[$i].'<br />';
        print $pro_gazou[$i].'<br />';
        print $pro_price[$i].'円'.'<br />';
        print '<br />';
    }
}
catch (Exception $e)
{
    print 'ただいま障害により大変ご迷惑をお掛けしております。';
    print $e;
    exit();
}

?>

<form>
<input type="button" onclick="history.back()" value="戻る">
</form>

</body>
</html>


