<?php include"./layout/headder.php"?>
<div class="flex items-center justify-between p-2">
    <a href="new_clients.php"><button class='py-2 px-5 border-2 bg-green-700 rounded-lg hover:bg-blue-700'>New Customer</button></a>
    <button class='py-2 px-5 border-2 bg-green-700 rounded-lg hover:bg-blue-700'>Genrate PDF</button>
</div>
<form class='m-1 px-2 h-10  md:flex md:justify-end  max-md:h-20' action="#">
    <div class="search bg-gray-600 rounded-full px-2 flex items-center justify-center md:w-2/5">
        <input class='bg-gray-600 outline-none border-r-2 w-[90%] px-2' type="text" name="search" id="search" placeholder='Search...'>
        <button class='text-center px-3'>Search</i></button>
    </div>
</form>

<!--table start -->
<div class='w-full overflow-x-auto mt-2'>
<table class='w-full'>
    <thead class='h-1'>
        <tr class='h-1 border-2 bg-green-700 '>
            <th class='w-10 py-2'>ID</th>
            <th class='w-32'>Customer Name</th>
            <th class='w-32'>Phone Number</th>
            <th class='w-10'>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $num=0;
         while($num<10){
            ?>
        <tr class='h-2 border-1 bg-gray-600 '>
            <td class='py-1 text-center'><?php echo $num?></td>
            <td class='py-1 text-center'>Mo Arfat Ansari</td>
            <td class='py-1 text-center'>9104045985</td>
            <td class=' flex gap-3  items-center justify-center py-1 '>
                <a href="#"><button class='p-1 border-2 bg-blue-500 text-center'><i class="fi fi-rr-arrow-up-right-from-square"></i></button></a>
                <a href="#"><button class='p-1 border-2 bg-red-700 text-center'><i class="fi fi-rr-trash"></i></button></a>
            </td>
        </tr>
        <?php $num++; }?>
    </tbody>
</table>
</div>

<?php include"./layout/footer.php"?>