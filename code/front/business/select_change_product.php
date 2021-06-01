<!-- http://localhost/subject/shopping/code/front/business/select_change_product.php -->

<html>
    <head>
        <!-- <meta charset="utf-8"> -->
        <title>選擇修改商品</title>
    </head>

    <body>
        <br/>
        <a href="http://localhost/subject/shopping/code/front/business/login.php">回商家首頁</a>
        <br/>
        <a href="http://localhost/subject/shopping/code/front/login.html">回登入畫面</a>

    <?php
    
    //抓取商品資料
    require_once('mysqlconnect.php');
    $sql_select_product = "select id, name, price, amount from product";
    $select_product = mysqli_query($conn, $sql_select_product);
    $product = mysqli_fetch_all($select_product, MYSQLI_ASSOC);
    echo "<br/>" . "<hr/>";

    //顯示商品資料及修改和刪除的選項
    $c = count($product);
    for($i = 0; $i < $c; $i++){    
        foreach($product[$i] as $key => $value){
            echo $key . " : " . $value . "<br>";
        }

        $productid = $product[$i]['id'];
        ?>

        <br/>
        <form method="POST" action="http://localhost/subject/shopping/code/front/business/change_product.php">
            <input type="text" name="productid" value="<?= $productid ?>" style="display:none">
            <input type="submit" value="修改">
        </form>

        <form method="POST" action="http://localhost/subject/shopping/code/back/business/delete_product.php">
            <input type="text" name="deleteid" value="<?= $productid ?>" style="display:none">
            <input type="submit" value="刪除">
        </form>

        <?php
        
        echo "<hr/>";
    }

    ?>

    </body>
</html>