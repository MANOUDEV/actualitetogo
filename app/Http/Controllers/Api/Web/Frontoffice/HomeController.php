<?php
namespace App\Http\Controllers\Api\Web\Frontoffice;

use App\Http\Controllers\Api\BaseController;
use App\Models\Category;
use App\Models\Publication;
use App\Models\Tag;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;

class HomeController extends BaseController
{
    public function home(){

        $articles_count = Publication::where('status', 1)->count();


        SEOMeta::setTitle('Accueil | Togo actualité');
        SEOMeta::setDescription('Nous sommes Togo Actualité, l’information en temps réel sur le Togo et l’Afrique.');
        SEOMeta::setCanonical('https://actualitetogo.com');
        SEOMeta::addKeyword(['Togo', 'togo', 'togo actualité', 'actualité', 'actualité togo', 'news 228', 'actu togo', 'lomé actualité', 'togo news', 'togo info']);

        OpenGraph::setDescription('Nous sommes Togo Actualité, l’information en temps réel sur le Togo et l’Afrique.');
        OpenGraph::setTitle('Accueil | Togo actualité');
        OpenGraph::setUrl('https://actualitetogo.com');
        OpenGraph::addProperty('type', 'articles');
        OpenGraph::addImage("https://actualitetogo.com/assets/images/Icone.png");

        TwitterCard::setTitle('Accueil | Togo actualité');
        TwitterCard::setSite('@Togoactualite');

        JsonLd::setTitle('Accueil | Togo actualité');
        JsonLd::setDescription('Nous sommes Togo Actualité, l’information en temps réel sur le Togo et l’Afrique.');
        JsonLd::addImage('https://actualitetogo.com/assets/images/Icone.png');

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