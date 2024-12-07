<?php include"./layout/head.php";
session_start();
$numberError=$nameError='';

if(isset($_POST['submit'])){
    $username='raza';
    $password=9400;
    if(($username==$_POST['username']) && ($password==$_POST['password'])){
        $_SESSION['username']='Raza Shaikh';
        $_SESSION['login']=true;
        $_SESSION['status']=true;
        $_SESSION['msg']="Login successful";
        $_SESSION['msg-icon']="success";
        header('location:./');
    }else{
        $numberError='Invalid username or password ';
        $_SESSION['status']=true;
        $_SESSION['msg']="Invalid username or password";
        $_SESSION['msg-icon']="error";
    }
}

?>
<body class='bg-black text-white h-screen'>
<div class="flex items-center justify-center h-[60%]  ">
    <form class='p-4 m-2 border-2 rounded-lg w-full sm:w-1/2 md:lg:w-1/3 ' action="<?php $PHP_SELF?>" method="post">
        <h1 class='text-center text-lg sm:text-2xl md:text-2xl'>Admin Login</h1>

        <div class="w-full pt-2 pb-7 relative">
            <label for="username">username</label>
            <input class='w-full bg-gray-900 border-b-2 px-2 outline-none' type="text" name='username'>
            <span class='absolute bottom-0 left-0 text-red-600'><?php echo $nameError?></span>
        </div>
        <div class="w-full pt-2 pb-7 relative ">
            <label for="password">Password </label>
            <input class='w-full bg-gray-900 border-b-2 px-2 outline-none' type="password" name='password'>
            <span class='absolute bottom-0 left-0 text-red-600'><?php echo $numberError?></span>
        </div>
        <div class="w-full py-2 ">
            
            <input class='w-full bg-green-600 rounded-lg h-10 ' type="submit" name='submit' value='Login'>
        </div>
    </form>
</div>



<?php include "./layout/footer.php"?>