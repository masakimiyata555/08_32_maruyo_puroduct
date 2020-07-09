<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://localhost/08_32_masakimiyata/main.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=M PLUS Rounded 1c" rel="stylesheet">
    <title>○○運輸倉庫</title>
</head>
<body>
<?php
// データベースの障害対策
try
{

$product_name=$_POST['name'];
$product_price=$_POST['price'];

$product_name=htmlspecialchars($product_name,ENT_QUOTES,'UTF-8');
$product_price=htmlspecialchars($product_price,ENT_QUOTES,'UTF-8');

$dsn='mysql:dbname=gsf_d06_db32;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='INSERT INTO maruyo_product(name,price) VALUES (?,?)';
$stmt=$dbh->prepare($sql);
$data[]=$product_name;
$data[]=$product_price;
$stmt->execute($data);

$dbh=null;

print $product_name;
print 'を追加しました。<br />';

}
catch (Exception $e)
{
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

<a href="product_list.php"> 戻る</a>

</body>
</html>