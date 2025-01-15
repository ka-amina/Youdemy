<?php
use App\Controllers\adminController;
use App\Router;
use App\Controllers\CategoryController;
use App\Controllers\TagController;

$router = new Router();

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
$router->post('/createUser', adminController::class,'createUser');
$router->get('/deleteUser', adminController::class,'deleteUser');
$router->get('/editUser', adminController::class,'getUserById');
$router->post('/updateUser', adminController::class,'updateUser');

$router->dispatch();
