<?php

$server="localhost";
$uname="id6425085_root1234";
$password="root1234";
$dbname="id6425085_contact";


$team_name = $_POST['team_name'];
$m1=$_POST['m1'];
$sem1= $_POST['sem1'];
$branch1= $_POST['branch1'];
$contact1= $_POST['contact1'];

$m2=$_POST['m2'];
$sem2= $_POST['sem2'];
$branch2 = $_POST['branch2'];
$contact2 = $_POST['contact2'];

$m3=$_POST['m3'];
$sem3= $_POST['sem3'];
$branch3= $_POST['branch3'];
$contact3= $_POST['contact3'];

$m4=$_POST['m4'];
$sem4= $_POST['sem4'];
$branch4= $_POST['branch4'];
$contact4= $_POST['contact4'];

$email= $_POST['email'];
$theme= $_POST['theme'];	
$ps= $_POST['ps'];

$register=mysqli_connect($server,$uname,$password,$dbname) or die ("Database connection failed: " . mysql_error());


$sql = "select token from techathlon order by token desc";
$result=mysqli_query($register,$sql) or die(mysql_error());
$row=mysqli_fetch_array($result);
if($row==NULL)
 $id=100000;
else 
 {
     $id = $row['token'];
     $id++;
 }

// echo $id;
$INSERT= "INSERT INTO techathlon VALUES ( '$id' , '$team_name', '$m1', '$sem1', '$branch1', '$contact1', '$m2', '$sem2', '$branch2', '$contact2', '$m3', '$sem3', '$branch3', '$contact3', '$m4', '$sem4', '$branch4', '$contact4', '$email', '$theme', '$ps')";

    				if(mysqli_query($register,$INSERT))
					    {
					        echo  "Thank you for registering! \nYour token id is $id \nPlease preserve this number for future reference";
					        $to = $email;
                            $subject = "Techathlon Registration";
                            $txt = "Hello $team_name , \nThis is a mail confirming your registration for the hackathon on ML and Blockchain conducted by Curl Analytics and RVCC. Your token number is $id .\nThe Idea Phase is open until 10-OCT-18 , follow guidelines mentioned on codingclub.rvce.in and send in your idea abiding to the specified format to ideas@curlanalytics.com. \n Wishing you all the best.\n - Abhiram Prasad - Organizer, Techathlon";
                            $headers = "From: codingclub@rvce.edu.in";

                            mail($to,$subject,$txt,$headers);
                            
					    }
				    else
					    echo die(mysqli_error($register)." Already Registered");
					  
					
?>