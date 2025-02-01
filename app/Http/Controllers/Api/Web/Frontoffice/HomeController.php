<?php
namespace App\Http\Controllers\Api\Web\Frontoffice;

use App\Http\Controllers\Api\BaseController;
use App\Models\Category;
use App\Models\Publication;
use App\Models\Tag;

class HomeController extends BaseController
{
    public function home(){

        $articles_count = Publication::where('status', 1)->count();

        if($articles_count === 0){

            return view('errors.HomePageControlEmpty');

        }else{

            return view('welcome');

        }
    } 
}