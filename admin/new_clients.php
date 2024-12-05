<?php include"./layout/headder.php"?>

<div class="flex items-center justify-center h-[60%]  ">
    <form class='p-4 m-2 border-2 rounded-lg w-full sm:w-1/2 md:lg:w-1/3 ' action="#" method="post">
        <h1 class='text-center text-lg sm:text-2xl md:text-2xl'>New Customer</h1>
        <div class="w-full py-2 ">
            <label for="name">Name</label>
            <input class='w-full bg-gray-900 border-b-2 px-2 outline-none' type="text" name='name'>
        </div>
        <div class="w-full py-2 ">
            <label for="phoneNumber">Phone Number</label>
            <input class='w-full bg-gray-900 border-b-2 px-2 outline-none' type="text" name='phoneNumber'>
        </div>
        <div class="w-full py-2 ">
            
            <input class='w-full bg-green-600 rounded-lg  ' type="submit" name='submit' value='Submit'>
        </div>
    </form>
</div>



<?php include"./layout/footer.php"?>