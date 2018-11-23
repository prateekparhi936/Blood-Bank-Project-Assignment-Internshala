 <?php

           if($_SESSION['userrole']==" ")
           {
 ?>
                <li class="selected"><a href="index.php">Home</a></li>
                <li class="selected"><a href="Hospital_Signup.php">Hospital Signup</a></li>
                <li class="selected"><a href="Receiver_Signup.php">Receiver Signup</a></li>
          <?php 
           }
           
           if($_SESSION['userrole']=="HOSPITAL")
           {
          ?>
               <li class="selected"><?php echo "<a href='index.php'> Hi ".$_SESSION['useremail']." !"; ?> </a></li>
               <li class="selected"><a href="Logout.php">Logout</a></li>
           <?php
          }
          if($_SESSION['userrole']=="RECEIVER")
           {
          ?>
               <li class="selected"><?php echo "<a href='index.php'> Hi ".$_SESSION['useremail']." !"; ?> </a></li>
               <li class="selected"><a href="Logout.php">Logout</a></li>
           <?php
          }
          ?>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
      <div id="banner"></div>
    <div id="sidebar_container">
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
          <ul>
            <li><a href="Available_Sample.php">Available Sample</a></li>  