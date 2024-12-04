<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./output.css" rel="stylesheet"> <!-- tailwind css -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=dashboard" /> -->
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
  <style>
    /* width */
::-webkit-scrollbar {
  width: 7px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #888; 
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #f1f1f1; 
}

/* Handle on hover */
/* ::-webkit-scrollbar-thumb:hover {
  background: #555; 
} */
  </style>
</head>
<body class='flex max-sm:flex-col  h-screen bg-black text-white'>
    <nav class="navbar h-screen bg-slate-900 w-1/3 lg:w-1/5 max-sm:h-14  max-sm:overflow-hidden max-md:w-1/3 max-sm:w-full overflow-auto relative">
      <div class="logo flex items-center  h-1/6 px-2 gap-5 py-1 border-b-8 border-black relative  max-sm:hidden"><i id='arro-icon' class="text-2xl fi fi-rr-arrow-alt-circle-left"></i><h1 class='text-4xl'>Vehicles</h1></div>
      <div class="menu max-sm:hidden ">
        <ul class=''>
          <li class='h-14 text-2xl md:text-lg sm:text-sm sm:px-3 flex items-center px-3 gap-6 border-b-4  border-black hover:bg-green-700 cursor-pointer'>
            <a href="./">
            <i class="fi fi-rr-apps"></i>
            <span class='px-4' >Dashboard</span>
            </a>
          </li>
          <li class='h-14 text-2xl md:text-lg sm:text-sm sm:px-3 flex items-center px-4 gap-6 border-b-4 border-black hover:bg-green-700 cursor-pointer '>
           <a href="./Clients.php">
           <i class="fi fi-rr-users-alt"></i>
           <span class='px-4' >Clients</span>
           </a>
          </li>
          <li class='h-14 text-2xl md:text-lg sm:text-sm sm:px-3 flex items-center px-4 gap-6 border-b-4  border-black hover:bg-green-700 cursor-pointer'>
            <a href="./Vehicles.php">
            <i class="fi fi-rr-shipping-fast"></i>
            <span class='px-4'>Vehicles</span>
            </a>
          </li>
          
        </ul>
        
      </div>
      <div class="user absolute bottom-0  w-full h-16 flex items-center justify-around px-4 border-y-2 bordr-black max-sm:hidden">
         <div class="flex items-center justify-center h-12 w-12 rounded-full border-2">
          <img src="#" alt="">
         </div>
         <p class='text-2xl md:text-lg sm:text-sm'>user</p>
         <i class="fi fi-rr-sign-out-alt text-2xl md:text-lg sm:text-sm flex items-center"></i>
        </div>
        <i id='menu-icon' class="  text-2xl absolute top-2 right-7 sm:hidden fi fi-rr-menu-burger"></i>
    </nav>
    <section class="w-full box-border max-sm:h-full max-sm:overflow-auto">
      <div class="bg-slate-900 box-border w-full h-[8%] border-x-8 border-black max-sm:hidden"> Dashboard</div>
      <div class="mainBox box-border w-full h-[92%] max-sm:h-full border-8 border-black  bg-slate-900 overflow-auto">

     
   
  

  
  <!-- npx tailwindcss -i ./admin/input.css -o ./admin/output.css --watch -->
