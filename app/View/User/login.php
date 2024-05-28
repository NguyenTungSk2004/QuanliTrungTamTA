<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="loginModalLabel">Đăng nhập</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              
          <form id="loginForm" action="/QuanLiTrungTamTA/login" method="POST">

                <div class="form-group">
                  <label for="username">Tên đăng nhập:</label>
                  <input type="text" class="form-control" id="username" name="username" required>
                </div>

                <div class="form-group">
                  <label for="password">Mật khẩu:</label>
                  <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <div class="form-group">
                  <a href="#" class="float-right">Quên mật khẩu?</a>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>

                <div class="form-group mt-3">
                  <p class="text-center">Chưa có tài khoản? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#registerModal">Đăng ký ngay</a></p>
                </div>

          </form>
      </div>
    </div>
  </div>
</div>
