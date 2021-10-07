<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<?php

require_once('../common/common.php');

$post = sanitize($_POST);

$onamae = $post['onamae'];
$email = $post['email'];
$postal1 = $post['postal1'];
$postal2 = $post['postal2'];
$address = $post['address'];
$tel = $post['tel'];

if ($onamae == '')
{
    print 'お名前が入力されていません。１<br /><br />';
}

if (preg_match('/\A[\w\-\.]+\@[\w\-\.]+\.([a-z]+)\z', $email) == 0)
{
    print 'メールアドレスは正確に入力してください。<br /><br />';
}

if (preg_match('/\A[0-9]+\z', $postal1) == 0)
{
    print '郵便番号は半角数字で入力してください。<br /><br />';
}

if (preg_match('/\A[0-9]+\z', $postal2) == 0)
{
    print '郵便番号は半角数字で入力してください。<br /><br />';
}

if ($address == '')
{
    print '住所が入力されていません。１<br /><br />';
}

if (preg_match('/\A\d{2,5}-?\d{2,5}-?\d{4,5}\z', $tel) == 0)
{
    print '電話番号は正確に入力してください。<br /><br />';
}

print '<form method="post" action="shop_form_done.php">';
print '<input type="hidden" name="onamae" value="'.$onamae.'">';
print '<input type="hidden" name="email" value="'.$email.'">';
print '<input type="hidden" name="postal1" value="'.$postal1.'">';
print '<input type="hidden" name="posftal2" value="'.$postal2.'">';
print '<input type="hidden" name="address" value="'.$address.'">';
print '<input type="hidden" name="tel" value="'.$tel.'">';
print '<input type="button" onclick="history.back()" value="戻る">';
print '<input type="submit" value="OK"><br />';
print ' </form>';

?>
</body>
</html>

