<?php 
include "./layout/headder.php";
include "./database/conn.php";
$filter="";
$date="";
$search="";
if($_SERVER['REQUEST_METHOD']=='POST'){
     $sql="SELECT * FROM vahicle ";
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
        }elseif ($arg === "range") {
            // Retrieve the custom date range from POST request
            $from = date("Y-m-d", strtotime("-6 day"));
            $to = $today;
            
            // Validate the dates
            if (!empty($from) && !empty($to)) {
                return ['from' => $from, 'to' => $to];
            } 
        }
    }

    $searchDate=findDate($date);
    //new logic implementation

   
    
    if(!empty($search)){
        $sql=$sql."WHERE vahicleNumber LIKE '%$search%' OR CustomerName LIKE '%$search%' ";
        
    }

    if((!empty($filter))&&(!empty($search))){
        $sql=$sql."and status = $filter";
        
    }elseif((!empty($filter))&&(empty($search))){
        $sql=$sql."where status = $filter";
        
    }

    // date filter 
    if(is_array($searchDate)){
        if(empty($search) && empty($filter)){
            $sql=$sql."WHERE date BETWEEN '$searchDate[from]' AND '$searchDate[to]'";
           
        }else{
            $sql=$sql." AND date BETWEEN '$searchDate[from]' AND '$searchDate[to]'";
            
        }
    }else{
         if(empty($search) && empty($filter)){
             $sql=$sql." WHERE date LIKE '$searchDate'";
        
            }else{
                
            $sql=$sql." and date LIKE '$searchDate'";
        }
    }

    
    
    
    
}else{
    $defaultDate=date("Y-m-d");
    $sql="SELECT * FROM vahicle Where date LIKE '$defaultDate' ";
    
}

$sql=$sql." ORDER BY date DESC";
// echo $sql;

$result = mysqli_query($conn, $sql);

?>
<div class="flex items-center justify-between p-2">
    <a href="new_vehicle.php"><button class='py-2 px-5 border-2 bg-green-700 rounded-lg hover:bg-blue-700'>New Vehicle</button></a>
    <a href="generate_pdf.php?search=<?php echo$search?>&&date=<?php echo empty($date)?"today":$date?>&&filter=<?php echo$filter?>"> <button class='py-2 px-5 border-2 bg-green-700 rounded-lg hover:bg-blue-700'>Generate PDF</button></a>
