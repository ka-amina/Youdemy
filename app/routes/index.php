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
$router->post('/addTag', TagController::class,'createTag');
$router->get('/deleteTag', TagController::class,'deleteTag');
$router->get('/editTag', TagController::class,'getTagById');
$router->post('/updateTag', TagController::class,'updateTag');


$router->dispatch();
