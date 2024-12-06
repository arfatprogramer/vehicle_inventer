<?php
include "database/conn.php";
session_start();
$id=$_GET['id'];
$query="DELETE FROM `customers` WHERE `customers`.`id` = $id";
// $query="UPDATE customers SET status='active' WHERE id=$id";
$result=mysqli_query($conn,$query);
if($result){
    
    $_SESSION['status']=true;
    $_SESSION['msg']="Data Deleted";
    $_SESSION['msg-icon']="success";
    header('location:./Clients.php');
}
else {
    $_SESSION['status']=true;
    $_SESSION['msg']="Deletion failed";
    $_SESSION['msg-icon']="error";
    header("location:./Clients.php");
}
?>