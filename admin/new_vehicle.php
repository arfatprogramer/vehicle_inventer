<?php 
include "./layout/headder.php";
include "./database/conn.php";

$query="SELECT 'customerName' FROM customers";
$result = mysqli_query($conn, $query);
$customerName = mysqli_fetch_assoc($result);

$nameError=$numberError=null;
$name='';
$number='';    
if(isset($_POST['submit'])){
$name=$_POST['customerName'];
$number=$_POST['VehicleNumber'];
if(empty($name)){
    $nameError=" Name is required";
}
if(empty($number)){
    $numberError=" Number is required";
}


if(empty($nameError) && empty($numberError)){
    echo $name.$number;
    $sql="INSERT INTO  vahicle (customerName, VehicleNumber) VALUES ('$name','$number')";
    $result=mysqli_query($conn,$sql);
    $result=true;
    if ($result) {
        $_SESSION['status']=true;
        $_SESSION['msg']="Data Inserted";
        $_SESSION['msg-icon']="success";
        header("location:./Vehicles.php");

    }else {
        $_SESSION['status']=true;
        $_SESSION['msg']=" Failed.";
        $_SESSION['msg-icon']="error";
        header("location:./Vehicles.php");
    }
}

}
?>

<div class="flex items-center justify-center h-[60%]  ">
    <form class='p-4 m-2 border-2 rounded-lg w-full sm:w-1/2 md:lg:w-1/3 ' action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
        <h1 class='text-center text-lg sm:text-2xl md:text-2xl'>New Vehicle</h1>
        <div class="w-full pt-2 pb-7 relative">
            <label for="VehicleNumber">Vehicle Number</label>
            <input class='w-full bg-gray-900 border-b-2 px-2 outline-none' type="text" name='VehicleNumber' value='<?php echo $number?$number:""?>'>
            <span class='absolute bottom-0 left-0 text-red-600'><?php echo $numberError?></span>
        </div>
        <div class="w-full pt-2 pb-7 relative ">
            <label for="customerName">Customer Name</label>
            <input class='w-full bg-gray-900 border-b-2 px-2 outline-none' type="text" name='customerName'value='<?php echo $name?$name:""?>'>
            <span class='absolute bottom-0 left-0 text-red-600'><?php echo $nameError?></span>
        </div>
        <div class="w-full py-2 ">
            
            <input class='w-full bg-green-600 rounded-lg h-10 ' type="submit" name='submit' value='Add'>
        </div>
    </form>
</div>



<?php include"./layout/footer.php"?>