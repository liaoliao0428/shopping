<!-- http://localhost/subject/shopping/code/front/business/login.php -->

<html>
    <head>
        <meta charset="utf-8">
        <title>店家首頁</title>
    </head>

    <body>
            <br>
            <a href="http://localhost/subject/shopping/code/front/business/order.php">訂單</a>
            <br/>            
            <a href="http://localhost/subject/shopping/code/front/business/add_product.html">新增商品</a>
            <br/>
            <a href="http://localhost/subject/shopping/code/front/business/select_change_product.php">修改商品</a>
            <br/><br/>
            <a href="http://localhost/subject/shopping/code/front/login.html">回登入畫面</a>
            <br/>
        
    <?php
    
    //抓取並顯示目前商品資料
    require_once('mysqlconnect.php');
    $sql_select_product = "select name, price, amount from product";
    $select_product = mysqli_query($conn, $sql_select_product);
    $product = mysqli_fetch_all($select_product, MYSQLI_ASSOC);

    echo "<br/>" . "<hr/>";

    $c = count($product);
    for($i = 0; $i < $c; $i++){
        foreach($product[$i] as $key => $value){
            echo $key . " : " . $value . "<br>";
        }

        

        echo "<hr/>";
    }


    ?>

    </body>
</html>