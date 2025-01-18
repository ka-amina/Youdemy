<?php
use App\Controllers\adminController;
use App\Router;
use App\Controllers\CategoryController;
use App\Controllers\TagController;
use App\Controllers\CoursController;
use App\Controllers\authentification;

$router = new Router();

$router->get('/login', Authentification::class, 'getLogin');
$router->post('/login', Authentification::class, 'login');

$router->get('/register', Authentification::class, 'getregister');
$router->post('/register', Authentification::class, 'register');
$router->get('/logout', Authentification::class, 'logout');


// $router->get('/logout', Authentification::class, 'logout');

$router->get('/category', CategoryController::class,'listCategories');
$router->post('/createCategory', CategoryController::class,'createCategory');
$router->get('/deleteCategory', CategoryController::class,'deleteCategory');
$router->get('/editCategory', CategoryController::class,'getCategoryById');
$router->post('/updateCategory', CategoryController::class,'updateCategory');

$router->get('/tags', TagController::class,'listTags');
$router->post('/createTag', TagController::class,'createTag');
$router->get('/deleteTag', TagController::class,'deleteTag');
$router->get('/editTag', TagController::class,'getTagById');
$router->post('/updateTag', TagController::class,'updateTag');

$router->get('/users', adminController::class,'showUsers');
$router->get('/teachers-students', adminController::class,'showAllUsers');
$router->post('/createUser', adminController::class,'createUser');
$router->get('/deleteUser', adminController::class,'deleteUser');
$router->get('/editUser', adminController::class,'getUserById');
$router->post('/updateUser', adminController::class,'updateUser');
$router->get('/acceptTeacher', adminController::class,'acceptTeacher');
$router->get('/banUser', adminController::class,'banUser');

$router->get('/dashboard', adminController::class,'getStatistique');

$router->get('/courses', CoursController::class,'showcategoriesAndTags');
$router->post('/createCourse', CoursController::class,'createCours');
$router->get('/teacherCourses', CoursController::class,'teacherCourses');
$router->get('/editCourse', CoursController::class,'getCourseById');
$router->post('/editCourse', CoursController::class,'updateCourse');
$router->get('/deleteCourse', CoursController::class,'deleteCourse');

$router->get('/home', CoursController::class,'visitorCourses');



// $router->get('/createCourse', CoursController::class,'showcategoriesAndTags');

$router->dispatch();
