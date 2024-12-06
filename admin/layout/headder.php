<?php 
include "head.php";
session_start();

if(!$_SESSION['login']){
  header('location:./login.php');
}


?>

<body class='flex max-sm:flex-col  h-screen bg-black text-white'>
    <nav class="navbar h-screen bg-slate-900 w-1/3 lg:w-1/5 max-sm:h-14  max-sm:overflow-hidden max-md:w-1/3 max-sm:w-full overflow-auto relative">
      <div class="logo flex items-center  h-1/6 px-2 gap-5 py-1 border-b-8 border-black relative  max-sm:hidden"><i id='arrow-icon' class="text-2xl fi fi-rr-arrow-alt-circle-left"></i><h1 class='text-4xl'>Vehicles</h1></div>
      <div class="menu max-sm:hidden ">
        <ul class=''>
          <a href="./">
          <li class='h-14 text-2xl md:text-lg sm:text-sm sm:px-3 flex items-center px-3 gap-6 border-b-4  border-black hover:bg-green-700 active:bg-violet-700 cursor-pointer'>
            <i class="fi fi-rr-apps"></i>
            <span class='px-4' >Dashboard</span>
          </li>
        </a>
          <a href="./Clients.php">
          <li class='h-14 text-2xl md:text-lg sm:text-sm sm:px-3 flex items-center px-4 gap-6 border-b-4 border-black hover:bg-green-700 active:bg-violet-700 cursor-pointer '>
           <i class="fi fi-rr-users-alt"></i>
           <span class='px-4' >Clients</span>
          </li>
        </a>
        <a href="./Vehicles.php">
          <li class='h-14 text-2xl md:text-lg sm:text-sm sm:px-3 flex items-center px-4 gap-6 border-b-4  border-black hover:bg-green-700 active:bg-violet-700 cursor-pointer'>
            <i class="fi fi-rr-shipping-fast"></i>
            <span class='px-4'>Vehicles</span>
          </li>
        </a>
          
        </ul>
        
      </div>
      <div class="user absolute bottom-0  w-full h-16 flex items-center justify-around px-4 border-y-2 border-black max-sm:hidden">
         <div class="flex items-center justify-center h-12 w-12 rounded-full border-2">
          <img src="#" alt="">
         </div>
         <p class='text-2xl md:text-lg sm:text-sm'><?php echo $_SESSION['username']?></p>
         <a href="logOut.php"><i class="fi fi-rr-sign-out-alt text-2xl md:text-lg sm:text-sm flex items-center"></i></a>
        </div>
        <i id='menu-icon' class="  text-2xl absolute top-2 right-7 sm:hidden fi fi-rr-menu-burger"></i>
    </nav>
    <section class="w-full box-border max-sm:h-full max-sm:overflow-auto">
      <div class="bg-slate-900 box-border w-full h-[8%] border-x-8 border-black max-sm:hidden flex items-center justify-start p-3 text-2xl"> Admin panel</div>
      <div class="mainBox box-border w-full h-[92%] max-sm:h-full border-8 border-black  bg-slate-900 overflow-auto">

     
   
  

  
  <!-- npx tailwindcss -i ./admin/input.css -o ./admin/output.css --watch -->
