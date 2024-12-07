<?php 
include "./layout/headder.php";
include "./database/conn.php";

$nameError = $numberError = null;
$name = '';
$number = '';    

if (isset($_POST['submit'])) {
    $name = $_POST['customerName'];
    $number = $_POST['VehicleNumber'];
    
    if (empty($name)) {
        $nameError = "Name is required";
    }
    if (empty($number)) {
        $numberError = "Number is required";
    }

    if (empty($nameError) && empty($numberError)) {
        // Check if the customer name exists in the database
        $checkNameQuery = "SELECT * FROM customers WHERE customerName = '$name'";
        $checkResult = mysqli_query($conn, $checkNameQuery);
        
        if (mysqli_num_rows($checkResult) > 0) {
            
            $sql = "UPDATE vahicle SET customerName = '$name' vahicleNumber='$number' WHERE id =$id ";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $_SESSION['status'] = true;
                $_SESSION['msg'] = "Data Inserted";
                $_SESSION['msg-icon'] = "success";
                header("location:./Vehicles.php");
            } else {
                $_SESSION['status'] = true;
                $_SESSION['msg'] = "Failed.";
                $_SESSION['msg-icon'] = "error";
                header("location:./Vehicles.php");
            }
        } else {
            $nameError = "Customer name not found.";
        }
    }
}
?>

<div class="flex items-center justify-center h-[60%]">
    <form class='p-4 m-2 border-2 rounded-lg w-full sm:w-1/2 md:lg:w-1/3' action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
        <h1 class='text-center text-lg sm:text-2xl md:text-2xl'>Update Details</h1>
        <div class="w-full pt-2 pb-7 relative">
            <label for="VehicleNumber">Vehicle Number</label>
            <input id='VehicleNumber' class='w-full bg-gray-900 border-b-2 px-2 outline-none' type="text" name='VehicleNumber' value='<?php echo $number ? $number : "" ?>'>
            <span class='absolute bottom-0 left-0 text-red-600'><?php echo $numberError ?></span>
        </div>
        <div class="w-full pt-2 pb-7 relative">
            <label for="customerName">Customer Name</label>
            <input class='w-full bg-gray-900 border-b-2 px-2 outline-none' type="text" name='customerName' id='customerName' value='<?php echo $name ? $name : "" ?>' autocomplete="off">
            <div id="suggestions" class="absolute bg-gray-400 p-3 text-white w-full hidden"></div>
            <span class='absolute bottom-0 left-0 text-red-600'><?php echo $nameError ?></span>
        </div>
        <div class="w-full py-2">
            <input class='w-full bg-green-600 rounded-lg h-10' type="submit" name='submit' value='Update'>
        </div>
    </form>
</div>

<script>

document.getElementById('VehicleNumber').addEventListener('input', function() {
    const inputValue= this.value;
    const newValue=inputValue.toUpperCase();
    this.value=newValue;
});


document.getElementById('customerName').addEventListener('input', function() {
    const query = this.value;
    const suggestionsBox = document.getElementById('suggestions');

    if (query.length > 0) {
        fetch(`fetch_customers.php?query=${query}`)
            .then(response => response.json())
            .then(data => {
                
                console.log(data);
                
                suggestionsBox.innerHTML = '';
                if (data.length > 0) {
                    suggestionsBox.classList.remove('hidden');
                    data.forEach(name => {
                        const suggestionItem = document.createElement('div');
                        suggestionItem.textContent = name;
                        suggestionItem.classList.add('suggestion-item');
                        suggestionItem.onclick = function() {
                            document.getElementById('customerName').value = name;
                            suggestionsBox.innerHTML = '';
                        };
                        suggestionsBox.appendChild(suggestionItem);
                    });
                } else {
                    suggestionsBox.classList.add('hidden');
                    console.log("no data found");
                    
                }
            });
    } else {
        suggestionsBox.classList.add('hidden');
    }
});
</script>
