<!-- http://localhost/subject/shopping/code/back/business/delete_product.php -->

<?php

require_once('mysqlconnect.php');

$deleteid = $_POST['deleteid'];

$deletesql = "delete from product where id = $deleteid ";
$delete = mysqli_query($conn, $deletesql);
if($delete){
    echo "刪除成功";
}

header("refresh:3;url=http://localhost/subject/shopping/code/front/business/select_change_product.php");

?>