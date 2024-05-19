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

        var modal = $(this);
        modal.find('.modal-body p:nth-child(1)').html('<b>Tên:</b> ' + name);
        modal.find('.modal-body p:nth-child(2)').html('<b>Địa chỉ:</b> ' + address);
        modal.find('.modal-body p:nth-child(3)').html('<b>Số điện thoại:</b> ' + phone);
        modal.find('.modal-body p:nth-child(4)').html('<b>Email:</b> ' + email);
    });
});

// Xóa học viên
function deleteStudent(studentId) {
  if (confirm('Bạn có chắc chắn muốn xóa học viên này không?')) {
      document.getElementById('deleteForm' + studentId).submit();
  }
}