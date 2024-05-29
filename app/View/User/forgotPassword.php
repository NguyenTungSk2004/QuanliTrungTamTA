<!-- Modal Quên mật khẩu -->
<div class="modal fade" id="forgotPasswordModal" tabindex="-1" role="dialog" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="forgotPasswordModalLabel">Quên mật khẩu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="forgotPasswordForm" method="POST" action="/QuanLiTrungTamTA/forgotPassword">
                    <div class="form-group">
                        <label for="forgotUsername">Tài khoản:</label>
                        <input type="text" class="form-control" id="forgotUsername" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email khôi phục:</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer d-flex justify-content-start">
                <button type="submit" class="btn btn-primary" onclick="document.getElementById('forgotPasswordForm').submit();">Gửi mã xác thực</button>
            </div>
        </div>
    </div>
</div>
