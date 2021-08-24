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

$pro_code=$_GET['procode'];

$dsn = 'mysql:dbname=shop;host=mysql';
$user = 'root';
$password = 'root';
$dbh = new PDO($dsn,$user,$password);
$dbh->query('SET NAMES utf8');

$sql = 'SELECT name,gazou FROM mst_product WHERE code=?';
$stmt = $dbh->prepare($sql);
$data[] = $pro_code;
$stmt->execute($data);

$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$pro_name = $rec['name'];
$pro_gazou_name=$rec['gazou'];

$dbh = null;

if ($pro_gazou_name=='')
{
    $disp_gazou='';
}
else
{
    $disp_gazou='<img src="./gazou/'.$pro_gazou_name.'">';
}

}
catch (Exception $e)
{
    print "ただいま障害により大変ご迷惑お掛けしております";
    exit();
}

?>

商品削除 <br />
<br />
商品コード <br />
<?php print $pro_code;?>
<br />
<br />
<form method="post" action="pro_delete_done.php">
<input type="hidden" name="code" value="<?php print $pro_code;?>">
<?php print $disp_gazou;?>
<br />
商品を削除してよろしいですか？<br />
<input type="text" name="name" style="width:200px" value="<?php print $pro_name; ?>"><br />
<input type="hidden" name="gazou_name" value="<?php print $pro_gazou_name;?>">
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK">
</form>

</body>





</body>

</html>
