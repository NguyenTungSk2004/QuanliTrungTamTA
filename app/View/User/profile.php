<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Thêm các tệp CSS và JavaScript cần thiết -->
</head>
<body>
    <h1>User Profile</h1>
    <div>
        <h2>Thông tin cá nhân</h2>
        <form action="update_profile.php" method="POST">
            <label for="name">Tên:</label>
            <input type="text" id="name" name="name" value="<?php echo $user['name']; ?>"><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>"><br>
            <!-- Các trường thông tin khác của người dùng -->
            <button type="submit">Cập nhật thông tin</button>
        </form>
    </div>
    <div>
        <h2>Thay đổi mật khẩu</h2>
        <form action="change_password.php" method="POST">
            <label for="current_password">Mật khẩu hiện tại:</label>
            <input type="password" id="current_password" name="current_password"><br>
            <label for="new_password">Mật khẩu mới:</label>
            <input type="password" id="new_password" name="new_password"><br>
            <label for="confirm_new_password">Xác nhận mật khẩu mới:</label>
            <input type="password" id="confirm_new_password" name="confirm_new_password"><br>
            <button type="submit">Thay đổi mật khẩu</button>
        </form>
    </div>
    <!-- Các phần khác như cài đặt tài khoản, ảnh đại diện, xóa tài khoản, v.v. -->
</body>
</html>
