<!-- http://localhost/subject/shopping/code/front/business/order.php -->

<html>
    <head>
        <meta charset="utf-8">
        <title>店家訂單</title>
    </head>

    <body>
        <?php
        
        //抓取並顯示訂單資料
        require_once('mysqlconnect.php');
        $select_order = "select username, product, amount from orderdata";
        $select = mysqli_query($conn, $select_order);
        $order = mysqli_fetch_all($select, MYSQLI_ASSOC);

        sort($order);
        $c = count($order);
        for($i = 0; $i < $c; $i++){
                foreach($order[$i] as $key => $value){
                    echo $key . " : " . $value . "<br/>";
                }
                echo "<hr/>";

        }

        ?>

        <br/>
        <a href="http://localhost/subject/shopping/code/front/business/login.php">回商家首頁</a>
        <br/>
        <a href="http://localhost/subject/shopping/code/front/login.html">回登入畫面</a>
    </body>
</html>