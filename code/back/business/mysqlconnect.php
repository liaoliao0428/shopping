<!-- http://localhost/subject/shopping/code/back/mysqlconnect.php -->

<?php

$conn = mysqli_connect('localhost', 'root', 'liao0428');
$sbase = mysqli_select_db($conn, 'shopping');

?>