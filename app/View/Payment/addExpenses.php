<div class="modal fade" id="addExpense" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
                    <label for="reason">Lý do</label>
                    <input type="text" id="reason" class="form-control">
                </div>
                <div class="form-group">
                    <label for="cost">Số tiền</label>
                    <input type="text" class="form-control" id="cost">
                </div>
                <div class="form-group">
                    <label for="method">Phương thức</label>
                    <select name="" id="method">
                        <option value="cash">Tiền mặt</option>
                        <option value="transfer">Chuyển khoản</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="note">Ghi chú</label>
                    <textarea name="" id="note" cols="30" rows="5" class="form-control"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
        </form>
    </div>
</div>