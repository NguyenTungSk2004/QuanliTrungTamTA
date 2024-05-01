<!-- Modal đăng nhập -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="registerModalLabel">Đăng ký</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              
      <form id="registerForm" action="#" method="POST">
            <div class="form-group">
              <label for="newUsername">Tên đăng nhập:</label>
              <input type="text" class="form-control" id="newUsername" name="newUsername" required>
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
              <label for="newPassword">Mật khẩu:</label>
              <input type="password" class="form-control" id="newPassword" name="newPassword" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Đăng ký</button>
            <div class="form-group mt-3">
              <p class="text-center">Đã có tài khoản? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#loginModal">Đăng nhập</a></p>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>
