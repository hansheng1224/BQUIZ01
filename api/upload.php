<?php
include_once "base.php";

// $row=$Mvim->find($_POST['id']);

$table=$_POST['table'];
$row=$$table->find('table');

if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],'../upload/'.$_FILES['img']['name']);
    $row['img']=$_FILES['img']['name'];
    $$table->save($row);
}

to("../back.php?do=".lcfirst($table));

?>