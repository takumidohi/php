<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ろくまる農園</title>
</head>
<body>

<?php

try
{

$dsn = 'mysql:dbname=shop;host=mysql';
$user = 'root';
$password = 'root';
$dbh = new PDO($dsn,$user,$password);
$dbh->query('SET NAMES utf8');

$sql = 'SELECT code,name FROM mst_staff WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

$dbh =null;

print 'スタッフ一覧 <br /><br />';

print '<form method="post" action="staff_branch.php">';
while(true)
{
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    //var_dump($rec)  ;
    if($rec==false)
    {
        break;
    }
    print $rec['name'];
    print '<input type="radio" name="staffcode" value="'.$rec['code'].'">';
    print '</br>';
}
print '<input type="submit" name="disp" value="参照">';
print '<input type="submit" name="add" value="追加">';
print '<input type="submit" name="edit" value="修正">';
print '<input type="submit" name="delete" value="削除">';
print '</form>';
}
catch (Exception $e)
{
    print 'ただいま障害により大変ご迷惑をお掛けしております。';
    exit();
}

?>

</body>

</html>
