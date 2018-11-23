<?php 
session_start(); 
if(isset($_SESSION['userrole'])===false){
  $_SESSION['userrole']=" ";
  $_SESSION['useremail']=" ";
  $_SESSION['hospital_name']=" ";
}
?>


<?php include 'header_file.php'; ?>
<?php include 'Custom_Menu_file.php'; ?>
<?php include('sidebar_file.php'); ?>

<?php 
        
    if($_SESSION['userrole']==" ")
        
        {

?>
          <h1>Sign In</h1>
             <form method="post" name="login_form" action="Login.php">
                <table>
                <p>
                  <tr><td>email</td><td><input type="text" name="login_email" value=""/></td></tr>
                  <tr><td>Password</td><td><input type="password" name="login_password" value=""/></td></tr>
                  <tr><td></td><td><input type="submit" name="login_submit" value="Sign In"/></td></tr>
                </p>
                </table>
            </form>
        <?php 
         } 

         else
         {
         
         ?>
            <h1>Welcome!!</h1>

         <?php

         }
         
include 'footer_file.php';

 ?>