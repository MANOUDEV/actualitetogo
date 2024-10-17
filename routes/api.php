<?php
use App\Http\Controllers\Api\Web\Frontoffice\IncludesController;
use App\Http\Controllers\Api\Web\Frontoffice\HomeController;

use App\Http\Controllers\Api\Web\Authentication\RegisterController;
use App\Http\Controllers\Api\Web\Authentication\ForgotPasswordController;
use App\Http\Controllers\Api\Web\Authentication\LoginController;
use App\Http\Controllers\Api\Web\Authentication\LogoutController;
use App\Http\Controllers\Api\Web\Authentication\ProfileController;

use App\Http\Controllers\Api\Web\Frontoffice\UserActionAuthController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Les routes pour les données du haader

Route::get('/frontoffice/header/togoactualite', [IncludesController::class, 'togoActualiteRequestData']);

Route::get('/frontoffice/header/rubriques', [IncludesController::class, 'rubriquesRequestData']);

Route::get('/frontoffice/header/diplomatie', [IncludesController::class, 'diplomatieRequestData']);

Route::get('/frontoffice/header/chroniques', [IncludesController::class, 'chroniquesRequestData']);

Route::get('/frontoffice/header/economie', [IncludesController::class, 'economieRequestData']);

Route::get('/frontoffice/header/diaspora', [IncludesController::class, 'diasporaRequestData']);

Route::get('/frontoffice/header/fenetreSurLAfrique', [IncludesController::class, 'fenetreSurLAfriqueRequestData']);

Route::get('/frontoffice/header/international', [IncludesController::class, 'internationalRequestData']);

Route::get('/frontoffice/header/monde', [IncludesController::class, 'mondeRequestData']);

Route::get('/frontoffice/header/afrique', [IncludesController::class, 'afriqueRequestData']);

Route::get('/frontoffice/header/sports', [IncludesController::class, 'sportsRequestData']);

Route::get('/frontoffice/header/can', [IncludesController::class, 'canRequestData']);

Route::get('/frontoffice/header/togo', [IncludesController::class, 'togoRequestData']);

//Routes pour les données du footer

Route::post('/frontoffice/footer/newsletter', [IncludesController::class, 'newsletterStoreRequest']);

Route::get('/frontoffice/footer/tags_populars', [IncludesController::class, 'tagsRequestData']);

Route::get('/frontoffice/footer/category_populars', [IncludesController::class, 'categoryRequestData']);

Route::get('/frontoffice/footer/articles_populars', [IncludesController::class, 'publicationsRequestData']);

Route::post('/frontoffice/save-push-notification-sub', [IncludesController::class, 'saveSubscription']);

//Les routes pour les matricules de référence

Route::post('/home/visitor/create_views', [IncludesController::class, 'generateVisitorMatriculeViews']);

Route::get('/home/visitor/{matricule}/check_views', [IncludesController::class, 'checkVisitorMatriculeViews']);

Route::post('/home/visitor/create_likes', [IncludesController::class, 'generateVisitorMatriculeLikes']);

Route::get('/home/visitor/{matricule}/check_likes', [IncludesController::class, 'checkVisitorMatriculeLikes']);

Route::post('/home/visitor/create_comments', [IncludesController::class, 'generateVisitorMatriculeComments']);

Route::get('/home/visitor/{matricule}/check_comments', [IncludesController::class, 'checkVisitorMatriculeComments']);

//Les routes pour les matricules de référence

Route::post('/home/visitor/create_views', [IncludesController::class, 'generateVisitorMatriculeViews']);

Route::get('/home/visitor/{matricule}/check_views', [IncludesController::class, 'checkVisitorMatriculeViews']);

Route::post('/home/visitor/create_likes', [IncludesController::class, 'generateVisitorMatriculeLikes']);

Route::get('/home/visitor/{matricule}/check_likes', [IncludesController::class, 'checkVisitorMatriculeLikes']);

Route::post('/home/visitor/create_comments', [IncludesController::class, 'generateVisitorMatriculeComments']);

Route::get('/home/visitor/{matricule}/check_comments', [IncludesController::class, 'checkVisitorMatriculeComments']);
 

//Gestion d'envoi de message sans connexion de l'utilisateur

Route::post('/home/contact', [IncludesController::class, 'submitContact']);

//Les routes pour les données de la page d'un article

Route::get('/article/{slug}/article_states/{local_storage_views}/check_likes_views/{local_storage_likes}', [IncludesController::class, 'articleState']);

Route::get('/article/{slug}/article_comments_states/{local_storage_comment}/check_comments', [IncludesController::class, 'articleComments']);


//Les routes pour les données de la page d'accueil

Route::get('/frontoffice/home_page/togo_politique', [HomeController::class, 'togoPolitiqueDataRequest']);

Route::get('/frontoffice/home_page/a_ne_pas_manquer_togo', [HomeController::class, 'aNePasManquerTogoDataRequest']);

Route::get('/frontoffice/home_page/international_fenetre_afrique_sports', [HomeController::class, 'internationalFenetreSurLAfriqueSportsDataRequest']);

Route::get('/frontoffice/home_page/societe', [HomeController::class, 'societeDataRequest']);

Route::get('/frontoffice/home_page/opinion_faits_divers', [HomeController::class, 'opinionFaitsDiversDataRequest']);

Route::get('/frontoffice/home_page/important', [HomeController::class, 'importantDataRequest']);

Route::get('/frontoffice/home_page/populars_comments', [HomeController::class, 'popularsCommentsDataRequest']);

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {

    //Gestion du système de mot de passe oublié

    Route::post('send_otp/forgot_password', [ForgotPasswordController::class, 'sendOtpForgotPassword']);

    Route::patch('check_otp/forgot_password', [ForgotPasswordController::class, 'checkOtpForgotPassword']);

    Route::patch('new_pass/forgot_password', [ForgotPasswordController::class, 'newPassForgotPassword']);

    //Gestion du système d'inscription

    Route::post('send_otp/register', [RegisterController::class, 'sendOtpRegister']);

    Route::patch('check_otp/register', [RegisterController::class, 'checkOtpRegister']);

    Route::put('new_info/register', [RegisterController::class, 'newInfoRegister']);

    Route::patch('new_pass/register', [RegisterController::class, 'newPassRegister']);

    //Gestion de l' authentification et securité JWT

    Route::post('login', [LoginController::class, 'submitLogin']);

    Route::post('logout', [LogoutController::class, 'logout'])->middleware('auth:api');

    Route::post('me', [ProfileController::class, 'me'])->middleware('auth:api');

    Route::post('profile', [ProfileController::class, 'profile'])->middleware('auth:api');

    Route::put('updateMeProfile', [ProfileController::class, 'updateMeProfile'])->middleware('auth:api');

    Route::put('updateMePassword', [ProfileController::class, 'updateMePassword'])->middleware('auth:api');

    Route::get('role', [ProfileController::class, 'getRole'])->middleware('auth:api');

    //Gestion d'envoi de message avec connexion de l'utilisateur

    Route::post('/home/contact_auth', [UserActionAuthController::class, 'submitContactAuth'])->middleware('auth:api');

    //Gestion des likes avec connexion de l'utilisateur

    Route::get('/article/{slug}/article_likes/{local_storage_likes}/check_likes', [UserActionAuthController::class, 'actionsLikes'])->middleware('auth:api');

    Route::post('article/{slug}/actions_comments/{local_storage_comment}/comments_creator', [UserActionAuthController::class, 'submitCommentAuth'])->middleware('auth:api');
    
});
