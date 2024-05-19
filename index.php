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
$route->get('/login', 'LoginController@index');
$route->get('/register', 'RegisterController@index');
$route->get('/forgotPassword', 'ForgotPasswordController@index');

//Điều hướng của trang chủ
$route->get('/home', 'HomeController@index');

// Điều hướng của quản lí học viên
$route->get('/student', 'StudentController@index');
$route->post('/student/addStudent', 'StudentController@addStudent');
$route->post('/student/deleteStudent', 'StudentController@deleteStudent');
$route->post('/student/editStudent', 'StudentController@editStudent');

// Điều hướng của quản lí giáo viên
$route->get('/teacher', 'TeacherController@index');
$route->get('/teacher/addTeacher', 'TeacherController@addTeacher');
$route->get('/teacher/editTeacher', 'TeacherController@editTeacher');
$route->get('/teacher/deleteTeacher', 'TeacherController@deleteTeacher');

// Điều hướng của quản lí khóa học
$route->get('/course', 'CourseController@index');
$route->get('/course/detail', 'CourseController@show@detailCourse.php');
$route->post('/course/addCourse', 'CourseController@addCourse');
$route->post('/course/deleteCourse', 'CourseController@deleteCourse');

// Điều hướng của quản lí thanh toán
$route->get('/payment', 'PaymentController@index');

// Điều hướng của quản lí kết quả học tập
$route->get('/achievement', 'AchievementController@index');

// Thực hiện gọi hàm xử lí của Route để điều hướng
$requestUri = $_SERVER['REQUEST_URI'];
$route->handle($requestUri);

?>
