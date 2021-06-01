<!-- localhost/subject/shopping/code/front/customer.php -->
<html>
<head>
    <meta charset="utf-8">
    <title>消費者畫面</title>
</head>

<body>

<?php

    echo "$_POST[username]" . "您好";
    //抓取商品資料
    mb_internal_encoding('utf-8');
    require_once('mysqlconnect.php');
    $sql_select_product = "select id, name, price, amount from product";
    $select_product = mysqli_query($conn, $sql_select_product);
    $product = mysqli_fetch_all($select_product, MYSQLI_ASSOC);
    $username = $_POST['username'];
    echo "<br/>";

    echo "<br/>" . "<hr/>";

    //顯示商品資料
    $c = count($product);
    for($i = 0; $i < $c; $i++){
        foreach($product[$i] as $key => $value){
            echo $key . " : " . $value . "<br>";
        }

        $productid = $product[$i]['id'];
        $username = $_POST['username'];
        ?>

        <br/>
        <form method="POST" action="http://localhost/subject/shopping/code/front/order.php">
            <input type="text" name = "username" value="<?= $username ?>" style="display: none;">
            <input type="text" name="productid" value="<?= $productid ?>" style="display: none;">
            <input type="submit" value="購買">
        </form>

        <?php
        
        echo "<hr/>";
        }

        //顯示已訂購的商品資料
        echo "<br/>";
        echo "<br/>";
        echo "已訂購商品 : ";
        echo "<hr/>";
        $username = $_POST['username'];
        require_once('mysqlconnect.php');
        $select_order = "select username, product, amount from orderdata where username = '$username' ";
        $select = mysqli_query($conn, $select_order);
        $order = mysqli_fetch_all($select, MYSQLI_ASSOC);

        sort($order);
        $c = count($order);
        for($i = 0; $i < $c; $i++){
                echo "購買商品 : " . $order[$i]['product'] . "<br/>" . "數量 : " . $order[$i]['amount'] . " " . "個";
                echo "<hr/>";
        }
        ?>    

<br/>
    
<a href="http://localhost/subject/shopping/code/front/login.html">回登入畫面</a>
<br/>

</body>

</html>