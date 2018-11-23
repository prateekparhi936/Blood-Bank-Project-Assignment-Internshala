<?php 
session_start();

include 'Connect_to_Database.php';

    $query=" ";
    $hospital_name=" ";
    if($_SESSION['userrole']==="RECEIVER")
    {
      $query="SELECT * FROM available_sample"; 
    }

    if($_SESSION['userrole']==="HOSPITAL")
    {
      $hospital_name=$_SESSION['hospital_name'];
      $query="SELECT * FROM available_sample WHERE hospital_name='$hospital_name'";
    }
    else
    {
      $query="SELECT * FROM available_sample"; 
    }



?>

<?php include 'header_file.php'; ?>
<?php include 'Custom_Menu_File.php'; ?>
<?php include 'sidebar_file.php';  ?>
  
        <?php
          if ($stmt = mysqli_prepare($link, $query)) 
          {
            /* execute statement */
            mysqli_stmt_execute($stmt);
            /* bind result variables */
            mysqli_stmt_bind_result($stmt,$id,$blood_group,$hospital_name);
            /* fetch values */
          ?>


        <?php
        if ($_SESSION['userrole']===" ") {
                  ?>
                  <h2>Guest!! Kindly login before posting a request of your blood sample</h2>
                <?php
                }
        ?>
        <h1>Available Sample</h1>
        <form>
          <table>
            <p>
              <tr>
                <td>Sample_Id</td>
                <td>Blood_Group</td>
                <td>Hospital_Name</td>
                <?php 
                if ($_SESSION['userrole']==="HOSPITAL") {
                  ?>
                <?php
                }
                else{
                ?>
                <td>Operation</td>
                <?php
                }
                ?>
              </tr>
        
            <?php  
              while(mysqli_stmt_fetch($stmt)) 
              { 
              ?>
                <tr>
                      <td><?php  echo $id;  ?></td>
                      <td><?php  echo $blood_group;  ?></td>
                      <td><?php  echo $hospital_name;  ?></td>
                    <?php 
                    if($_SESSION['userrole']==="HOSPITAL")
                    {
                    ?>
                    <?php
                    } 
                    if($_SESSION['userrole']==="RECEIVER")
                     {
                        if($_SESSION['receiver_blood_group']===$blood_group)
                        {
                        ?>
                         <td>
                          <a href="Request_Sample.php?Blood_Sample_Id=<?php echo $id; ?>">Request_Sample</a>
                         </td>
                        <?php 
                        }
                        else
                        {
                        ?>
                        <?php
                        }
                    }  
                    if($_SESSION['userrole']===" ")
                     {
                    ?>
                      <td><a href="index.php">Request_Sample</a></td>
                    <?php 
                     }
                     ?> 
                </tr>
              <?php
              } 
        ?>
            </p>
          </table>
      </form>
      <?php 
      mysqli_stmt_close($stmt);
      } 
    ?>
      
<?php include 'footer_file.php'; ?>