<?php 
    include "./layout/headder.php";
    include "database/conn.php";
    $sql="SELECT status,date FROM vahicle ";

    $result = mysqli_query($conn, $sql);
    $today= Date('Y-m-d');
    $yesterday= Date('Y-m-d',strtotime("-1 day"));
    $obj=[
                'today'=>[1=>0,2=>0,3=>0],
                'yesterday'=>[1=>0,2=>0,3=>0],
                'total'=>[1=>0,2=>0,3=>0]
            ];

    if($result){
        while ($row=mysqli_fetch_assoc($result)) {
            if ($row['date']===$today) {
        $obj['today'][$row['status']]+=1;     
    }else if($row['date']===$yesterday) {
        $obj['yesterday'][$row['status']]+=1;    
    }   
    $obj['total'][$row['status']]+=1;    
                
        }
    }



?>
<h1 class='text-2xl px-2'>Today's</h1>
<div class="box flex  flex-wrap max-sm:gap-3 p-3 justify-between">
    <div class="card bg-gray-600 hover:bg-green-600 border-2 rounded-lg p-3 h-32 flex flex-col items-center justify-center gap-3 w-full sm:w-[22%]">
        <h1 class='text-center'>Total of Today</h1>
        <h2 class='text-center'><?php echo $obj['today']['1']+$obj['today']['2']+$obj['today']['3']?></h2>
    </div>
    <div class="card bg-gray-600 hover:bg-green-600 border-2 rounded-lg p-3 h-32 flex flex-col items-center justify-center gap-3 w-full sm:w-[22%]">
        <h1 class='text-center'>Pending Today</h1>
        <h2 class='text-center'><?php echo $obj['today']['1']?></h2>
    </div>
    <div class="card bg-gray-600 hover:bg-green-600 border-2 rounded-lg p-3 h-32 flex flex-col items-center justify-center gap-3 w-full sm:w-[22%]">
        <h1 class='text-center'>Done Today</h1>
        <h2 class='text-center'><?php echo $obj['today']['2']?></h2>
    </div>
    <div class="card bg-gray-600 hover:bg-green-600 border-2 rounded-lg p-3 h-32 flex flex-col items-center justify-center gap-3 w-full sm:w-[22%]">
        <h1 class='text-center'>Challan Today</h1>
        <h2 class='text-center'><?php echo $obj['today']['3']?></h2>
    </div>
</div>

<h1 class='text-2xl px-2'>Yesterday's</h1>
<div class="box flex  flex-wrap max-sm:gap-3 p-3 justify-between">
    <div class="card bg-gray-600 hover:bg-green-600 border-2 rounded-lg p-3 h-32 flex flex-col items-center justify-center gap-3 w-full sm:w-[22%]">
        <h1 class='text-center'>Total of Yesterday</h1>
        <h2 class='text-center'><?php echo $obj['yesterday']['1']+$obj['yesterday']['2']+$obj['yesterday']['3']?></h2>
    </div>
    <div class="card bg-gray-600 hover:bg-green-600 border-2 rounded-lg p-3 h-32 flex flex-col items-center justify-center gap-3 w-full sm:w-[22%]">
        <h1 class='text-center'>Pending Yesterday</h1>
        <h2 class='text-center'><?php echo $obj['yesterday']['1']?></h2>
    </div>
    <div class="card bg-gray-600 hover:bg-green-600 border-2 rounded-lg p-3 h-32 flex flex-col items-center justify-center gap-3 w-full sm:w-[22%]">
        <h1 class='text-center'>Done Yesterday</h1>
        <h2 class='text-center'><?php echo $obj['yesterday']['2']?></h2>
    </div>
    <div class="card bg-gray-600 hover:bg-green-600 border-2 rounded-lg p-3 h-32 flex flex-col items-center justify-center gap-3 w-full sm:w-[22%]">
        <h1 class='text-center'>Challan Yesterday</h1>
        <h2 class='text-center'><?php echo $obj['yesterday']['3']?></h2>
    </div>
</div>

<h1 class='text-2xl px-2'>Total</h1>
<div class="box flex  flex-wrap max-sm:gap-3 p-3 justify-between">
    <div class="card bg-gray-600 hover:bg-green-600 border-2 rounded-lg p-3 h-32 flex flex-col items-center justify-center gap-3 w-full sm:w-[22%]">
        <h1 class='text-center'>Total</h1>
        <h2 class='text-center'><?php echo $obj['total']['1']+$obj['total']['2']+$obj['total']['3']?></h2>
    </div>
    <div class="card bg-gray-600 hover:bg-green-600 border-2 rounded-lg p-3 h-32 flex flex-col items-center justify-center gap-3 w-full sm:w-[22%]">
        <h1 class='text-center'>Pending </h1>
        <h2 class='text-center'><?php echo $obj['total']['1']?></h2>
    </div>
    <div class="card bg-gray-600 hover:bg-green-600 border-2 rounded-lg p-3 h-32 flex flex-col items-center justify-center gap-3 w-full sm:w-[22%]">
        <h1 class='text-center'>Done</h1>
        <h2 class='text-center'><?php echo $obj['total']['2']?></h2>
    </div>
    <div class="card bg-gray-600 hover:bg-green-600 border-2 rounded-lg p-3 h-32 flex flex-col items-center justify-center gap-3 w-full sm:w-[22%]">
        <h1 class='text-center'>Challan</h1>
        <h2 class='text-center'><?php echo $obj['total']['3']?></h2>
    </div>
</div>



<script>
 
    // let data=<?php //echo json_encode($data); ?>;
    // let today= "2024-12-07";
    // let yesterday= "2024-12-06";
    // let obj={
    //             'today':{1:0,2:0,3:0},
    //             'yesterday':{1:0,2:0,3:0},
    //             'total':{1:0,2:0,3:0},
    //         };


    // data.forEach((e)=>{
    //     if (e.date===today) {
    //         obj['today'][e.status]+=1;     
    //     }else if(e.date===yesterday) {
    //         obj['yesterday'][e.status]+=1;    
    //     }   
    //      obj['total'][e.status]+=1; 
    // })
    // console.log(obj);
    
        
   
</script>

<?php include"./layout/footer.php"?>