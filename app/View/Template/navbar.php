<!-- Navbar Section -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top"> <!-- Thêm class 'fixed-top' để navbar cố định ở đầu trang -->
  <div class="container">
    <a class="navbar-brand" href="./home">SK English</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Thanh tìm kiếm -->
    <form class="form-inline my-2 my-lg-0 mx-auto">
      <div class="input-group">
        <input type="text" class="form-control rounded-pill border-0 flex-grow-1" style="width: 30em;" placeholder="Tìm kiếm" aria-label="Search" aria-describedby="search-addon">
        <div class="input-group-append">
          <button class="btn btn-outline-light rounded-pill" type="submit" id="search-addon">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>
    <!-- Nút Menu -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <!-- Tên người dùng -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user"></i> Nguyễn Văn Tùng
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Hồ Sơ</a>
            <a class="dropdown-item" href="#">Cài đặt chung</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="./">Đăng xuất</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>