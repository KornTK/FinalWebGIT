<section id="container" >
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <a href="#" class="logo" style="color: #424a5d;"><b>PSU-ATK Dashboard</b></a>
            <div class="nav notify-row" id="top_menu">
               
                         
                   
                </ul>
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li>
                        <a class="logout" href="logout.php">ออกจากระบบ <i class="fa fa-sign-out"></i></a>
                        
                    </li>
            	</ul>
            </div>
        </header>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="#"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $_SESSION['login'];?></h5>
              	  	
                  <li class="mt">
                      <a href="change-password.php">
                          <i class="fa fa-solid fa-key"></i>
                          <span>เปลี่ยนรหัสผ่าน</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="manage-users.php" >
                          <i class="fa fa-users"></i>
                          <span>จัดการผู้ใช้งาน</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="report.php" >
                      <i class="fa fa-solid fa-flag"></i>
                          <span>รายงาน</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="show_atk_roud.php" >
                      <i class="fa fa-regular fa-calendar"></i>
                          <span>จัดการวันตรวจ ATK</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="show_atk_result.php" >
                      <i class="fa fa-solid fa-check"></i>
                          <span>ผลตรวจ ATK</span>
                      </a>
                  </li>
              
                 
              </ul>
          </div>
      </aside>
  </section>