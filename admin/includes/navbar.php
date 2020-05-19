   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="adminmainpage.php">
       <div class="sidebar-brand-icon rotate-n-15">
         <i class="fas fa-laugh-wink"></i>
       </div>
       <div class="sidebar-brand-text mx-3">ADMIN</div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <li class="nav-item mt-4">
       <a class="nav-link" href="generateTender.php">
         <i class="fas fa-fw fa-chart-area"></i>
         <span>GENERATE TENDER</span></a>
     </li>

     <li class="nav-item mt-2">
       <a class="nav-link" href="viewTenders.php">
         <i class="fas fa-fw fa-chart-area"></i>
         <span>VIEW TENDER</span></a>
     </li>

     <li class="nav-item mt-2">
       <a class="nav-link" href="viewBiddings.php">
         <i class="fas fa-fw fa-chart-area"></i>
         <span>BIDDINGS</span></a>
     </li>

     <li class="nav-item mt-2">
       <a class="nav-link" href="viewConfirmedBiddings.php">
         <i class="fas fa-fw fa-chart-area"></i>
         <span>CONFIRM BIDDINGS</span></a>
     </li>

     <li class="nav-item mt-2">
       <a class="nav-link" href="includes/logout.php" data-toggle="modal" data-target="#logoutModal">
         <i class="fas fa-fw fa-chart-area"></i>
         <span>LOGOUT</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
       <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

   </ul>
   <!-- End of Sidebar -->

   <!-- Content Wrapper -->
   <div id="content-wrapper" class="d-flex flex-column">

     <!-- Main Content -->
     <div id="content">

       <!-- Topbar -->
       <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

         <!-- Topbar Navbar -->
         <ul class="navbar-nav ml-auto">

           <!-- Nav Item - User Information -->
           <li class="nav-item dropdown no-arrow">
             <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <span class="mr-2 d-none d-lg-inline text-gray-600 small">

                 ADMIN

               </span>
               <img class="img-profile rounded-circle" src="img/login_icon.png">
             </a>
             <!--Topbar-->
             <!-- Dropdown - User Information -->
             <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
               <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                 <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                 Logout
               </a>
             </div>
           </li>

         </ul>

       </nav>
       <!-- End of Topbar -->