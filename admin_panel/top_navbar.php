 <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            
         <?php
            $name='';
            $image='';
          if (isset($_SESSION['role']) && $_SESSION['role'] == 'teacher') {
             $name=$teacher['full_name'] ?? '';
             $image='../../teacher_image/' . htmlspecialchars($teacher['image']) ?? '';
           
          } elseif (isset($_SESSION['role']) && $_SESSION['role'] == 'student') {
             $name=$teacher['scl_name'] ?? '';
             $image='../../student_reg_image/' . htmlspecialchars($teacher['image']) ?? '';
            
          } else {
            $name='Admin';
            $image='';
          }
          ?>
                 
          <!-- User Account: style can be found in dropdown.less -->
           <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
             <img src="<?php
    if (!empty($image)) {
         echo $image;
    } else {
        echo '../../landing/images/default.jpg'; // fallback image
    }
?>" class="img-circle user-image" alt="User Image">
			  <span class="pull-right top title1" ></span> <span class="log log1" style="color:lightyellow"><?php echo htmlspecialchars($name ?? ''); ?></span>  
            </a>
			<ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php
    if (!empty($image)) {
        echo $image;
    } else {
        echo '../../landing/images/default.jpg'; // fallback image
    }
?>" class="img-circle user-image" alt="User Image">
                <p>
                Welcome  <small>
                  
                
                <?php echo htmlspecialchars($name?? ''); ?></small>                </p>
              </li>
              <!-- Menu Body -->
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../logout.php" class="btn btn-default btn-flat">Logout</a>
                </div>
              </li>
            </ul>
			
            
          </li>
         
        </ul>
      </div>
    </nav>