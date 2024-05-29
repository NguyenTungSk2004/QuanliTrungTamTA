<?php

/**
 * 
 * Hướng dẫn sử dụng 
 * hàm get: $route->get('/Your_Url','class_Controller@method@param');
 * hàm post: $route->post('/Your_Url','class_Controller@method@param');
 * @param tham số truyền vào (chỉ cho phép 1 tham số truyền vào)
 * @method phương thức xử lí
 */

include './app/SendMail/mail.php';
include './app/Model/Model.php';
include './app/Route/Route.php';
include './app/Controller/HomeController.php';
include './app/Controller/StudentController.php';
include './app/Controller/TeacherController.php';
include './app/Controller/CourseController.php';
include './app/Controller/PaymentController.php';
include './app/Controller/AchievementController.php';
include './app/Controller/UserController.php';

$route = new Route();

session_start();


// Điều hướng của quản lí user
$route->get('/', 'LandingController@index');
$route->post('/courseRegistration', 'RegisterController@courseRegistration'); // gửi phiếu đăng ký khóa học

$route->post('/login', 'LoginController@index');
$route->post('/logout', 'LogoutController@index');

$route->post('/register', 'RegisterController@index');
$route->post('/verify', 'RegisterController@verify');

$route->post('/forgotPassword', 'ForgotPasswordController@forgot_password');
$route->post('/reset_password', 'ForgotPasswordController@reset_password');


if(isset($_SESSION['full_name']) && !empty($_SESSION['full_name']))
{
    //Điều hướng của trang chủ
    $route->get('/home', 'HomeController@index');

    // Điều hướng của quản lí học viên
    $route->get('/student', 'StudentController@index');
    $route->post('/student/deleteStudent', 'StudentController@deleteStudent');
    $route->post('/student/editStudent', 'StudentController@editStudent');

    // Điều hướng của quản lí đăng kí học viên
    $route->post('/student/addStudent', 'RegistrationController@addStudent');

    // Điều hướng của quản lí giáo viên
    $route->get('/teacher', 'TeacherController@index');
    $route->post('/teacher/addTeacher', 'TeacherController@addTeacher');
    $route->post('/teacher/editTeacher', 'TeacherController@editTeacher');
    $route->post('/teacher/deleteTeacher', 'TeacherController@deleteTeacher');

    // Điều hướng của quản lí khóa học
    $route->get('/course', 'CourseController@index');
    $route->post('/course/addCourse', 'CourseController@addCourse');
    $route->post('/course/deleteCourse', 'CourseController@deleteCourse');
    $route->post('/course/edit', 'CourseController@editCourse');

    //Điều hướng của quản lí lịch trình
    $route->get('/course/detail', 'CourseController@show@detailCourse.php');
    $route->post('/course/addSchedule', 'ScheduleController@addSchedule');
    $route->post('/course/deleteSchedule', 'ScheduleController@deleteSchedule');

    // Điều hướng của quản lí thanh toán
    $route->get('/payment', 'PaymentController@index');

    // Điều hướng của quản lí kết quả học tập
    $route->get('/achievement', 'AchievementController@index');
}
// Thực hiện gọi hàm xử lí của Route để điều hướng
$requestUri = $_SERVER['REQUEST_URI'];
$route->handle($requestUri);

?>
