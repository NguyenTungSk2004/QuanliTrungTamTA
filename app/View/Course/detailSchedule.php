<!-- Modal -->
<div class="modal fade" id="detailSchedule" tabindex="-1" role="dialog" aria-labelledby="detailScheduleLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="detailScheduleLabel">Thông tin lớp học</h4>
        <button type="button" class="close" aria-label="Close" onclick=" $('#detailSchedule').modal('hide');">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5>Thông tin giáo viên:</h5>
        <p class="ml-4"><strong>Tên giáo viên:</strong></p>
        <p class="ml-4"><strong>Email giáo viên:</strong> </p>
        
        <h5>Lịch học:</h5>
        <p class="ml-4"><strong>Ngày trong tuần:</strong></p>
        <p class="ml-4"><strong>Thời gian bắt đầu:</strong> </p>
        <p class="ml-4"><strong>Thời gian kết thúc:</strong></p>
        <p class="ml-4"><strong>Số lượng học viên:</strong> </p>
        
        <h5>Danh sách học viên:</h5>
        <div class="table-responsive">
            <table class="table">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Mã</th>
                    <th>Tên</th>
                    <th>SĐT</th>
                    <th>Email</th>
                  </tr>
                </thead>
                <tbody>
                <!-- Thêm thêm hàng cho các học viên khác -->
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>




