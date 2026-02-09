<?php
use App\Http\Controllers\Api\Web\Frontoffice\IncludesController; 
  
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
 