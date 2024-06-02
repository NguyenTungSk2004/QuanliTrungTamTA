<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="addReceipt" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm Phiếu thu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <form action="./addReceipt.php" method="POST">
                <div class="modal-body">
                    
                    <div class="form-group">
                        <label for="student_id">Học viên</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="course_id">Khóa học</label>
                        <select name="" class="form-control" id="course_id">
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cost">Số tiền</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="method">Phương thức</label>
                        <select name="" class="form-control" id="method">
                            <option value="cash">Tiền mặt</option>
                            <option value="transfer">Chuyển khoản</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="note">Ghi chú</label>
                        <textarea name="" id="note" class="form-control" cols="30" rows="5"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Lưu</button>
                </div>
            </form>
        </div>
    </div>
</div>