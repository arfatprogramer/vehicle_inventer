<?php
include "./database/conn.php";
$id=$_GET['id'];
$value=$_GET['value'];
$sql="UPDATE vahicle SET status = $value WHERE id=$id";
$result = mysqli_query($conn, $sql);
$result=1;
echo json_encode($result);


?>