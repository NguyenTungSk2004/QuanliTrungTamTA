<!-- Modal -->
<div class="modal fade" id="detailSchedule" tabindex="-1" role="dialog" aria-labelledby="detailScheduleLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="detailScheduleLabel">Thông tin lớp học</h4>
        <button type="button" class="close" aria-label="Close" onclick=" $('#detailSchedule').modal('hide');">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5>Thông tin giáo viên:</h5>
        <p class="ml-4"><strong>Tên giáo viên:</strong> John Doe</p>
        <p class="ml-4"><strong>Email giáo viên:</strong> john.doe@example.com</p>
        
        <h5>Lịch học:</h5>
        <p class="ml-4"><strong>Ngày trong tuần:</strong> Thứ Hai, Thứ Tư, Thứ Sáu</p>
        <p class="ml-4"><strong>Thời gian bắt đầu:</strong> 9:00 AM</p>
        <p class="ml-4"><strong>Thời gian kết thúc:</strong> 11:00 AM</p>
        <p class="ml-4"><strong>Số lượng học viên:</strong> 2</p>
        
        <h5>Danh sách học viên:</h5>
        <table class="table">
            <tr>
              <th>Mã</th>
              <th>Tên</th>
              <th>SĐT</th>
              <th>Email</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>1</td>
              <td>John Smith</td>
              <td>1234567890</td>
              <td>john.smith@example.com</td>
            </tr>
            <tr>
              <td>2</td>
              <td>Jane Doe</td>
              <td>0987654321</td>
              <td>jane.doe@example.com</td>
            </tr>
            <!-- Thêm thêm hàng cho các học viên khác -->
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>



