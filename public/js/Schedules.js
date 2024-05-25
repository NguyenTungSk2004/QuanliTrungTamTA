$(document).ready(function() {
    $('#detailSchedule').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Nút kích hoạt modal
        var name = button.data('name');
        var email = button.data('email');
        var day_of_week = button.data('day_of_week');
        var start_time = button.data('start_time');
        var end_time = button.data('end_time');
        var count = button.data('count');
        var studentInclass = button.data('studentinclass'); // Lấy dữ liệu từ thuộc tính data-studentinclass

        var modal = $(this);
        modal.find('.modal-body p:nth-child(2)').html('<strong>Tên giáo viên:</strong> ' + name);
        modal.find('.modal-body p:nth-child(3)').html('<strong>Email giáo viên:</strong> ' + email);
        modal.find('.modal-body p:nth-child(5)').html('<strong>Ngày trong tuần:</strong> ' + day_of_week);
        modal.find('.modal-body p:nth-child(6)').html('<strong>Thời gian bắt đầu:</strong> ' + start_time);
        modal.find('.modal-body p:nth-child(7)').html('<strong>Thời gian kết thúc:</strong> ' + end_time);
        modal.find('.modal-body p:nth-child(8)').html('<strong>Số lượng học viên:</strong> ' + count);

        // Chọn tbody đầu tiên trong modal
        var tableBody = modal.find('.modal-body table tbody');
        tableBody.empty(); // Xóa dữ liệu cũ

        // Thêm dữ liệu sinh viên vào tbody
        var count = 0;
        studentInclass.forEach(function(student) {
            var row = '<tr>' +
                '<td>' + ++count + '</td>' +
                '<td>' + student.student_id + '</td>' +
                '<td>' + student.name + '</td>' +
                '<td>' + student.phone + '</td>' +
                '<td>' + student.email + '</td>' +
                '</tr>';
            tableBody.append(row); // Thêm dòng vào bảng
        });
    });
});


function deleteSchedule(id) {
    if (confirm('Bạn có chắc chắn muốn xóa lớp học này không?')) {
        event.stopPropagation();
        document.getElementById(id).submit();
    }
  }
