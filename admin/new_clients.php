<?php 
include "./layout/headder.php";
include "./database/conn.php";

$nameError=$numberError=null;
$name='';
$number='';    
if(isset($_POST['submit'])){
$name=$_POST['name'];
$number=$_POST['phoneNumber'];
if(empty($name)){
    $nameError="Name is required";
}
if(empty($number)){
    $numberError="Phone Number is required";
}
if(!preg_match('/^[0-9]{10}+$/', $number)) {
    $numberError= "Invalid Phone Number";
    }
}
if((empty($nameError) && empty($numberError))&&((!empty($name))&&(!empty($number)))){

    $query="INSERT INTO customers (customerName,phoneNumber) VALUES ('$name','$number')";
    $result=mysqli_query($conn,$query);
    if ($result) {
        $_SESSION['status']=true;
        $_SESSION['msg']="Data Inserted";
        $_SESSION['msg-icon']="success";
        header("location:./Clients.php");

    }else {
        $_SESSION['status']=true;
        $_SESSION['msg']=" Failed.";
        $_SESSION['msg-icon']="error";
        header("location:./Clients.php");
    }
}


?>

<div class="flex items-center justify-center h-[60%]  ">
    <form class='p-4 m-2 border-2 rounded-lg w-full sm:w-1/2 md:lg:w-1/3 ' action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
        <h1 class='text-center text-lg sm:text-2xl md:text-2xl'>New Customer</h1>
        <div class="w-full pt-2 pb-7 relative">
            <label for="name">Name</label>
            <input class='w-full bg-gray-900 border-b-2 px-2 outline-none' type="text" name='name' value='<?php echo $name?$name:""?>'>
            <span class='absolute bottom-0 left-0 text-red-600'><?php echo $nameError?></span>
        </div>
        <div class="w-full pt-2 pb-7 relative ">
            <label for="phoneNumber">Phone Number</label>
            <input class='w-full bg-gray-900 border-b-2 px-2 outline-none' type="text" name='phoneNumber'value='<?php echo $number?$number:""?>'>
            <span class='absolute bottom-0 left-0 text-red-600'><?php echo $numberError?></span>
        </div>
        <div class="w-full py-2 ">
            
            <input class='w-full bg-green-600 rounded-lg h-10 ' type="submit" name='submit' value='Add'>
        </div>
    </form>
</div>



<?php include"./layout/footer.php"?>