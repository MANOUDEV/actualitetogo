<?php
use App\Http\Controllers\Api\Web\Frontoffice\HomeController;
use App\Http\Controllers\Api\Web\Frontoffice\OneSlugController;
use App\Http\Controllers\Api\Web\Authentication\ForgotPasswordController;
use App\Http\Controllers\Api\Web\Authentication\LoginController;
use App\Http\Controllers\Api\Web\Authentication\RegisterController;
use App\Http\Controllers\Api\Web\Backoffice\WebRouteController;
use Illuminate\Support\Facades\Route; 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



//La route pour la page d'accueil

Route::get('/', [HomeController::class, 'home'] );

//La route pour les pages à lien unique

Route::get('/{slug}', [OneSlugController::class, 'slug']);

Route::get('/tags/{slug}', [OneSlugController::class, 'tags']);

Route::get('/authors/{slug}', [OneSlugController::class, 'authors']);

//les routes pour l'authentification

Route::get('/auth/login', [LoginController::class, 'login']);

Route::get('/auth/register', [RegisterController::class, 'register']);

Route::get('/auth/forgot_password', [ForgotPasswordController::class, 'forgot_password']);

//Les routes pour les administrateurs

Route::get('/admin/dashboard',[WebRouteController::class, 'administrateur']);

Route::get('/admin/profile',[WebRouteController::class, 'administrateur']);

Route::get('/admin/newsletters',[WebRouteController::class, 'administrateur']);

Route::get('/admin/tags',[WebRouteController::class, 'administrateur']);

Route::get('/admin/category',[WebRouteController::class, 'administrateur']);

Route::get('/admin/authors',[WebRouteController::class, 'administrateur']);
 
Route::get('/admin/authors/create',[WebRouteController::class, 'administrateur']);

Route::get('/admin/authors/{slug}/update',[WebRouteController::class, 'administrateur']);

Route::get('/admin/publications/create',[WebRouteController::class, 'administrateur']);
 
Route::get('/admin/publications/create/{slug}/type_publications',[WebRouteController::class, 'administrateur']); 

//Les routes pour les publicateurs

Route::get('/pub/dashboard',[WebRouteController::class, 'publicateur']);

Route::get('/pub/profile',[WebRouteController::class, 'administrateur']);

Route::get('/pub/tags',[WebRouteController::class, 'publicateur']);
 
Route::get('/pub/authors',[WebRouteController::class, 'publicateur']);

Route::get('/pub/authors/{slug}/update',[WebRouteController::class, 'publicateur']);