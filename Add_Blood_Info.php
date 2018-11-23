<?php
	session_start();

if(isset($_REQUEST['add_info_submit'])) 
	{
			$new_info=$_POST['add_info'];
			if ($new_info===" ") {
				echo "<script type='text/javascript'>alert('No Blood type selected!')</script>";
                header( "refresh:0.5; url=index.php" );
			}
			else
			{
				$hospital_name=$_SESSION['hospital_name'];
				
				include 'Connect_to_Database.php';
			    
			    $query=" ";
			    $flag=0;
				
				$query="SELECT blood_group FROM available_sample WHERE hospital_name='$hospital_name'";
				
				if ($stmt = mysqli_prepare($link, $query)) 
			    {
			        mysqli_stmt_execute($stmt);
			        mysqli_stmt_bind_result($stmt,$blood_group);
			        while (mysqli_stmt_fetch($stmt))
			            {
			            	if ($new_info==$blood_group) 
			            	{
			            		$flag=1;
			            		echo "<script type='text/javascript'>alert('Already in the database!')</script>";
	                            header( "refresh:0; url=index.php" );
			            	}
			            }
			            mysqli_stmt_close($stmt);
			    }
			    if($flag==0)
			    {
				   $query1="INSERT into available_sample (blood_group,hospital_name) values('$new_info','$hospital_name')";
				    if($stmt1 = mysqli_prepare($link,$query1))
				    {
				    	    if(mysqli_stmt_execute($stmt1))
				    	    {
				    	    	echo "<script type='text/javascript'>alert('New Sample Added!!')</script>";
	                            header( "refresh:0; url=index.php" );
				    	    }
				    }
			   }
		   }

}

?>