// fill data in modal editStudent.php
$(document).ready(function() {
    $('#editStudent').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // Nút kích hoạt modal
      var name = button.data('name');
      var address = button.data('address');
      var phone = button.data('phone');
      var email = button.data('email');
      var student_id = button.data('student_id');

      var modal = $(this);
      modal.find('.modal-body input[name="name"]').val(name);
      modal.find('.modal-body input[name="address"]').val(address);
      modal.find('.modal-body input[name="phone"]').val(phone);
      modal.find('.modal-body input[name="email"]').val(email);
      modal.find('.modal-body input[name="student_id"]').val(student_id);
    });
  });


// fill data in modal detailStudent.php
$(document).ready(function() {
  $('#detailStudent').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // Nút kích hoạt modal
      var name = button.data('name');
      var address = button.data('address');
      var phone = button.data('phone');
      var email = button.data('email');
      var data_registration = button.data('data_registration');

      console.log(data_registration);
      var modal = $(this);
      modal.find('.modal-body p:nth-child(1)').html('<b>Tên:</b> ' + name);
      modal.find('.modal-body p:nth-child(2)').html('<b>Địa chỉ:</b> ' + address);
      modal.find('.modal-body p:nth-child(3)').html('<b>Số điện thoại:</b> ' + phone);
      modal.find('.modal-body p:nth-child(4)').html('<b>Email:</b> ' + email);

      // Chọn tbody đầu tiên trong modal
      var tableBody = modal.find('.modal-body table tbody');
      tableBody.empty(); // Xóa dữ liệu cũ
      // Thêm dữ liệu sinh viên vào tbody
      data_registration.forEach(function(item) {
          item['name'] = name;
          var dataString = JSON.stringify(item); // Chuyển đổi thành chuỗi JSON
          var dataName = JSON.stringify(name);
          
          var row = '<tr class="table-row-hover" data-toggle="modal" data-target="#paymentStudent" data-registration=\'' + dataString + '\'>' +
              '<td><b>' + item.schedule_id + '</b></td>' +
              '<td><a href="#">' + item.title + '</a></td>' +
              '<td>' + item.duration + ' tháng</td>' +
              '</tr>';
      
          tableBody.append(row); // Thêm dòng vào bảng
      });
  });
});


// fill data in modal editStudent.php
$(document).ready(function() {
  $('#paymentStudent').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // Nút kích hoạt modal
      var data = button.data('registration'); // Đây đã là một đối tượng JavaScript, không cần chuyển đổi

      var modal = $(this);
      modal.find('.modal-body #studentName').val(data.name);
      modal.find('.modal-body #courseName').val(data.title);
      modal.find('.modal-body #registrationInfo').val("Mã đăng ký: " + data.registration_id + "\n" + "Mã lớp học: " + data.schedule_id + "\nThời lượng: " + data.duration + " tháng" +"\nNgày đăng ký: " + data.registration_date);
      // Sử dụng các giá trị lấy được ở trên để làm gì đó trong modal
  });
});



// Xóa học viên
function deleteStudent(studentId) {
  if (confirm('Bạn có chắc chắn muốn xóa học viên này không?')) {
      document.getElementById('deleteForm' + studentId).submit();
  }
}