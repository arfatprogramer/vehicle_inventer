<?php include"./layout/head.php";

session_start();

if(isset($_POST['submit'])){
    $username='raza';
    $password=9400;
    if(($username==$_POST['username']) && ($password==$_POST['password'])){
        $_SESSION['username']='Raza Shaikh';
        $_SESSION['login']=true;
        header('location:./');
    }
}

?>
<body class='bg-black text-white h-screen'>
<div class="flex items-center justify-center h-[60%]  ">
    <form class='p-4 m-2 border-2 rounded-lg w-full sm:w-1/2 md:lg:w-1/3 ' action="<?php $PHP_SELF?>" method="post">
        <h1 class='text-center text-lg sm:text-2xl md:text-2xl'>Admin Login</h1>
        <div class="w-full py-2 ">
            <label for="username">Username</label>
            <input class='w-full bg-gray-900 border-b-2 px-2 outline-none' type="text" name='username'>
        </div>
        <div class="w-full py-2 ">
            <label for="password">Password</label>
            <input class='w-full bg-gray-900 border-b-2 px-2 outline-none' type="text" name='password'>
        </div>
        <div class="w-full py-2 ">
            
            <input class='w-full bg-green-600 rounded-lg  ' type="submit" name='submit' value='Login'>
        </div>
    </form>
</div>



<?php include"./layout/footer.php"?>