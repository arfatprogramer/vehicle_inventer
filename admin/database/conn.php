<?php
$hostname='localhost';
$username='root';
$password='';
$databsename='vehicles';
try {
    //code...
    $conn=mysqli_connect($hostname,$username,$password,$databsename);
} catch (\Throwable $th) {
    //throw $th;
    echo"some error occur";
    echo $th;
}




?>