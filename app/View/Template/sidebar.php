<?php
$current_page = $_SERVER['REQUEST_URI'];
$current_page = parse_url($current_page, PHP_URL_PATH);
$current_page = explode('/', $current_page);
$current_page = array_filter($current_page); // Loại bỏ các phần tử rỗng
$current_page = end($current_page);
?>
<!-- Css Sidebar -->
<link rel="stylesheet" href=".\public\css\sidebar.css">
<link rel="stylesheet" href="..\public\css\sidebar.css">
<!-- Sidebar -->
<div class="sidebar">
  <ul class="navbar-nav">
    <li class="nav-item <?php if($current_page == 'home') echo 'active';?>">
      <a class="nav-link " href="/QuanLiTrungTamTA/home"><i class="fas fa-home"></i> Trang chủ</a>
    </li>
    <li class="nav-item <?php if($current_page == 'student') echo 'active';?>">
      <a class="nav-link " href="/QuanLiTrungTamTA/student"><i class="fas fa-user"></i> Quản lí học viên</a>
    </li> 
    <li class="nav-item <?php if($current_page == 'teacher') echo 'active';?>">
      <a class="nav-link " href="/QuanLiTrungTamTA/teacher"><i class="fas fa-chalkboard-teacher"></i> Quản lí giáo viên</a>
    </li>
    <li class="nav-item <?php if($current_page == 'course') echo 'active';?>">
      <a class="nav-link " href="/QuanLiTrungTamTA/course"><i class="fas fa-book"></i> Quản lí khóa học</a>
    </li>
    <li class="nav-item <?php if($current_page == 'payment') echo 'active';?>">
      <a class="nav-link " href="/QuanLiTrungTamTA/payment"><i class="fas fa-money-bill-wave"></i> Quản lí thu chi</a>
    </li>
    <li class="nav-item <?php if($current_page == 'achievement') echo 'active';?>">
      <a class="nav-link " href="/QuanLiTrungTamTA/achievement"><i class="fas fa-graduation-cap"></i> Quản lí kết quả học tập</a>
    </li>
  </ul>
</div>
