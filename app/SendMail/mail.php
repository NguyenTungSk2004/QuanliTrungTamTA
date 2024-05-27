<?php
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

// Bao gồm các tệp PHPMailer
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Hàm để gửi email
function sendEmail($to, $subject, $body, $fromName = 'My name is TungSK') {
    $mail = new PHPMailer(true); // Khai báo biến $mail bằng true để bật chế độ thông báo lỗi

    try {
        // Thiết lập để sử dụng SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'tung604345@gmail.com'; // Địa chỉ email của bạn
        $mail->Password = 'mihrpmdjzkguwesh'; // Mật khẩu ứng dụng
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Thiết lập người gửi và người nhận
        $mail->setFrom('tung604345@gmail.com', $fromName);
        $mail->addAddress($to);

        // Thiết lập chủ đề và nội dung email
        $mail->Subject = $subject;
        $mail->Body = $body;

        // Gửi email
        $mail->send();
        
        // In ra thông báo thành công
        echo "<script>console.log('Email đã được gửi thành công!')</script>";
        return true;
    } catch (Exception $e) {
        // In ra thông báo lỗi
        echo "<script>console.log('Email không thể được gửi. Lỗi: " . $mail->ErrorInfo . "')</script>";
        return false;
    }
}


// // Gửi email với các thông tin mô phỏng
// $to = 'changtraicodon2205@gmail.com';
// $subject = 'Test Email của TungSK';
// $body = 'Đây là test email mà thôi';
// $result = sendEmail($to, $subject, $body);

// // Hiển thị kết quả
// echo $result;
?>
