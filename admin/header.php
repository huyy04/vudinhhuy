<!DOCTYPE html>
<html lang="en">

<head>
  <title>Danh sách đơn hàng | Quản trị Admin</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="../view/css/main.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  
  <!-- or -->
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script> -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

  <style>
      .btn-submit:hover {
          opacity: 0.7;
      }
  </style>
</head>

<body onload="time()" style="background-color: white;" class="app sidebar-mini rtl">
  <!-- Navbar-->
  <header class="app-header">
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
      aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">


      <!-- User Menu-->
      <li><a class="app-nav__item" href="../index.php"><i class='bx bx-log-out bx-rotate-180'></i> </a>

      </li>
    </ul>
  </header>
  <!-- Sidebar menu-->
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="/images/hay.jpg" width="50px"
        alt="User Image">
      <div>
        <p class="app-sidebar__user-name"><b>Admin</b></p>
        <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
      </div>
    </div>
    <hr>
    <ul class="app-menu">
    <li><a class="app-menu__item" href="../index.php"><i class='app-menu__icon bx bx-home-alt'></i><span
            class="app-menu__label">HOME</span></a></li>
      <li><a class="app-menu__item " href="index.php?act=list-user"><i class='app-menu__icon bx bx-user'></i>
          <span class="app-menu__label">Quản lý người dùng</span></a></li>
      <li><a class="app-menu__item" href="index.php?act=list-comment"><i class='app-menu__icon bx bx-comment'></i><span
            class="app-menu__label">Quản lý bình luận</span></a></li>
      <li><a class="app-menu__item" href="index.php?act=listsp"><i class='app-menu__icon bx bxs-t-shirt'></i>
          <span class="app-menu__label">Quản lý sản phẩm</span></a></li>
      <li><a class="app-menu__item" href="index.php?act=listdm"><i class='app-menu__icon bx bx-folder-open'></i>
          <span class="app-menu__label">Quản lý danh mục</span></a></li>
      <li><a class="app-menu__item" href="index.php?act=list-donhang"><i class='app-menu__icon bx bx-task'></i><span
            class="app-menu__label">Quản lý đơn hàng</span></a></li>


    </ul>

    </ul>
  </aside>