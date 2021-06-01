<!-- http://localhost/subject/shopping/code/back/order.php -->
<html>
    <head>
        <meta charset="utf-8">
    </head>

    <body>

    
<?php

echo $_POST['productid'];
echo "<br/>";
echo $_POST['username'];
echo "<br/>";
echo $_POST['productname'];
echo "<br/>";
echo $_POST['amount'];
echo "<br/>";


$id = $_POST['productid'];
$username = $_POST['username'];
$product = $_POST['productname'];
$amount = $_POST['amount'];

$conn = mysqli_connect('localhost', 'root', 'liao0428');
$sbase = mysqli_select_db($conn, 'shopping');

$sql_insertinto_order = "INSERT INTO orderdata(username, product, amount) values ('$username', '$product', '$amount')";
$inserinto = mysqli_query($conn, $sql_insertinto_order);

$select_product = "select amount from product where id = '$id'";
$select = mysqli_query($conn, $select_product);
$product = mysqli_fetch_all($select, MYSQLI_ASSOC);
$remain =  $product[0]['amount'] - $amount;

$update = "update product set amount = '$remain' where id = '$id' ";
mysqli_query($conn, $update);

?>

        <form id = "username" method="POST" action="http://localhost/subject/shopping/code/front/customer.php">
            <input type="text" name="username" value="<?= $username ?>" style="display: none;">
        </form>
        <script type="text/javascript">
            username.submit();
        </script>

    </body>
</html>