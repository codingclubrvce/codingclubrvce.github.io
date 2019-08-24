<?php 

$server="localhost";
$uname="id6425085_root1234";
$password="root1234";
$dbname="id6425085_contact";

$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$message=$_POST['message'];
$date=date('Y-m-d');

$contact=mysqli_connect($server,$uname,$password,$dbname) or die ("Database connection failed: " . mysql_error());

mysqli_select_db($contact,$dbname) or die(mysql_error());

$INSERT="INSERT into contact (Date,Name,Email,Phone,Message) VALUES ('$date','$name','$email',$phone,'$message')";
	
    				if(mysqli_query($contact,$INSERT))
    				{
    				    $to = "abhiram.natarajan@gmail.com";
                        $subject = "Coding Club query from " ;
                        $txt = $message;
                        $headers = "From: test@example.com";
                        
                        mail($to,$subject,$txt,$headers);
                        echo "Your request has been submitted successfully.";
    				}
				else
					 echo "FEEDBACK/QUERY NOT SUBMITTED";

mysqli_close($contact);
?>