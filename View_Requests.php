<?php
session_start();
?>
<?php include 'header_file.php'; ?>
<?php include 'Custom_Menu_file.php'; ?>          
<?php include 'sidebar_file.php';  ?>
<?php 
include 'Connect_to_Database.php';
$hospital_name=$_SESSION['hospital_name'];
$query1="SELECT req.request_id,req.user_email,sample.blood_group 
	   FROM view_requests as req , available_sample as sample 
	   WHERE req.request_id=sample.id AND sample.hospital_name='$hospital_name'";

?>

        <h1>Blood Sample Requests For <?php echo $hospital_name;?></h1>


<?php

if ($stmt1 = mysqli_prepare($link, $query1)) 
	{
						
						    mysqli_stmt_execute($stmt1);
						 
						     mysqli_stmt_bind_result($stmt1, $request_id,$user_email,$blood_group);

					     ?>
						    <table>
						    <p>
						     <tr>
						     	<td>Request Id</td>
						     	<td>Requesters email id</td>
						     	<td>Request Blood Type</td>
						     </tr>
						 
						<?php
							     while (mysqli_stmt_fetch($stmt1)) {
						?>
							 
							     		<tr>
							     			<td><?php echo $request_id; ?></td>
							     			<td><?php echo $user_email; ?></td>
							     			<td><?php echo $blood_group; ?></td>
							     		</tr>

					    <?php
							     }
					    ?>
					    	 </p>
						   </table>
						   <?php
		mysqli_stmt_close($stmt1);

}

else
{
	echo "error in view_requests";
	#header("refresh:2,url=index.php");
}

?>

<?php include 'footer_file.php'; ?>