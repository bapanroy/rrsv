<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">Dashboard</li>
      <!--<li ><a href=""><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>-->
      <li class="treeview active">
        <a href="#">
          <i class="fa fa-hand-o-right"></i>
          <span>Admin</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <?php

          if (isset($_SESSION['role']) && $_SESSION['role'] == 'teacher') {

            ?>
            <li><a href="homework_exam.php"><i class="fa fa-circle-o"></i> Class Work</a></li>
            <?php
          } elseif (isset($_SESSION['role']) && $_SESSION['role'] == 'student') {

            ?>
            <li><a href="homework_exam_list.php"><i class="fa fa-circle-o"></i> Home Work</a></li>
            <?php
          } else {
            ?>
            <li><a href="#"><i class="fa fa-circle-o"></i> Dashboard</a></li>
            <?php
          }
          ?>
          <li><a href="#"><i class="fa fa-circle-o"></i>Add Exam<span class="sr-only">(current)</span></a>
          </li>
          <li class="active"><a href="user.php?q=1"><i class="fa fa-circle-o"></i>Students</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i>Teacher</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i>Leaderboard</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i>feedback</a></li>
          <li><a href="#" class="active"><i class="fa fa-circle-o"></i>Exam Status</a></li>


          <li><a href="#" id="add_button" class="active">Add Student</a></li>

        </ul>
      </li>

      <li class="treeview active">
        <a href="#">
          <i class="fa fa-envelope-o"></i>
          <span>Exam Management</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i>#</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i>#</a></li>




        </ul>
      </li>

      <li class="treeview ">
        <a href="#">
          <i class="fa fa-file-code-o"></i>
          <span>Result</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> Result</a></li>

        </ul>
      </li>
      <li class="treeview ">
        <a href="#">
          <i class="fa fa-wrench"></i>
          <span>Personal Settings</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-key"></i> Change Password</a></li>
          <li><a href="#"><i class="fa fa-at"></i> Update Email</a></li>

        </ul>
      </li>


    </ul>
  </section>
  <!-- /.sidebar -->
</aside>