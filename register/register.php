<?php 
$server="localhost";
$uname="id6425085_root1234";
$password="root1234";
$dbname="id6425085_contact";

$name=$_POST['name'];
$email=$_POST['email'];
$branch=$_POST['branch'];
$phone=$_POST['phone'];
$year=$_POST['year'];

$register=mysqli_connect($server,$uname,$password,$dbname) or die ("Database connection failed: " . mysql_error());

mysqli_select_db($register,$dbname) or die(mysql_error());

$sql = "select id from registration order by id desc";
$result=mysqli_query($register,$sql) or die(mysql_error());
$row=mysqli_fetch_array($result);
if($row==NULL)
 $id=100000;
else 
 {
     $id = $row['id'];
     $id++;
 }
 

$INSERT="INSERT into registration VALUES ('$id','$name','$email','$branch','$phone','$year')";
	
    				if(mysqli_query($register,$INSERT))
					    {
					        echo  "Thank you for registering! \nYour token id is $id \nPlease preserve this number for future reference";
					        $to = $email;
                            $subject = "R V Coding Club Registration";
                            $txt = "Hello $name , \nThis is a mail confirming your registration for the hackathon on ML and Blockchain conducted by Curl Analytics and RVCC. Your token number is $id \n
                            The event is scheduled on <Enter date time etc> Wishing you all the best.\n - Abhiram Natarajan (Technical Head, Coding Club, RVCC)";
                            $headers = "From: codingclub@rvce.edu.in";

                            mail($to,$subject,$txt,$headers);
                            
					    }
				    else
					    echo "YOUR RESPONSE HAS BEEN RECORDED ALREADY!!!";
					  
					
mysqli_close($contact);
?>