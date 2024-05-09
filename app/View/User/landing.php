<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trung tâm Tiếng Anh</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Custom CSS -->
  <style>
    #banner {
      background-color: #f8f9fa;
    }
    #courses {
      background-color: #ffffff;
    }
    footer {
      background-color: #343a40;
    }
    footer p {
      margin-bottom: 0;
    }
  </style>
</head>
<body>

<!-- Navbar Section -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">SK English</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">

        <li class="nav-item active">
          <a class="nav-link" style='cursor: pointer'>Trang chủ</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" style='cursor: pointer' data-toggle="modal" data-target="#loginModal">Đăng nhập</a>
        </li>
        <?php include './app/View/User/login.php'; ?>
        <li class="nav-item">
          <a class="nav-link" style='cursor: pointer' data-toggle="modal" data-target="#registerModal">Đăng ký</a>
        </li>
        <?php include './app/View/User/register.php'; ?>

      </ul>
    </div>
  </div>
</nav>

<!-- Banner Section -->
<section id="banner" class="py-5 text-center">
    <div class="container">
      <h1 class="display-4">Chào mừng bạn đến với SK English</h1>
      <p class="lead">Chúng tôi cung cấp các khóa học tiếng anh chất lượng cao</p>
    </div>
  </section>
  
  <!-- Course Section -->
  <section id="courses" class="py-5">
    <div class="container">
      <h2 class="text-center mb-4">Các khóa học của chúng tôi</h2>
      <!-- table courses (class row)-->
      <div class="row">
        <!-- PHP Loop to display courses -->
        <div class="col-lg-4 mb-4">
            <div class="card">
                <img src="https://luanvan24.com/wp-content/uploads/2021/02/hinh-anh-de-tai-nghien-cuu-khoa-hoc-mon-tieng-anh-2.jpg" class="card-img-top" alt="Tiếng anh cơ bản">
                <div class="card-body">
                    <h5 class="card-title">Tiếng anh cơ bản</h5>
                    <p class="card-text">Khóa học giúp bạn cải thiện trình độ tiếng anh của mình một cách nhanh chóng bắt đầu từ con số 0</p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">Xem chi tiết</button>
                </div>
            </div>
        </div>

            <div class="col-lg-4 mb-4">
            <div class="card">
                <img src="https://luanvan24.com/wp-content/uploads/2021/02/hinh-anh-de-tai-nghien-cuu-khoa-hoc-mon-tieng-anh-2.jpg" class="card-img-top" alt="Tiếng anh cơ bản">
                <div class="card-body">
                    <h5 class="card-title">Tiếng anh cơ bản</h5>
                    <p class="card-text">Khóa học giúp bạn cải thiện trình độ tiếng anh của mình một cách nhanh chóng bắt đầu từ con số 0</p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">Xem chi tiết</button>
                </div>
            </div>
        </div>

            <div class="col-lg-4 mb-4">
            <div class="card">
                <img src="https://luanvan24.com/wp-content/uploads/2021/02/hinh-anh-de-tai-nghien-cuu-khoa-hoc-mon-tieng-anh-2.jpg" class="card-img-top" alt="Tiếng anh cơ bản">
                <div class="card-body">
                    <h5 class="card-title">Tiếng anh cơ bản</h5>
                    <p class="card-text">Khóa học giúp bạn cải thiện trình độ tiếng anh của mình một cách nhanh chóng bắt đầu từ con số 0</p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">Xem chi tiết</button>
                </div>
            </div>
        </div>

      </div>
      <!-- end table courses (class row)-->
    </div>
  </section>
  
  <!-- Footer -->
  <footer class="bg-dark text-white py-4">
    <div class="container text-center">
      <p>&copy; 2024 Trung tâm ngoại ngữ - Sk English. All rights reserved.</p>
    </div>
  </footer>
  

<!-- Bootstrap JS and jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
