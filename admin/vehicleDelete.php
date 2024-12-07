<?php
include "database/conn.php";
session_start();
$id=$_GET['id'];
$query="DELETE FROM vahicle WHERE id = $id";

$result=mysqli_query($conn,$query);
if($result){
    
    $_SESSION['status']=true;
    $_SESSION['msg']="Data Deleted";
    $_SESSION['msg-icon']="success";
    header("location:./Vehicles.php");
}
else {
    $_SESSION['status']=true;
    $_SESSION['msg']="Deletion failed";
    $_SESSION['msg-icon']="error";
    header("location:./Vehicles.php");
}
?>