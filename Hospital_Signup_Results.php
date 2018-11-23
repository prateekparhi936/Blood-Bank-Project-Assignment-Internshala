<?php
session_start();

    if(isset($_REQUEST['submit_hospital_signup']))
    {
     
               $conn= mysql_connect('localhost', 'root', '12345') or die(mysqli_connect_error());
               mysql_select_db('bloodbank_database') or die(mysql_error());
               $hospital_email     = $_POST["hospital_email"];
               $hospital_name      = $_POST["hospital_name"];
               $hospital_contact   = $_POST["hospital_contact"];
               $hospital_address   = $_POST["hospital_address"];
               $hospital_password  = $_POST["hospital_password"];
               
               $Query1=mysql_query("SELECT * FROM bb_user_info WHERE User_Email='$hospital_email'");
               $rows=mysql_fetch_array($Query1);
                if(sizeof($rows)==1)
                 {
                   $Query2=mysql_query("INSERT INTO hospital_table (User_Email,Hospital_Name,Contact,Address) 
                              VALUES('$hospital_email','$hospital_name',$hospital_contact,'$hospital_address')");
                            if($Query2)
                            {    

                              $Query3=mysql_query("INSERT INTO bb_user_info(User_Email, User_Password, User_Role) VALUES 
                                ('$hospital_email','$hospital_password','HOSPITAL') ") or die(mysql_error());

                                      if($Query3)
                                        {
                                           echo "<script type='text/javascript'>alert('Successfully Registered!!')</script>";
                                           header( "refresh:0; url=index.php" );
                                        }
                                        else{
                                          echo "<script type='text/javascript'>alert('Failed Registration!!')</script>";
                                          header("refresh:0,url=Hospital_Signup.php"); 
                                        }

                            }
                            else{
                              echo "<script type='text/javascript'>alert('Incomplete or Incorrect Form Fields,Please Fill it again!!')</script>";

                               header("refresh:0,url=Hospital_Signup.php");  
                            }
                   }
                   else
                   {
                       echo "<script type='text/javascript'>alert('Email id exists. Kindly login or Enter unique id which has not been used')</script>";
                       header( "refresh:0; url=Hospital_Signup.php" );
                   }
          
    }
?>