</div>
<form class='m-1   md:flex md:justify-between ' method='post' action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="filter py-3 px-1">
        <button class='bg-blue-600 py-1 px-2 rounded-lg border-2 hover:bg-purple-700' type=submit name="filter">Filter </button>
        <select class='bg-gray-600 mx-3' name="filter" id="filter">
            <option value="" <?php echo$filter == "" ? " selected" : "" ?>>All</option>
            <option value="1"<?php echo$filter == "1" ? " selected" : "" ?>>Pending</option>
            <option value="2"<?php echo$filter == "2" ? " selected" : "" ?>>Done</option>
            <option value="3"<?php echo$filter == "3" ? " selected" : "" ?>>Challan</option>
        </select>
        <!-- <label for="date">Date </label> -->
        <select id='dateFilter' class='bg-gray-600 mx-3' name="date" id="filter">
            <option value="today"<?php echo$date == "today" ? " selected" : "" ?>>Today</option>
            <option value="yesterday" <?php echo$date == "yesterday" ? " selected" : "" ?>>Yesterday</option>
            <option value="range" <?php echo$date == "range" ? " selected" : "" ?>>Last 7 days</option>
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
            <!-- <th class='w-10'>Doc</th> -->
            <th class='w-10 text-right'>Action</th>
            <th class='w-10'></th>
        </tr>
    </thead>
    <tbody>
        <?php 
         while($row=mysqli_fetch_assoc($result)){
            ?>
        <tr class='h-2 border-1 bg-gray-600 '>
            <td class='py-1 text-center '><?php echo $row['date']?></td>
            <td class='py-1 text-center'><?php echo $row['vahicleNumber']?></td>
            <td class='py-1 text-center'><?php echo $row['customerName']?></td>
            <td class='py-1 text-center'>
                <select  class='status <?php if($row["status"] == 1){echo'bg-yellow-600';}elseif($row["status"] == 2){echo'bg-green-600';}else{echo'bg-red-700';} ?>' name="status" id="status">
                    <option value="<?php echo $row['id']?>1" <?php  echo $row["status"] == 1 ? " selected" : "" ?>>Pending</option>
                    <option  value="<?php echo $row['id']?>2" <?php echo  $row["status"] == 2 ? " selected" : "" ?>>Done</option>
                    <option value="<?php echo $row['id']?>3" <?php  echo $row["status"] == 3 ? " selected" : "" ?>>Challan</option>
                </select>
            </td>
            <!-- <td class='py-1 max-sm:px-3 text-center'>
                <a href="#?id=<?php //echo $row['id']?>"><button class='p-1 border-2 bg-blue-500 text-center'><i class="fi fi-rr-document px-3"></button></a></i>
            </td> -->
            <td class='py-1 max-sm:px-3 text-center '>
                <a href="vehicleUpdate.php?id=<?php echo $row['id']?>"><button class='p-1 border-2 bg-blue-500 text-center my-2'><i class="fi fi-rr-arrow-up-right-from-square px-3"></i></button></a>
            </td>
            <td class='py-1 max-sm:px-3 text-center '>
                <a href="vehicleDelete.php?id=<?php echo $row['id']?>"><button class='p-1 border-2 bg-red-700 text-center my-2'><i class="fi fi-rr-trash px-3"></i></button></a>
            </td>
        </tr>
        <?php  }?>
    </tbody>
</table>
</div>





<script>
   // for custom date range
   const dateFilter=document.getElementById("dateFilter");
   if(dateFilter.selectedIndex==3){
         html=`<label for="date">From </label>
        <input class='bg-gray-600 w-[107px] ms:w-[150px] ms:md:w-[150px] '  placeholder='Chose Date' type="date" name="from" id="from">
        <label for="date"> To </label>
        <input class='bg-gray-600 w-[107px] ms:w-[150px] ms:md:w-[150px]  ' placeholder='Chose Date' type="date" name="to" id="to">`;
        document.getElementById("custom").innerHTML=html;
        document.getElementById("custom").classList.remove('hidden');
        }
   dateFilter.addEventListener("change",()=>{
       if(dateFilter.selectedIndex==3){
         html=`<label for="date">From </label>
        <input class='bg-gray-600 w-[107px] ms:w-[150px] ms:md:w-[150px] '  placeholder='Chose Date' type="date" name="from" id="from">
        <label for="date"> To </label>
        <input class='bg-gray-600 w-[107px] ms:w-[150px] ms:md:w-[150px]  ' placeholder='Chose Date' type="date" name="to" id="to">`;
        document.getElementById("custom").innerHTML=html;
        document.getElementById("custom").classList.remove('hidden');
        }else{
            document.getElementById("custom").classList.add('hidden');
        }
    });

    const vahicleStatus=document.querySelectorAll('.status');
    
    vahicleStatus.forEach((e)=>{
        
        e.addEventListener("change",async (e)=>{
        let value=e.target.value;
        let id=value.slice(0,value.length-1);
        let update=value[value.length-1];
        let res=await fetch(`updateVahicleStatus.php?id=${id}&&value=${update}`);
        let data=await res.json();
        if(data){
            if(update==1){
                e.target.style.backgroundColor='#ca8a04';
            }else if(update==2){
                e.target.style.backgroundColor='#16a34a';

            }else if(update==3){
                e.target.style.backgroundColor='#b91c1c';

            }
            
        }
    })
    });
    
</script>
<?php include"./layout/footer.php"?>