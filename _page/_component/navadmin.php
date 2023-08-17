 <!-- Sidebar -->
 <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
     <div class="position-sticky">
         <div class="list-group list-group-flush mx-3 mt-4">
             <a href="index.php?page=homepage" class="list-group-item list-group-item-action py-2 ripple"
                 aria-current="true">
                 <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>หน้าหลัก</span>
             </a>
             <a href="index.php?page=CreateFood" class="list-group-item list-group-item-action py-2 ripple ">
                 <i class="fas fa-chart-area fa-fw me-3"></i><span>เพิ่มเมนูอาหาร</span>
             </a>
             <a href="index.php?page=EditFood" class="list-group-item list-group-item-action py-2 ripple"><i
                     class="fas fa-lock fa-fw me-3"></i><span>จัดการเมนูอาหาร</span></a>
             <a href="index.php?page=History" class="list-group-item list-group-item-action py-2 ripple"><i
                     class="fas fa-chart-line fa-fw me-3"></i><span>ประวัติการสั่งซื้อทั้งหมด</span></a>
         </div>
     </div>
 </nav>
 <!-- Sidebar -->

 <!-- Navbar -->
 <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
     <!-- Container wrapper -->
     <div class="container-fluid">
         <!-- Toggle button -->
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
             aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
             <i class="fas fa-bars"></i>
         </button>

         <!-- Brand -->
         <a class="navbar-brand" href="#">
             <img src="./../../bs/icon/logo.png" height="25" alt="MDB Logo" loading="lazy" />
             Restaurant
         </a>

         <!-- Right links -->
         <ul class="navbar-nav ms-auto d-flex flex-row">
             <!-- Notification dropdown -->

             <!-- Avatar -->
             <li class="nav-item dropdown">
                 <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" href="#"
                     id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Settings
                 </a>
                 <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                     <li>
                         <a class="dropdown-item" href="#">My profile</a>
                     </li>
                     <li>
                         <a class="dropdown-item" href="./../../_system/logout.php">Logout</a>
                     </li>
                 </ul>
             </li>
         </ul>
     </div>
     <!-- Container wrapper -->
 </nav>
 <!-- Navbar -->