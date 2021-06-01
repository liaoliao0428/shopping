<!-- http://localhost/subject/shopping/code/front/business/change_product.php -->

<html>

<head>

    <meta charset="utf-8">
    <title>修改商品</title>

</head>

<body>


<?php 

//抓取要修改的資料
require_once('mysqlconnect.php');

$productid = $_POST['productid'];
echo "$productid";

$select_product = "select id, name, price, amount from product where id = '$productid' ";
$select = mysqli_query($conn, $select_product);
$product = mysqli_fetch_all($select, MYSQLI_ASSOC);
$id = $product[0]['id'];
$name = $product[0]['name'];
$price = $product[0]['price'];
$amount = $product[0]['amount'];

?>

<!-- 製作修改表單 -->
<form method = "POST" action="http://localhost/subject/shopping/code/back/business/change_product.php">
    <input type="text" name="id" value="<?= $id ?>" style="display: none">
    新商品名稱 : <input type="text" name="newname" value="<?= $name ?>">
    <br/><br/>
    新價格 : <input type="text" name="newprice" value="<?= $price ?>">
    <br/><br/>
    新數量 : <input type="text" name="newamount" value="<?= $amount ?>">
    <br/><br/>
    <input type="submit" value="修改">
    <br/><br><hr/>
</form>

<a href="http://localhost/subject/shopping/code/front/business/select_change_product.php">回修改頁</a>

</body>

</html>