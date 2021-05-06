
<html>
<head>
    <title>Notifier Desktop | Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='icon' href='favicon.ico' type='image/x-icon'/ >
<script>
function go(){
  // (A) VARIABLES TO PASS
  var first =document.getElementById("person_name").value;
  // (B) OPEN NEW WINDOW
  // Just pass variables over to new window
  var newwin = window.open("customer_payment.html");
  newwin.onload = function(){
    // "this" refers to newwin
    this.first = first;
  };
}
</script>

</head>

<body bgcolor="#f1f1f1">
    
     
  <p>
      <?php
      define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'id16747982_sumit123');
   define('DB_PASSWORD', 'Kumar@123456789');
   define('DB_DATABASE', 'id16747982_lms');
   $link = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
     

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution of first phone

$sql  = "SELECT * FROM customer";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table border=\"2\">";
            echo "<tr>";
                echo "<th>SELECT</th>";
                echo "<th>NAME</th>";
                echo "<th>CONTACT</th>";
                echo "<th>ADDRESS</th>";
                echo "<th>DOB</th>";
                echo "<th>AADHAAR NO.</th>";
                echo "<th>VEHICLE TYPE</th>";
                echo "<th>MODEL</th>";
                echo "<th>ART. NO.</th>";
                echo "<th>AADHAAR</th>";
                echo "<th>CUTOMER</th>";
                echo "<th>CUST. ID</th>";
                echo "<th>MOBILE</th>";
                echo "<th>TOTAL EMI</th>";
                echo "<th>TOTAL AMT</th>";
                echo "<th>DOWN PAYMENT</th>";
                echo "<th>PR. AMT</th>";
                echo "<th>RATE of INT.</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            $name = $row['name'];
            echo "<tr>";
                echo "<td> <center><input type='radio' name='person_name' value='$name' id='person_name'></center> </td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['contact'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                echo "<td>" . $row['dob'] . "</td>";
                echo "<td>" . $row['aadhar_number'] . "</td>";
                echo "<td>" . $row['vehicle_type'] . "</td>";
                echo "<td>" . $row['model'] . "</td>";
                echo "<td>" . $row['article_no'] . "</td>";
                echo "<td>" ."<img  src='customer_images/".$row['aadhar_img']."' width='100' height='85' >". "</td>";
                echo "<td>" ."<img   src='customer_images/".$row['customer_img']."' width='85' height='100' >". "</td>";
                echo "<td>" . $row['customer_id'] . "</td>";
                echo "<td>" . $row['mobile_number'] . "</td>";
                echo "<td>" . $row['total_emi'] . "</td>";
                echo "<td>" . $row['total_amt'] . "</td>";
                echo "<td>" . $row['down_payment'] . "</td>";
                echo "<td>" . $row['principle_amt'] . "</td>";
                echo "<td>" . $row['rate_interest'] . "</td>";
               
            echo "</tr>";
        }
        echo "</table>";
        // Close result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?>
  </p>
     <button onclick="go()">Click to Pay!</button>
    <p id="demo"></p>
    
</body>    

</html>