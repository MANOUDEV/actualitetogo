<?php
namespace App\Http\Controllers\Api\Web\Frontoffice;

use App\Http\Controllers\Api\BaseController;
use App\Models\Publication;
use App\Models\Tag;
use App\Models\Category;

class HomeController extends BaseController
{
    public function home(){

        $articles_count = Publication::where('status', 1)->count();

        if($articles_count === 0){

            return view('errors.HomePageControlEmpty');

        }else{

            $annonces = Publication::where('status', 1)->where("publications.type_publication_id", 3)->get();

            $tendances =  Publication::where('status', 1)->where("publications.type_publication_id", 1)->whereDate('date_publish', '>', '2024-04-31')->where("publications.deja_citer", 0)->orderBy('views_count', 'desc')->take(4)->get();

            $alaUne =  Publication::where('status', 1)->where("publications.type_publication_id", 1)->where("publications.deja_citer", 0)->orderBy('date_publish', 'desc')->take(13)->get();

            return view('welcome', ['annonces' => $annonces, 'tendances' => $tendances, 'alaUne' => $alaUne]);

        }
    }

}
