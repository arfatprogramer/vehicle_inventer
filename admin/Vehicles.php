<?php 
include "./layout/headder.php";
include "./database/conn.php";
$filter="";
$date="";
$search="";
if(isset($_POST['search'])){
    $search= $_POST['search'];
    $date= $_POST['date'];
    $filter= $_POST['filter'];

    function findDate($arg) {
        $today = date("Y-m-d");
        
        if ($arg === "today") {
            return $today;
        } elseif ($arg === "yesterday") {
            return date("Y-m-d", strtotime("-1 day"));
        } elseif ($arg === "custom") {
            // Retrieve the custom date range from POST request
            $from = isset($_POST['from']) ? $_POST['from'] : '';
            $to = isset($_POST['to']) ? $_POST['to'] : '';
            
            // Validate the dates
            if (!empty($from) && !empty($to)) {
                return ['from' => $from, 'to' => $to];
            } 
        }
    }
    
}

if (is_array($searchDate)) {
    // Use $searchDate['from'] and $searchDate['to'] in your SQL query
    $sql = "SELECT * FROM vahicle WHERE date BETWEEN '{$searchDate['from']}' AND '{$searchDate['to']}' ORDER BY id DESC";
} else {
    // Handle other cases (today, yesterday)
}

if(!empty($search)){
    $sql="SELECT * FROM vahicle WHERE vahicleNumber LIKE '%$search%' OR CustomerName LIKE '%$search%' ORDER BY id DESC";
    
}else{
    if(!empty($filter)){
        
    }
    $sql="SELECT * FROM vahicle ORDER BY id DESC";
    
}


$result = mysqli_query($conn, $sql);

?>
<div class="flex items-center justify-between p-2">
    <a href="new_vehicle.php"><button class='py-2 px-5 border-2 bg-green-700 rounded-lg hover:bg-blue-700'>New Vehicle</button></a>
    <button class='py-2 px-5 border-2 bg-green-700 rounded-lg hover:bg-blue-700'>Generate PDF</button>
</div>
<form class='m-1   md:flex md:justify-between ' method='post' action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="filter py-3 px-1">
        <button class='bg-blue-600 py-1 px-2 rounded-lg border-2 hover:bg-purple-700' type=submit name="filter">Filter </button>
        <select class='bg-gray-600 mx-3' name="filter" id="filter">
            <option value="all" <?php echo$filter == "all" ? " selected" : "" ?>>All</option>
            <option value="done"<?php echo$filter == "done" ? " selected" : "" ?>>Done</option>
            <option value="pending"<?php echo$filter == "pending" ? " selected" : "" ?>>Pending</option>
            <option value="challan"<?php echo$filter == "challan" ? " selected" : "" ?>>Challan</option>
        </select>
        <!-- <label for="date">Date </label> -->
        <select id='dateFilter' class='bg-gray-600 mx-3' name="date" id="filter">
            <option value="today"<?php echo$date == "today" ? " selected" : "" ?>>Today</option>
            <option value="yesterday" <?php echo$date == "yesterday" ? " selected" : "" ?>>Yesterday</option>
            <option value="custom" <?php echo$date == "custom" ? " selected" : "" ?>>custom</option>
        </select>
        
    </div>
    <div id='custom'class=" hidden py-3 px-1">
        
        </div>
    <div class="search bg-gray-600 rounded-full px-2 mt-2 flex items-center justify-center md:w-2/5 h-10">
        <input class='bg-gray-600 outline-none border-r-2 w-[90%] px-2' type="search" name="search" id="search"  placeholder='Search...' value='<?php echo empty($search)?"":$search?>'>
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
        <?php $num=1;
         while($row=mysqli_fetch_assoc($result)){
            ?>
        <tr class='h-2 border-1 bg-gray-600 '>
            <td class='py-1 text-center '><?php echo $row['date']?></td>
            <td class='py-1 text-center'><?php echo $row['vahicleNumber']?></td>
            <td class='py-1 text-center'><?php echo $row['customerName']?></td>
            <td class='py-1 text-center'>
                <select class='<?php if($row["status"] == 0){echo'bg-yellow-600';}elseif($row["status"] == 1){echo'bg-green-600';}else{echo'bg-red-700';} ?>' name="status" id="status">
                    <option value="0" <?php $row["status"] == 0 ? " selected" : "" ?>>Pending</option>
                    <option  value="1" <?php $row["status"] == 1 ? " selected" : "" ?>>Done</option>
                    <option value="2" <?php $row["status"] == 2 ? " selected" : "" ?>>Challan</option>
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
   if(dateFilter.selectedIndex==2){
         html=`<label for="date">From </label>
        <input class='bg-gray-600 w-[107px] ms:w-[150px] ms:md:w-[150px] '  placeholder='Chose Date' type="date" name="from" id="from">
        <label for="date"> To </label>
        <input class='bg-gray-600 w-[107px] ms:w-[150px] ms:md:w-[150px]  ' placeholder='Chose Date' type="date" name="to" id="to">`;
        document.getElementById("custom").innerHTML=html;
        document.getElementById("custom").classList.remove('hidden');
        }
   dateFilter.addEventListener("change",()=>{
       if(dateFilter.selectedIndex==2){
         html=`<label for="date">From </label>
        <input class='bg-gray-600 w-[107px] ms:w-[150px] ms:md:w-[150px] '  placeholder='Chose Date' type="date" name="from" id="from">
        <label for="date"> To </label>
        <input class='bg-gray-600 w-[107px] ms:w-[150px] ms:md:w-[150px]  ' placeholder='Chose Date' type="date" name="to" id="to">`;
        document.getElementById("custom").innerHTML=html;
        document.getElementById("custom").classList.remove('hidden');
        }else{
            document.getElementById("custom").classList.add('hidden');
        }
    })
</script>
<?php include"./layout/footer.php"?>