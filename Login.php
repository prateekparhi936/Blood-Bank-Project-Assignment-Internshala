<?php
session_start();
if (isset($_REQUEST['login_submit'])) 
 {
		include 'Connect_to_Database.php';

		$useremail=$_POST['login_email'];
	 	$userpassword=$_POST['login_password'];
	 	$userrole="";
		$_SESSION["useremail"]=" ";
		$_SESSION['hospital_name']=" ";
		$query = "SELECT User_Email, User_Role FROM bb_user_info WHERE User_Email='$useremail' and User_Password=
		'$userpassword'";
		if ($stmt = mysqli_prepare($link, $query)) 
		{
		    /* execute statement */
		    mysqli_stmt_execute($stmt);
		    /* bind result variables */
		    mysqli_stmt_bind_result($stmt, $email, $role);
		    /* fetch values */
		    while (mysqli_stmt_fetch($stmt)) {
		    	$userrole=$role;
		        $_SESSION['userrole']=$userrole;
	   			$_SESSION['useremail']=$email;
		    }
			if($_SESSION['userrole']=="HOSPITAL")
			{
						$query1="SELECT hospital_name FROM hospital_table WHERE User_Email='$useremail'";
						if ($stmt1 = mysqli_prepare($link, $query1)) 
						{
						    /* execute statement */
						    mysqli_stmt_execute($stmt1);
						    /* bind result variables */
						     mysqli_stmt_bind_result($stmt1, $hospital_name);
						     while (mysqli_stmt_fetch($stmt1)) {
								       $_SESSION['hospital_name']=$hospital_name;
			    			 }
    			    	    mysqli_stmt_close($stmt1);
	    					header("Location:index.php");
						}
			}
			if($_SESSION['userrole']=="RECEIVER")
			{
					$query2="SELECT BG FROM receiver_table WHERE User_Email='$useremail'";
						if ($stmt2 = mysqli_prepare($link, $query2)) 
						{
						    /* execute statement */
						    mysqli_stmt_execute($stmt2);
						    /* bind result variables */
						    mysqli_stmt_bind_result($stmt2, $receiver_blood_group);
						    while (mysqli_stmt_fetch($stmt2)) {
								       $_SESSION['receiver_blood_group']=$receiver_blood_group;
			    			 }
    			    	    mysqli_stmt_close($stmt2);
	    					header("Location:index.php");
						}
			}
					    /* close statement */
			mysqli_stmt_close($stmt);
		}
			
			echo "<script type='text/javascript'>alert('Incorrect email ID or Password,Try Again!!')</script>";
			header("refresh:0,url=index.php");	

 }

else
 {
 	echo "<script type='text/javascript'>alert('form not submitted error!!')</script>";
  	#echo "form not submitted error!!";
  	header("refresh:2,url=index.php");
 }
?>