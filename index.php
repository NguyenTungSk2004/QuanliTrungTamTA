<?php

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

// Điều hướng của quản lí user
$route->get('/', 'LandingController@index');
$route->post('/login', 'LoginController@index');
$route->post('/logout', 'LogoutController@index');
$route->post('/register', 'RegisterController@index');
$route->post('/forgotPassword', 'ForgotPasswordController@index');

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

// Thực hiện gọi hàm xử lí của Route để điều hướng
$requestUri = $_SERVER['REQUEST_URI'];
$route->handle($requestUri);

?>
