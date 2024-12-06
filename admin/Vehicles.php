<?php include"./layout/headder.php"?>
<div class="flex items-center justify-between p-2">
    <a href="new_vehicle.php"><button class='py-2 px-5 border-2 bg-green-700 rounded-lg hover:bg-blue-700'>New Vehicle</button></a>
    <button class='py-2 px-5 border-2 bg-green-700 rounded-lg hover:bg-blue-700'>Generate PDF</button>
</div>
<form class='m-1   md:flex md:justify-between ' action="#">
    <div class="filter py-3 px-1">
        <label for="filter">Filter </label>
        <select class='bg-gray-600 mx-3' name="filter" id="filter">
            <option value="all">All</option>
            <option value="done">Done</option>
            <option value="pending">Pending</option>
            <option value="challan">Challan</option>
        </select>
        <label for="date">Date </label>
        <select id='dateFilter' class='bg-gray-600 mx-3' name="date" id="filter">
            <option value="all">All</option>
            <option value="today">Today</option>
            <option value="yesterday">Yesterday</option>
            <option value="custom">custom</option>
        </select>
        
    </div>
    <div id='custom'class=" hidden ">
        <label for="date">From </label>
        <input class='bg-gray-600 w-[107px] ms:w-[150px] ms:md:w-[150px] '  placeholder='Chose Date' type="date" name="from" id="from">
        <label for="date"> To </label>
        <input class='bg-gray-600 w-[107px] ms:w-[150px] ms:md:w-[150px]  ' placeholder='Chose Date' type="date" name="to" id="to">
        </div>
    <div class="search bg-gray-600 rounded-full px-2 mt-2 flex items-center justify-center md:w-2/5">
        <input class='bg-gray-600 outline-none border-r-2 w-[90%] px-2' type="search" name="search" id="search"  placeholder='Search...'>
        <button type='submit' class='text-center px-3'>Search</i></button>
    </div>
</form>

<!--table start -->
<div class='w-full overflow-x-auto mt-2'>
<table class='w-[700px] sm:w-full'>
    <thead class='h-1'>
        <tr class='h-1 border-2 bg-green-700 '>
            <th class='w-10 py-2'>Date</th>
            <th class='w-32'>Vehicle Number</th>
            <th class='w-32'>Customer Name</th>
            <th class='w-10'>Status</th>
            <th class='w-10'>Doc</th>
            <th class='w-10 text-right'>Action</th>
            <th class='w-10'></th>
        </tr>
    </thead>
    <tbody>
        <?php $num=0;
         while($num<10){
            ?>
        <tr class='h-2 border-1 bg-gray-600 '>
            <td class='py-1 text-center '>22/12/2024</td>
            <td class='py-1 text-center'>GJ 15 cw 9400</td>
            <td class='py-1 text-center'>Mo Arfat Ansari</td>
            <td class='py-1 text-center'>
                <select class='bg-gray-600' name="status" id="status">
                    <option value="pending">Pending</option>
                    <option value="done">Done</option>
                    <option value="challan">Challan</option>
                </select>
            </td>
            <td class='py-1 max-sm:px-3 text-center'><a href="#"><button class='p-1 border-2 bg-blue-500 text-center'><i class="fi fi-rr-document px-3"></button></a></i></td>
            <!-- <td class=' flex gap-3 h-full  items-center justify-center py-1 '> -->
            <td class='py-1 max-sm:px-3 text-center '>
                <a href="#"><button class='p-1 border-2 bg-blue-500 text-center my-2'><i class="fi fi-rr-arrow-up-right-from-square px-3"></i></button></a>
            </td>
            <td class='py-1 max-sm:px-3 text-center '>
                <a href="#"><button class='p-1 border-2 bg-red-700 text-center my-2'><i class="fi fi-rr-trash px-3"></i></button></a>
            </td>
        </tr>
        <?php $num++; }?>
    </tbody>
</table>
</div>





<script>
   // for custom date range
   const dateFilter=document.getElementById("dateFilter");
   dateFilter.addEventListener("change",()=>{
       if(dateFilter.selectedIndex==3){
        document.getElementById("custom").classList.remove('hidden')
        }else{
            document.getElementById("custom").classList.add('hidden')
        }
    })
</script>
<?php include"./layout/footer.php"?>