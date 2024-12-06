<?php
include "./database/conn.php";
$query=$_GET['query'];
$sql="SELECT * FROM customers WHERE customerName like '%$query%'";
$result = mysqli_query($conn, $sql);
$data = array();
while($arr=mysqli_fetch_assoc($result)){
    
    array_push($data,$arr['customerName']);
}
// print_r($data);
 $data=json_encode($data);
 echo $data;
 
?>

