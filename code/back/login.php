<!-- http://localhost/subject/shopping/code/back/login.php -->
<html>

<head>
    <meta charset="utf-8">
</head>

<?php

$acc = $_POST['account'];

//抓取資料庫內的帳號密碼
$conn = mysqli_connect('localhost', 'root', 'liao0428');
$sbase = mysqli_select_db($conn, 'shopping');

$sql_select_account = "select account from customer_account";
$sql_select_password = "select password from customer_account";
$sql_select_name = "select name from customer_account";

$select_account = mysqli_query($conn, $sql_select_account);
$select_password = mysqli_query($conn, $sql_select_password);
$select_name = mysqli_query($conn, $sql_select_name);

$account = mysqli_fetch_all($select_account, MYSQLI_ASSOC);
$password = mysqli_fetch_all($select_password, MYSQLI_ASSOC);
$name = mysqli_fetch_all($select_name, MYSQLI_ASSOC);

//判斷帳號是否正確
$c = count($account);
    for($i = 0; $i < $c; $i++){
        foreach($account[$i] as $key => $account_value){
            if($_POST['account'] == $account_value){
                $this_account = "存在";                
                $a = $i;
                break;
            }        
        }
    }
if(empty($this_account)){
    echo "帳號錯誤". "<br/>";
}

//判斷密碼是否正確
$c = count($account);
    for($i = 0; $i < $c; $i++){
        foreach($password[$i] as $key => $password_value){
            if($_POST['password'] == $password_value){
                $this_password = "存在";
                break;
            }        
        }
    }
if(empty($this_password)){
    echo "密碼錯誤". "<br/>";
}

if(empty($this_account) != 1 && empty($this_password) != 1){
    $username =  $name[$a]['name'];
    ?>

    <form id = "username" method="POST" action="http://localhost/subject/shopping/code/front/customer.php">
        <input type="text" name = "username" value="<?= $username ?>">
    </form>
    <script type="text/javascript">
        username.submit();
    </script>

    <?php
    exit;
}


echo "帳號 : " . $_POST['account'] . "<br/>";
echo "密碼 : " . $_POST['password'] . "<br/>";

?>

<a href="http://localhost/subject/shopping/code/front/login.html">登出</a>

<br/>
</html>