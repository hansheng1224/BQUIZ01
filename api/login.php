<?php
include_once "base.php";

if(isset($_POST['acc'])){
    if($Admin->count(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']])>0){
        to('../back.php');
    }else{
        to('../index.php?do=login&erroe=帳號或密碼錯誤');
    }
}

?>