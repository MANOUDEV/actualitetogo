<?php
namespace App\Http\Controllers\Api\Web\Frontoffice;

use App\Http\Controllers\Api\BaseController;
use App\Models\Category;
use App\Models\Publication; 

class HomeController extends BaseController
{
    public function home(){

        $articles_count = Publication::where('status', 1)->count();

        if($articles_count === 0){

            return view('errors.HomePageControlEmpty');

        }else{

            $alaUne =  Publication::where('status', 1)->where("publications.type_publication_id", 1)->where("publications.deja_citer", 0)->orderBy('date_publish', 'desc')->take(13)->get();

            return view('welcome', ['alaUne' => $alaUne]);

        }
    } 

     public function togoPolitiqueDataRequest()
    {

        $politiqueFirst = Publication::where("status", 1)
        ->where("publications.type_publication_id", 1)
        ->where("category_id", 26)
        ->orderBy('date_publish', 'desc')
        ->take(8)
        ->get();

        $politiqueTwo = Publication::where("status", 1)
        ->where("publications.type_publication_id", 1)
        ->where("category_id", 26)
        ->where("id", '!=',$politiqueFirst[0]->id)
        ->where("id", '!=',$politiqueFirst[1]->id)
        ->where("id", '!=',$politiqueFirst[2]->id)
        ->where("id", '!=',$politiqueFirst[3]->id)
        ->where("id", '!=',$politiqueFirst[4]->id)
        ->where("id", '!=',$politiqueFirst[5]->id)
        ->where("id", '!=',$politiqueFirst[6]->id)
        ->where("id", '!=',$politiqueFirst[7]->id)
        ->orderBy('date_publish', 'desc')
        ->take(1)
        ->get();

        $politiqueThree = Publication::where("status", 1)
        ->where("publications.type_publication_id", 1)
        ->where("category_id", 26)
        ->where("id", '!=',$politiqueFirst[0]->id)
        ->where("id", '!=',$politiqueFirst[1]->id)
        ->where("id", '!=',$politiqueFirst[2]->id)
        ->where("id", '!=',$politiqueFirst[3]->id)
        ->where("id", '!=',$politiqueFirst[4]->id)
        ->where("id", '!=',$politiqueFirst[5]->id)
        ->where("id", '!=',$politiqueFirst[6]->id)
        ->where("id", '!=',$politiqueFirst[7]->id)
        ->where("id", '!=',$politiqueTwo[0]->id)
        ->orderBy('date_publish', 'desc')
        ->take(8)
        ->get();

        $populars = Publication::where("status", 1)
        ->where("publications.type_publication_id", 1)
        ->whereDate('date_publish', '>', '2022-12-31')
        ->orderBy('views_count', 'desc')
        ->take(3)
        ->get();



        $categories = Category::orderBy('count_publications', 'desc')->take(6)->get();

        return $this->sendResponse([
            'politiqueFirst' =>  $politiqueFirst,
            'politiqueTwo' =>  $politiqueTwo,
            'politiqueThree' =>  $politiqueThree,
            'categories' =>  $categories,
            'populars' =>  $populars,
            'status' => 200
        ], 'Liste des articles publiés sur togo politique.');

    }

     public function aNePasManquerTogoDataRequest()
    {

        $anepasmanquer = Publication::where("status", 1)
        ->where("publications.type_publication_id", 1)
        ->where("category_id", 1)
        ->orderBy('date_publish', 'desc')
        ->take(8)
        ->get();

        return $this->sendResponse([
            'anepasmanquer' =>  $anepasmanquer,
            'status' => 200
        ], 'Liste des articles publiés sur a ne pas rater togo.');

    }
}