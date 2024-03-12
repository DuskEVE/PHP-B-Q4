<?php
include_once "./db.php";
if($User->count(['user'=>$_POST['user']])) echo "該帳號已被註冊";
else{
    echo 1;
    $_POST['date'] = date('Y-m-d');
    $User->update($_POST);
    $_SESSION['user'] = $_POST['user'];
}
?>