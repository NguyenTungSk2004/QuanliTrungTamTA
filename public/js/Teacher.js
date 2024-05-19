// fill data in modal editTeacher.php
$(document).ready(function() {
    $('#editTeacher').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // Nút kích hoạt modal
      var name = button.data('name');
      var address = button.data('address');
      var phone = button.data('phone');
      var email = button.data('email');
      var teacher_id = button.data('teacher_id');

      var modal = $(this);
      modal.find('.modal-body input[name="name"]').val(name);
      modal.find('.modal-body input[name="address"]').val(address);
      modal.find('.modal-body input[name="phone"]').val(phone);
      modal.find('.modal-body input[name="email"]').val(email);
      modal.find('.modal-body input[name="teacher_id"]').val(teacher_id);
    });
  });


// fill data in modal detailStudent.php
$(document).ready(function() {
    $('#detailTeacher').on('show.bs.modal', function (event) {
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

// Xóa giáo viên
function deleteTeacher(teacherId) {
  if (confirm('Bạn có chắc chắn muốn xóa giáo viên này không?')) {
      document.getElementById('deleteForm' + teacherId).submit();
  }
}