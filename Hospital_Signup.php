<?php session_start(); ?>
<?php include 'header_file.php'; ?>
<?php include 'Custom_Menu_file.php'; ?>
<?php include 'sidebar_file.php';  ?>

        <h1> Sign Up Form For Hospitals</h1>
            <form method="post" name="hospital_signup" action="Hospital_Signup_Results.php">
              <table>
              <p>
                <tr><td>hospital_email</td><td><input type="text" name="hospital_email" value=""/></td></tr>
                <tr><td>hospital_name</td><td><input type="text" name="hospital_name" value=""/></td></tr>
                <tr><td>hospital_contact</td><td><input type="numeric" name="hospital_contact" value=""/></td></tr>
                <tr><td>hospital_address</td><td><input type="text" name="hospital_address" value=""/></td></tr>
                <tr><td>Set hospital_Password</td><td><input type="password" name="hospital_password" value=""/></td></tr>
                <tr><td></td><td><input type="submit" name="submit_hospital_signup" value="Finish"/></td></tr>
              </p>
              </table>
            </form>

<?php include 'footer_file.php'; ?>