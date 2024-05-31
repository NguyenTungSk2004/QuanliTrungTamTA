<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Phiếu Thu</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="container mt-3">
        <form method="post" action="" style="width: 67rem; margin-left: -4rem;">
            <input type="hidden" name="delete_receipts" value="1">
            <table class="table table-inverse">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="select_all"></th>
                        <th>ID</th>
                        <th>Mô Tả</th>
                        <th>Số Tiền Chi</th>
                        <th>Ngày Chi</th>
                        <th>Phương Thức Chi</th>
                        <th>Ghi Chú</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="checkbox" name="receipt_ids[]"></td>
                        <td>1</td>
                        <td>Thanh toán cho giáo viên</td>
                        <td>1,000,000 VND</td>
                        <td>2024-05-31</td>
                        <td>Chuyển khoản</td>
                        <td>Không có</td>
                        <td><a href="view_expense.php?id=1" class="btn btn-info">Chi Tiết</a></td>
                    </tr>
                </tbody>
            </table>
            <button type="button" class="btn btn-primary">+ Thêm Phiếu chi</button>
            <button type="submit" class="btn btn-danger">Xóa Phiếu chi</button>
        </form>
    </div>

    <script>
        // JavaScript for Select All Checkbox functionality
        $(document).ready(function(){
            $('#select_all').click(function(){
                $('input[name="receipt_ids[]"]').prop('checked', this.checked);
            });
        });
    </script>
</body>
</html>
