<!-- http://localhost/subject/shopping/code/back/business/change_product.php -->

<html>

    <head>
        <meta charset="utf-8">
    </head>

    <body>
        <?php
        require_once('mysqlconnect.php');

        $id = $_POST['id'];
        $newname = $_POST['newname'];
        $newprice = $_POST['newprice'];
        $newamount = $_POST['newamount'];
        
        $sql_updatename = "update product set name = '$newname' where id = '$id' ";
        $sql_updateprice = "update product set price = '$newprice' where id = '$id' ";
        $sql_updateamount = "update product set amount = '$newamount' where id = '$id' ";


        $s1 = mysqli_query($conn, $sql_updatename);
        $s2 = mysqli_query($conn, $sql_updateprice);
        $s3 = mysqli_query($conn, $sql_updateamount);

        if($s1 && $s2 && $s3){
            echo "修改成功";
        }

        header("refresh:3;url=http://localhost/subject/shopping/code/front/business/select_change_product.php")
        
        ?>

    </body>

</html>