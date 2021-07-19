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

$staff_name = $_POST['name'];
$staff_pass = $_POST['pass'];

print $staff_name;
var_dump($_POST);
$staff_name = htmlspecialchars($staff_name);
$staff_pass = htmlspecialchars($staff_pass);

$dsn = 'mysql:dbname=shop;host=mysql';
$user = 'root';
$password = 'root';
$dbh = new PDO($dsn,$user,$password);
$dbh->query('SET NAMES utf8');

$sql = 'INSERT INTO mst_staff(name,password) VALUES (?,?)';
$stmt = $dbh->prepare($sql);
$data[] = $staff_name;
$data[] = $staff_pass;
$stmt->execute($data);

$dbh=null;

print $staff_name;
print 'さんを追加しました。 <br />';

}
catch (Exception $e)
{
    print 'ただいま障害により大変ご迷惑おかけしております。';
    print $e;
    exit();
}

?>

<a href="staff_list.php"> 戻る </a>

</body>

</html>