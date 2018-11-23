<?php

session_start();
$requested_sample_id=htmlspecialchars($_GET['Blood_Sample_Id']);
$useremail=$_SESSION['useremail'];

include 'Connect_to_Database.php';

	$query=" ";
	$query1=" ";
	$query="SELECT * FROM view_requests WHERE (request_id=$requested_sample_id and user_email='$useremail')";
	echo $requested_sample_id;
    
    if ($result=mysqli_query($link, $query)) 
		    {

		    	if (mysqli_fetch_row($result)==0) 
		    	{
		    	$query1="INSERT into view_requests(request_id,user_email) values ($requested_sample_id,'$useremail')";
				    if (mysqli_query($link, $query1)) 
					 {
						        echo "inserted successfully";
						        header("refresh:2,url=Available_Sample.php");
			   	     }
		    	}
		    	else
		    	{
		    		echo "duplicate request error!!";
		    		header("refresh:2,url=Available_Sample.php");
		    	}
			}

?>