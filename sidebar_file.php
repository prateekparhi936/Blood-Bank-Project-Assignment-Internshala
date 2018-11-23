        </ul>
          </div>
      <div class="sidebar_base"></div>
        </div>
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
            <ul>
              
              <?php
              
              if($_SESSION['userrole']==="HOSPITAL")
              {
              
              ?>
               
                 <li><a href="View_Requests.php">View Requests</a></li>
              
              <?php
              
              }
              
              ?>

            </ul>
          </div>


      <div class="sidebar_base"></div>
        </div>
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
          <?php
            if($_SESSION['userrole']=="HOSPITAL")
            {
          ?>
            <h3>Add_Blood_Info</h3>
            <form method="post" name="Add_Blood_Info" action="Add_Blood_Info.php">
              <select id="id" name="add_info">
                    <option value=" ">select Blood Group</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="B+">B+</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
              </select>

              <input type="submit" name="add_info_submit" value="Add">
            </form>
          <?php 
            }
          ?>
       </div>
       <div class="sidebar_base"></div>
        </div>
      </div>
      <div id="content">