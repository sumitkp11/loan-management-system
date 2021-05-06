<?php
    $servername = "localhost";
    $db_username = "id16747982_sumit123";
    $db_password = "Kumar@123456789";
    $db_name = "id16747982_lms";
   
    $name =  $_POST["name"];  
    $contact =  $_POST["contact"]; 
    $address =  $_POST["address"];  
    $dob = $_POST["dob"];  
    $aadhar = $_POST["aadhaar"];  
    $vehicle = $_POST["vehicle"];  
    $model =  $_POST["model"];  
    $article_no =  $_POST["article_no"];  
   
    $cust_id =  $_POST["cust_id"];  
    $mobile =  $_POST["mobile"];  
    $total_emi = $_POST["total_emi"];  
    $total_amt =  $_POST["total_amt"];  
    $down_pay =  $_POST["down_pay"];  
    $pr_amt = $_POST["pr_amt"];  
    $rate_of_int = $_POST["rate_of_int"];
    
    // $aadhar_img =  $_FILES["aadhar_img"];  
    //$cust_img = $_FILES["cust_img"];  
    
     $aadhar_img = $_FILES["aadhar_img"]["name"];
     $cust_img = $_FILES["cust_img"]["name"];
     
    $tempname1 = $_FILES["aadhar_img"]["tmp_name"];    
    $tempname2 = $_FILES["cust_img"]["tmp_name"];   
     
    $folder1 = "customer_images/".$aadhar_img;
   $folder2 = "customer_images/".$cust_img;
   
   //$image1 = "https://123lms.000webhostapp.com/customer_images/";
   
   // Create connection
$conn = new mysqli($servername, $db_username, $db_password, $db_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
  $query = "INSERT INTO customer (name, contact, address, dob, aadhar_number, vehicle_type, model, article_no, aadhar_img, customer_img, customer_id, mobile_number, total_emi, total_amt, down_payment, principle_amt, rate_interest) VALUES ('$name', '$contact', '$address', '$dob', '$aadhar', '$vehicle', '$model', '$article_no', '$aadhar_img', '$cust_img', NULL, '$mobile', '$total_emi', '$total_amt', '$down_pay', '$pr_amt', '$rate_of_int')";  

if ($conn->query($query) == TRUE) {
    echo "Customer ".$name."has been inserted successfully";
     if (move_uploaded_file($tempname1, $folder1))  {
            $msg = "Aadhar Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
      if (move_uploaded_file($tempname2, $folder2))  {
            $msg = "Customer Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
     
	echo "<script>window.location = https://123lms.000webhostapp.com/customer.html'</script>";
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "Press back to try again!";
}
 ?>
