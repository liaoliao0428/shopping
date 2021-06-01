<!-- localhost/subject/shopping/code/front/order.php -->
<html>
    <head>
        <meta charset="utf-8">
        <title>下單</title>
    </head>

    <body>

    
<?php

echo $_POST['username'] . "您好" . "<br/>" . "<br/>";

//抓取並顯示要購買的商品資料
$username = $_POST['username'];
$productid = $_POST['productid'];

require_once('mysqlconnect.php');
$select_product = "select name, price, amount from product where id = '$productid'";
$select = mysqli_query($conn, $select_product);
$product = mysqli_fetch_all($select, MYSQLI_ASSOC);

$name = $product[0]['name'];
$price = $product[0]['price'];
$amount = $product[0]['amount'];

echo "商品名稱 : " . "$name" . "<br/>";
echo "商品價格 : " . "$price" . "元" . "<br/>";
echo "身品數量 : " . "$amount" . "個" . "<br>";

?>
        <!--  製作下單表格 -->
        <form method="POST" action="http://localhost/subject/shopping/code/back/order.php ">
            <input type="text" name="username" value="<?= $username ?>" style="display: none;">
            <input type="text" name="productname" value="<?= $name ?>" style="display: none;">
            <input type="text" name="productid" value="<?= $productid ?>" style="display: none;">
            購買數量 :
            <input type="text" name="amount" required="required" placeholder="填寫須購買數量">
            <input type="submit" value="下單">
        </form>
    </body>
</html>