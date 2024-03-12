<?php
include_once "./db.php";
if($_POST['check'] != $_SESSION['check']) echo "驗證碼錯誤";
else if($Admin->count(['user'=>$_POST['user'], 'password'=>$_POST['password']]) == 0){
    echo "帳號或密碼錯誤";
}
else{
    echo 1;
    $_SESSION['admin'] = $_POST['user'];
}
?>