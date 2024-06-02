<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Phiếu Thu</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
                        <th>Mã Đăng Ký</th>
                        <th>Số Tiền Đã Nhận</th>
                        <th>Đã Thanh Toán</th>
                        <th>Ngày Nhận</th>
                        <th>Phương Thức Thanh Toán</th>
                        <th>Ghi Chú</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="checkbox" name="receipt_ids[]"></td>
                        <td>1</td>
                        <td>REG123</td>
                        <td>1,000,000 VND</td>
                        <td>1,500,000 VND</td>
                        <td>2024-05-31</td>
                        <td>Chuyển Khoản</td>
                        <td>Không có</td>
                        <td>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#detailReceipt">Chi tiết</button>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="receipt_ids[]"></td>
                        <td>2</td>
                        <td>REG124</td>
                        <td>500,000 VND</td>
                        <td>500,000 VND</td>
                        <td>2024-05-30</td>
                        <td>Tiền Mặt</td>
                        <td>Không có</td>
                        <td>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#detailReceipt">
                            Chi tiết
                        </button>
                        </td>
                    </tr>
                    <!-- Thêm các dòng dữ liệu giả khác nếu cần -->
                </tbody>
            </table>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addReceipt">+ Thêm Phiếu Thu</button>
            <button type="submit" class="btn btn-danger">Xóa Phiếu Thu</button>
        </form>
    </div>
    <?php include "./app/View/Payment/addReceipt.php" ?>
    <?php include "./app/View/Payment/detailReceipt.php"?>
    
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
