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
//コメント追加しました
$staff_code=$_GET['staffcode'];

$dsn = 'mysql:dbname=shop;host=mysql';
$user = 'root';
$password = 'root';
$dbh = new PDO($dsn,$user,$password);
$dbh->query('SET NAMES utf8');

$sql = 'SELECT name FROM mst_staff WHERE code=?';
$stmt = $dbh->prepare($sql);
$data[] = $staff_code;
$stmt->execute($data);

$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$staff_name = $rec['name'];

$dbh = null;

}
catch (Exception $e)
{
    print "ただいま障害により大変ご迷惑お掛けしております";
    exit();
}

?>

スタッフ削除 <br />
<br />
スタッフコード <br />
<?php print $staff_code;?>
<br />
<br />
<form method="post" action="staff_delete_done.php">
<input type="hidden" name="code" value="<?php print $staff_code;?>">
スタッフ名<br />
<input type="text" name="name" style="width:200px" value="<?php print $staff_name; ?>"><br />
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK">
</form>

</body>





</body>

</html>
