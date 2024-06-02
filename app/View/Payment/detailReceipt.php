<!-- Modal -->
<div class="modal fade" id="detailReceipt" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Chi tiết phiếu thu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="student_id">Học viên: </label>
                    <p id="student_id"></p>
                </div>
                <div class="form-group">
                    <label for="course_id">Khóa học: </label>
                    <p id="course_id"></p>
                </div>
                <div class="form-group">
                    <label for="amount_received">Số tiền đã nộp: </label>
                    <p id="amount_received"></p>
                </div>
                <div class="form-group">
                    <label for="total_payment">Tổng số tiền đã thanh toán: </label>
                    <p id="total_payment"></p>
                </div>
                <div class="form-group">
                    <label for="received_date">Ngày thanh toán: </label>
                    <p id="received_date"></p>
                </div>
                <div class="form-group">
                    <label for="method">Phương thức thanh toán: </label>
                    <p id="method"></p>
                </div>
                <div class="form-group">
                    <label for="note">Ghi chú: </label>
                    <p id="note"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">OK</button>
            </div>
        </div>
    </div>
</div>