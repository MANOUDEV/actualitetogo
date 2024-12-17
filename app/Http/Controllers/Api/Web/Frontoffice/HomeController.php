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


        SEOMeta::setTitle('Accueil | Actualite Togo');
        SEOMeta::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
        SEOMeta::setCanonical('https://actualitetogo.com');
        SEOMeta::addKeyword(['Togo', 'togo', 'togo actualité', 'actualité', 'actualité togo', 'news 228', 'actu togo', 'lomé actualité', 'togo news', 'togo info']);

        OpenGraph::setDescription('Nous sommes Actualite Togo, l’information en temps réel sur le Togo et l’Afrique.');
        OpenGraph::setTitle('Accueil | Actualite Togo');
        OpenGraph::setUrl('https://actualitetogo.com');
        OpenGraph::addProperty('type', 'articles');
        OpenGraph::addImage("https://actualitetogo.com/assets/images/Icone.png");

        TwitterCard::setTitle('Accueil | Actualite Togo');
        TwitterCard::setSite('@Togoactualite');

        JsonLd::setTitle('Accueil | Actualite Togo');
        JsonLd::setDescription('Nous sommes Actualite Togo, l’information en temps réel sur le Togo et l’Afrique.');
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