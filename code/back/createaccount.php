<!-- http://localhost/subject/shopping/code/back/createaccount.php -->
<html>

<head>
    <meta charset="utf-8">
</head>

<?php

$conn = mysqli_connect('localhost', 'root', 'liao0428');
$sbase = mysqli_select_db($conn, 'shopping');

$sql_select_account = "select account, password from customer_account";
$select_account = mysqli_query($conn, $sql_select_account);

$username = $_POST['username'];
$account = $_POST['account'];
$password = $_POST['password'];

$sql_insertinto_account = "INSERT INTO customer_account(name, account, password) values ('$username', '$account', '$password')";
$inserinto = mysqli_query($conn, $sql_insertinto_account);


echo "使用者名稱 : " . $_POST['username'] . "<br/>";
echo "帳號 : " . $_POST['account'] . "<br/>";
echo "密碼 : " . $_POST['password'] . "<br/>";
if($inserinto){
    echo "建立帳號成功" . "<br/>";
}else{
    echo "建立帳號失敗" . "<br/>";
}

?>

<a href="http://localhost/subject/shopping/code/front/login.html">回登入畫面</a>

<br/>


</html>