<!-- http://localhost/subject/shopping/code/back/business/add_product.php -->

<?php
require_once('mysqlconnect.php');

echo "名稱 : " . $_POST['product_name'] . "<br/>";
echo "價格 : " . $_POST['product_price'] . " " . "元/個" . "<br/>";
echo "總數 : " . $_POST['product_amount'] . " " . "個" . "<br/>" . "<br/>";

$product_name = $_POST['product_name'];
$product_price = $_POST['product_price'];
$product_amount = $_POST['product_amount'];

$sql_insertinto_product = "INSERT INTO product(name, price, amount) values ('$product_name', '$product_price', '$product_amount')";
$inserinto = mysqli_query($conn, $sql_insertinto_product);

if($inserinto){
    echo "新增產品成功";
}else{
    echo "新增失敗";
}

header("refresh:3;url=http://localhost/subject/shopping/code/front/business/add_product.html")

?>