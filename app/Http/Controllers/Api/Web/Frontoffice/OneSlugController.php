<?php

namespace App\Http\Controllers\Api\Web\Frontoffice;
use App\Http\Controllers\Api\BaseController;
use App\Models\Publication;
use App\Models\PublicationTag;
use App\Models\Author;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 


class OneSlugController extends BaseController
{
    public function slug(Request $request, $slug){

        $articles_count = Publication::where('status', 1)->where("publications.type_publication_id", 1)->count();

        if($articles_count === 0){

            SEOMeta::setTitle('Aucune publication | Actualitetogo');
            SEOMeta::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
            SEOMeta::setCanonical('https://actualitetogo.com');

            OpenGraph::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
            OpenGraph::setTitle('Aucune publication | Actualitetogo');
            OpenGraph::setUrl('https://actualitetogo.com');
            OpenGraph::addProperty('type', 'articles');
            OpenGraph::addImage("https://actualitetogo.com/assets/images/Icone.png");

            TwitterCard::setTitle('Aucune publication | Actualitetogo');
            TwitterCard::setSite('@Togoactualite');

            JsonLd::setTitle('Aucune publication | Actualitetogo');
            JsonLd::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
            JsonLd::addImage('https://actualitetogo.com/assets/images/Icone.png');

            return view('errors.HomePageControlEmpty');

        }else{

            if($slug === 'forum'){

                SEOMeta::setTitle('Forum | Actualitetogo');
                SEOMeta::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                SEOMeta::setCanonical('https://actualitetogo.com/forum');

                OpenGraph::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                OpenGraph::setTitle('Forum | Actualitetogo');
                OpenGraph::setUrl('https://actualitetogo.com/forum');
                OpenGraph::addProperty('type', 'articles');
                OpenGraph::addImage("https://actualitetogo.com/assets/images/Icone.png");

                TwitterCard::setTitle('Forum | Actualitetogo');
                TwitterCard::setSite('@Togoactualite');

                JsonLd::setTitle('Forum | Actualitetogo');
                JsonLd::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                JsonLd::addImage('https://actualitetogo.com/assets/images/Icone.png');

                return view('oneSlugPage.forum');

            }elseif($slug === 'mentions_legales'){

                SEOMeta::setTitle('Mentions légales | Actualitetogo');
                SEOMeta::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                SEOMeta::setCanonical('https://actualitetogo.com/mentions_legales');

                OpenGraph::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                OpenGraph::setTitle('Mentions légales | Actualitetogo');
                OpenGraph::setUrl('https://actualitetogo.com/mentions_legales');
                OpenGraph::addProperty('type', 'articles');
                OpenGraph::addImage("https://actualitetogo.com/assets/images/Icone.png");

                TwitterCard::setTitle('Mentions légales | Actualitetogo');
                TwitterCard::setSite('@Togoactualite');

                JsonLd::setTitle('Mentions légales | Actualitetogo');
                JsonLd::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                JsonLd::addImage('https://actualitetogo.com/assets/images/Icone.png');

                return view('oneSlugPage.mentions_legales');

            }elseif($slug === 'ads.txt'){ 

                return view('oneSlugPage.ads');

            }elseif($slug === 'privacy-policy'){

                SEOMeta::setTitle('Politique de confidentialité | Actualitetogo');
                SEOMeta::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                SEOMeta::setCanonical('https://actualitetogo.com/privacy-policy');

                OpenGraph::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                OpenGraph::setTitle('Politique de confidentialité | Actualitetogo');
                OpenGraph::setUrl('https://actualitetogo.com/privacy-policy');
                OpenGraph::addProperty('type', 'articles');
                OpenGraph::addImage("https://actualitetogo.com/assets/images/Icone.png");

                TwitterCard::setTitle('Politique de confidentialité | Actualitetogo');
                TwitterCard::setSite('@Togoactualite');

                JsonLd::setTitle('Politique de confidentialité | Actualitetogo');
                JsonLd::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                JsonLd::addImage('https://actualitetogo.com/assets/images/Icone.png');

                return view('oneSlugPage.confidentialite');

            }elseif($slug === 'contact'){

                SEOMeta::setTitle('Contactez-Nous | Actualitetogo');
                SEOMeta::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                SEOMeta::setCanonical('https://actualitetogo.com/contact');

                OpenGraph::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                OpenGraph::setTitle('Contactez-Nous | Actualitetogo');
                OpenGraph::setUrl('https://actualitetogo.com/contact');
                OpenGraph::addProperty('type', 'articles');
                OpenGraph::addImage("https://actualitetogo.com/assets/images/Icone.png");

                TwitterCard::setTitle('Contactez-Nous | Actualitetogo');
                TwitterCard::setSite('@Togoactualite');

                JsonLd::setTitle('Contactez-Nous | Actualitetogo');
                JsonLd::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                JsonLd::addImage('https://actualitetogo.com/assets/images/Icone.png');

                return view('oneSlugPage.contact');

            }elseif($slug === 'about'){

                SEOMeta::setTitle('Qui sommes-nous | Actualitetogo');
                SEOMeta::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                SEOMeta::setCanonical('https://actualitetogo.com/about');

                OpenGraph::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                OpenGraph::setTitle('Qui sommes-nous | Actualitetogo');
                OpenGraph::setUrl('https://actualitetogo.com/about');
                OpenGraph::addProperty('type', 'articles');
                OpenGraph::addImage("https://actualitetogo.com/assets/images/Icone.png");

                TwitterCard::setTitle('Qui sommes-nous | Actualitetogo');
                TwitterCard::setSite('@Togoactualite');

                JsonLd::setTitle('Qui sommes-nous | Actualitetogo');
                JsonLd::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                JsonLd::addImage('https://actualitetogo.com/assets/images/Icone.png');

                $users = User::where('status', 1)->paginate(10);

                return view('oneSlugPage.about', ['users' => $users]);

            }elseif ($slug === 'infos-pratiques') {

                SEOMeta::setTitle('Infos Pratiques | Actualitetogo');
                SEOMeta::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                SEOMeta::setCanonical('https://actualitetogo.com/infos-pratiques');

                OpenGraph::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                OpenGraph::setTitle('Infos Pratiques | Actualitetogo');
                OpenGraph::setUrl('https://actualitetogo.com/infos-pratiques');
                OpenGraph::addProperty('type', 'articles');
                OpenGraph::addImage("https://actualitetogo.com/assets/images/Icone.png");

                TwitterCard::setTitle('Infos Pratiques | Actualitetogo');
                TwitterCard::setSite('@Togoactualite');

                JsonLd::setTitle('Infos Pratiques | Actualitetogo');
                JsonLd::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                JsonLd::addImage('https://actualitetogo.com/assets/images/Icone.png');

                return view('oneSlugPage.infos-pratiques');

            }elseif ($slug === 'all-category') {

                SEOMeta::setTitle('Toutes les catégories | Actualitetogo');
                SEOMeta::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                SEOMeta::setCanonical('https://actualitetogo.com/all-category');

                OpenGraph::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                OpenGraph::setTitle('Toutes les catégories | Actualitetogo');
                OpenGraph::setUrl('https://actualitetogo.com/all-category');
                OpenGraph::addProperty('type', 'articles');
                OpenGraph::addImage("https://actualitetogo.com/assets/images/Icone.png");

                TwitterCard::setTitle('Toutes les catégories | Actualitetogo');
                TwitterCard::setSite('@Togoactualite');

                JsonLd::setTitle('Toutes les catégories | Actualitetogo');
                JsonLd::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                JsonLd::addImage('https://actualitetogo.com/assets/images/Icone.png');

                $categories = Category::query();

                if($request->input('search')){

                    $categories = DB::table("categories")
                    ->where('categories.name', 'like', '%'. $request->input('search') . '%')
                    ->orWhere('categories.slug', 'like', '%'. $request->input('search') . '%')
                    ->orWhere('categories.date_publish', 'like', '%'. $request->input('search') . '%')
                    ->orWhere('categories.count_publications', 'like', '%'. $request->input('search') . '%')
                    ->orderBy('categories.count_publications', 'desc')
                    ->paginate(9);

                    $categoryCount = DB::table("categories")
                    ->where('categories.name', 'like', '%'. $request->input('search') . '%')
                    ->orWhere('categories.slug', 'like', '%'. $request->input('search') . '%')
                    ->orWhere('categories.date_publish', 'like', '%'. $request->input('search') . '%')
                    ->orWhere('categories.count_publications', 'like', '%'. $request->input('search') . '%')
                    ->orderBy('categories.count_publications', 'desc')
                    ->count();

                }else{

                    $categories = DB::table("categories")
                    ->orderBy('categories.count_publications', 'desc')
                    ->paginate(9);

                    $categoryCount = Category::count();

                }

                return view('oneSlugPage.all-category', ['categories' => $categories, 'categoryCount'=> $categoryCount]);

            }else if($slug === "search-posts"){

                SEOMeta::setTitle('Rechercher une publication | Actualitetogo');
                SEOMeta::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                SEOMeta::setCanonical('https://actualitetogo.com/search-posts');

                OpenGraph::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                OpenGraph::setTitle('Rechercher une publication | Actualitetogo');
                OpenGraph::setUrl('https://actualitetogo.com/search-posts');
                OpenGraph::addProperty('type', 'articles');
                OpenGraph::addImage("https://actualitetogo.com/assets/images/Icone.png");

                TwitterCard::setTitle('Rechercher une publication | Actualitetogo');
                TwitterCard::setSite('@Togoactualite');

                JsonLd::setTitle('Rechercher une publication | Actualitetogo');
                JsonLd::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                JsonLd::addImage('https://actualitetogo.com/assets/images/Icone.png');

                $categories = Category::query();

                if($request->input('query')){

                    $search = $request->input('query');

                    $articles = Publication::where('publications.status', 1)
                    ->where("publications.type_publication_id", 1)
                    ->where('publications.deja_citer', 0)
                    ->where('publications.title', 'like', '%'. $request->input('query') . '%')
                    ->orWhere('publications.category_name', 'like', '%'. $request->input('query') . '%')
                    ->orWhere('publications.author_name', 'like', '%'. $request->input('query') . '%')
                    ->orderBy('publications.date_publish', 'desc')
                    ->get();

                    $count = Publication::where('publications.status', 1)
                    ->where("publications.type_publication_id", 1)
                    ->where('publications.deja_citer', 0)
                    ->where('publications.title', 'like', '%'. $request->input('query') . '%')
                    ->orWhere('publications.category_name', 'like', '%'. $request->input('query') . '%')
                    ->orWhere('publications.author_name', 'like', '%'. $request->input('query') . '%')
                    ->orderBy('publications.date_publish', 'desc')
                    ->count();

                    return view('oneSlugPage.search-article', ['articles' => $articles, 'search' => $search, 'count' => $count]);

                }else{

                    $search = false;

                    $count = false;

                    $articles = Publication::where('status', 1)->where("publications.type_publication_id", 1)->where('deja_citer', 0)->orderBy('date_publish', 'desc')->take(10)->get();

                    return view('oneSlugPage.search-article', ['articles' => $articles, 'search' => $search, 'count' => $count]);

                }
            }else if($slug === "videos"){

                SEOMeta::setTitle('Vidéos | Actualitetogo');
                SEOMeta::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                SEOMeta::setCanonical('https://actualitetogo.com/videos');

                OpenGraph::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                OpenGraph::setTitle('Vidéos | Actualitetogo');
                OpenGraph::setUrl('https://actualitetogo.com/videos');
                OpenGraph::addProperty('type', 'articles');
                OpenGraph::addImage("https://actualitetogo.com/assets/images/Icone.png");

                TwitterCard::setTitle('Vidéos | Actualitetogo');
                TwitterCard::setSite('@Togoactualite');

                JsonLd::setTitle('Vidéos | Actualitetogo');
                JsonLd::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                JsonLd::addImage('https://actualitetogo.com/assets/images/Icone.png');

                return view('oneSlugPage.videos');

            }else if($slug === "pub"){

                SEOMeta::setTitle('Publicités | Actualitetogo');
                SEOMeta::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                SEOMeta::setCanonical('https://actualitetogo.com/pub');

                OpenGraph::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                OpenGraph::setTitle('Publicités | Actualitetogo');
                OpenGraph::setUrl('https://actualitetogo.com/pub');
                OpenGraph::addProperty('type', 'articles');
                OpenGraph::addImage("https://actualitetogo.com/assets/images/Icone.png");

                TwitterCard::setTitle('Publicités | Actualitetogo');
                TwitterCard::setSite('@Togoactualite');

                JsonLd::setTitle('Publicités | Actualitetogo');
                JsonLd::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                JsonLd::addImage('https://actualitetogo.com/assets/images/Icone.png');

                return view('oneSlugPage.pub');

            }else if($slug === "events"){

                SEOMeta::setTitle('Evénements | Actualitetogo');
                SEOMeta::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                SEOMeta::setCanonical('https://actualitetogo.com/events');

                OpenGraph::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                OpenGraph::setTitle('Evénements | Actualitetogo');
                OpenGraph::setUrl('https://actualitetogo.com/events');
                OpenGraph::addProperty('type', 'articles');
                OpenGraph::addImage("https://actualitetogo.com/assets/images/Icone.png");

                TwitterCard::setTitle('Evénements | Actualitetogo');
                TwitterCard::setSite('@Togoactualite');

                JsonLd::setTitle('Evénements | Actualitetogo');
                JsonLd::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                JsonLd::addImage('https://actualitetogo.com/assets/images/Icone.png');

                return view('oneSlugPage.events');
            }else{

                $category = Category::where('slug', $slug)->first();

                $article = Publication::where('slug', $slug)->where("status", 1)->first();

                if (($category == null) && ( $article == null)) {

                    return view('errors.ErrorSlugPage');

                }elseif(($category !== null) && ( $article == null)) {
 
                    $otherCategory = Category::get();

                    $articles = Publication::where("publications.status", 1)
                    ->where("publications.type_publication_id", 1)
                    ->where("publications.category_id", $category->id)
                    ->orderBy('publications.date_publish', 'desc')
                    ->paginate(6);

                    $alireaussi = Publication::where("publications.deja_citer", 0)
                    ->where("publications.type_publication_id", 1)
                    ->where("publications.status", 1)
                    ->orderBy('publications.date_publish', 'desc')
                    ->take(5)
                    ->get();

                    SEOMeta::setTitle($category->name.' | Actualitetogo');
                    SEOMeta::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                    SEOMeta::setCanonical('https://actualitetogo.com/'.$category->slug);

                    OpenGraph::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                    OpenGraph::setTitle($category->name.' | Actualitetogo');
                    OpenGraph::setUrl('https://actualitetogo.com/'.$category->slug);
                    OpenGraph::addProperty('type', 'articles');
                    OpenGraph::addImage("https://actualitetogo.com/assets/images/Icone.png");

                    TwitterCard::setTitle($category->name.' | Actualitetogo');
                    TwitterCard::setSite('@Togoactualite');

                    JsonLd::setTitle($category->name.' | Actualitetogo');
                    JsonLd::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                    JsonLd::addImage('https://actualitetogo.com/assets/images/Icone.png');

                    return view('oneSlugPage.category', ['articles' => $articles, 'alireaussi' => $alireaussi, 'category' => $category, 'otherCategory' => $otherCategory]);

                }elseif(($category == null) && ( $article !== null)) {

                    if($article->type_publication_id == 1){

                        $categoriesH = Publication::where("publications.id", $article->id)->get();

                        $tags = PublicationTag::select(array("tags.name", "tags.id", "tags.slug"))
                        ->where("publications.id", $article->id)
                        ->leftJoin("publications", "publications.id", "=", "publication_tags.publication_id")
                        ->leftJoin("tags", "tags.id", "=", "publication_tags.tag_id")
                        ->get();

                        $tagsSEO = PublicationTag::select("tags.name")
                        ->where("publications.id", $article->id)
                        ->leftJoin("publications", "publications.id", "=", "publication_tags.publication_id")
                        ->leftJoin("tags", "tags.id", "=", "publication_tags.tag_id")
                        ->get();
 
                        $tagsCount = PublicationTag::select(array("tags.name", "tags.id", "tags.slug"))
                        ->where("publications.id", $article->id)
                        ->leftJoin("publications", "publications.id", "=", "publication_tags.publication_id")
                        ->leftJoin("tags", "tags.id", "=", "publication_tags.tag_id")
                        ->count();

                        $files = Publication::select(array("files.file_url"))
                        ->where("publications.id", $article->id)
                        ->leftJoin("publication_files", "publication_files.publication_id", "=", "publications.id")
                        ->leftJoin("files", "files.id", "=", "publication_files.file_id")
                        ->get();

                        $previous = Publication::select('title', 'slug')->where('id', '<' ,$article->id)->where("status", 1)->where("publications.type_publication_id", 1)->where("deja_citer", 0)->orderBy('publications.date_publish', 'desc')->first();

                        $next = Publication::select('title', 'slug')->where('id', '>' ,$article->id)->where("status", 1)->where("publications.type_publication_id", 1)->where("deja_citer", 0)->orderBy('publications.date_publish', 'desc')->first();

                        if($previous && $next){

                            $category = Publication::where("publications.id", $article->id)->first();

                            $similars = Publication::where("status", 1)
                            ->where("publications.type_publication_id", 1)
                            ->where("category_id", $category->category_id)
                            ->where("id", "!=" ,$article->id)
                            ->where("id", "!=" ,$previous->id)
                            ->where("id", "!=" ,$next->id)
                            ->where("deja_citer", 0)
                            ->orderBy('date_publish', 'desc')
                            ->take(9)->get();

                        }else{

                            $category = Publication::where("publications.id", $article->id)->first();

                            $similars = Publication::where("status", 1)
                            ->where("publications.type_publication_id", 1)
                            ->where("category_id", $category->category_id)
                            ->where("deja_citer", 0)
                            ->where("id", "!=" ,$article->id)
                            ->orderBy('date_publish', 'desc')
                            ->take(9)->get();

                        }

                        $alireaussi = Publication::where("publications.deja_citer", 0)
                        ->where("publications.type_publication_id", 1)
                        ->where("publications.status", 1)
                        ->orderBy('publications.date_publish', 'desc')
                        ->take(5)
                        ->get(); 

                        SEOMeta::setTitle(strip_tags($article->title));
                        SEOMeta::setCanonical('https://actualitetogo.com/'.$article->slug);
                        SEOMeta::setDescription(strip_tags($article->truncate_content));
                        SEOMeta::addMeta('article:published_time', $article->date_publish, 'property');
                        SEOMeta::addMeta('article:section', $article->category_name, 'property');
                        SEOMeta::addKeyword($tagsSEO);


                        OpenGraph::setDescription(strip_tags($article->truncate_content));
                        OpenGraph::setTitle(strip_tags($article->title));
                        OpenGraph::setUrl('https://actualitetogo.com/'.$article->slug);
                        OpenGraph::addProperty('type', 'articles');
                        OpenGraph::addImage('https://togoactualite.com/wp-content/'.$article->image_cover_url);

                        TwitterCard::setTitle(strip_tags($article->title));
                        TwitterCard::setSite('@Togoactualite');

                        JsonLd::setTitle(strip_tags($article->title));
                        JsonLd::setDescription(strip_tags($article->truncate_content));
                        JsonLd::addImage('https://togoactualite.com/wp-content/'.$article->image_cover_url);

                        $politiqueFirst = Publication::where("status", 1)
                        ->where("publications.type_publication_id", 1)
                        ->where("category_id", 26)
                        ->orderBy('date_publish', 'desc')
                        ->take(8)
                        ->get();

                        return view('oneSlugPage.article',[
                            'article' => $article,
                            'files' => $files,
                            'tags' => $tags,
                            'alireaussi' => $alireaussi,
                            'tagsCount' => $tagsCount,
                            'previous' => $previous,
                            'next' => $next,
                            'similars' => $similars,
                            'categoriesH' => $categoriesH,
                            'politiqueFirst' => $politiqueFirst
                        ]);

                    }



                }else{

                    SEOMeta::setTitle('Page introuvable | Actualitetogo');
                    SEOMeta::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                    SEOMeta::setCanonical('https://actualitetogo.com');

                    OpenGraph::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                    OpenGraph::setTitle('Page introuvable | Actualitetogo');
                    OpenGraph::setUrl('https://actualitetogo.com');
                    OpenGraph::addProperty('type', 'articles');
                    OpenGraph::addImage("https://actualitetogo.com/assets/images/Icone.png");

                    TwitterCard::setTitle('Page introuvable | Actualitetogo');
                    TwitterCard::setSite('@Togoactualite');

                    JsonLd::setTitle('Page introuvable | Actualitetogo');
                    JsonLd::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                    JsonLd::addImage('https://actualitetogo.com/assets/images/Icone.png');

                    return view('errors.ErrorSlugPage');
                }
            }

        }
    }

    public function tags($slug)
    {


        $articles_count = Publication::where('status', 1)->where("publications.type_publication_id", 1)->count();

        if($articles_count === 0){

            SEOMeta::setTitle('Aucune publication | Actualitetogo');
            SEOMeta::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
            SEOMeta::setCanonical('https://actualitetogo.com');

            OpenGraph::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
            OpenGraph::setTitle('Aucune publication | Actualitetogo');
            OpenGraph::setUrl('https://actualitetogo.com');
            OpenGraph::addProperty('type', 'articles');
            OpenGraph::addImage("https://actualitetogo.com/assets/images/Icone.png");

            TwitterCard::setTitle('Aucune publication | Actualitetogo');
            TwitterCard::setSite('@Togoactualite');

            JsonLd::setTitle('Aucune publication | Actualitetogo');
            JsonLd::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
            JsonLd::addImage('https://actualitetogo.com/assets/images/Icone.png');

            return view('errors.HomePageControlEmpty');

        }else{

            $tag = Tag::where('slug', $slug)->first();

            if ($tag == null) {

                SEOMeta::setTitle('Page introuvable | Actualitetogo');
                SEOMeta::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                SEOMeta::setCanonical('https://actualitetogo.com/tags/'.$tag->slug);

                OpenGraph::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                OpenGraph::setTitle('Page introuvable | Actualitetogo');
                OpenGraph::setUrl('https://actualitetogo.com/tags/'.$tag->slug);
                OpenGraph::addProperty('type', 'articles');
                OpenGraph::addImage("https://actualitetogo.com/assets/images/Icone.png");

                TwitterCard::setTitle('Page introuvable | Actualitetogo');
                TwitterCard::setSite('@Togoactualite');

                JsonLd::setTitle('Page introuvable | Actualitetogo');
                JsonLd::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                JsonLd::addImage('https://actualitetogo.com/assets/images/Icone.png');

                return view('errors.ErrorSlugPage');

            } else {

                SEOMeta::setTitle($tag->name.' | Actualitetogo');
                SEOMeta::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                SEOMeta::setCanonical('https://actualitetogo.com/tags/'.$tag->slug);

                OpenGraph::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                OpenGraph::setTitle($tag->name.' | Actualitetogo');
                OpenGraph::setUrl('https://actualitetogo.com/tags/'.$tag->slug);
                OpenGraph::addProperty('type', 'articles');
                OpenGraph::addImage("https://actualitetogo.com/assets/images/Icone.png");

                TwitterCard::setTitle($tag->name.' | Actualitetogo');
                TwitterCard::setSite('@Togoactualite');

                JsonLd::setTitle($tag->name.' | Actualitetogo');
                JsonLd::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                JsonLd::addImage('https://actualitetogo.com/assets/images/Icone.png');
 
                $articles = Publication::select(array("publications.id", "publications.content", "publications.truncate_content","publications.title", "publications.slug", "publications.date_publish" ,"publications.author_name", "publications.author_slug","publications.image_cover_url"))
                ->where("publications.status", 1)
                ->where("publications.type_publication_id", 1)
                ->where("tags.id", $tag->id)
                ->where("publications.deja_citer", 0)
                ->leftJoin("publication_tags", "publication_tags.publication_id", "=", "publications.id")
                ->leftJoin("tags", "tags.id", "=", "publication_tags.tag_id")
                ->orderBy('publications.date_publish', 'desc')
                ->paginate(6);

                $otherCategory = Tag::get();

                $alireaussi = Publication::where("publications.deja_citer", 0)
                ->where("publications.type_publication_id", 1)
                ->where("publications.status", 1)
                ->orderBy('publications.date_publish', 'desc')
                ->take(5)
                ->get();

                return view('oneSlugPage.tags', ['articles' => $articles, 'tag' => $tag, 'alireaussi' => $alireaussi, 'otherCategory' => $otherCategory]);

            }
        }
    }

    public function authors($slug)
    {

        $articles_count = Publication::where('status', 1)->where("publications.type_publication_id", 1)->count();

        if($articles_count === 0){

            SEOMeta::setTitle('Aucune publication | Actualitetogo');
            SEOMeta::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
            SEOMeta::setCanonical('https://actualitetogo.com');

            OpenGraph::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
            OpenGraph::setTitle('Aucune publication | Actualitetogo');
            OpenGraph::setUrl('https://actualitetogo.com');
            OpenGraph::addProperty('type', 'articles');
            OpenGraph::addImage("https://actualitetogo.com/assets/images/Icone.png");

            TwitterCard::setTitle('Aucune publication | Actualitetogo');
            TwitterCard::setSite('@Togoactualite');

            JsonLd::setTitle('Aucune publication | Actualitetogo');
            JsonLd::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
            JsonLd::addImage('https://actualitetogo.com/assets/images/Icone.png');

            return view('errors.HomePageControlEmpty');

        }else{

            $author = Author::where('slug', $slug)->first();

            if ($author == null) {

                SEOMeta::setTitle('Page introuvable | Actualitetogo');
                SEOMeta::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                SEOMeta::setCanonical('https://actualitetogo.com/tags/'.$author->slug);

                OpenGraph::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                OpenGraph::setTitle('Page introuvable | Actualitetogo');
                OpenGraph::setUrl('https://actualitetogo.com/tags/'.$author->slug);
                OpenGraph::addProperty('type', 'articles');
                OpenGraph::addImage("https://actualitetogo.com/assets/images/Icone.png");

                TwitterCard::setTitle('Page introuvable | Actualitetogo');
                TwitterCard::setSite('@Togoactualite');

                JsonLd::setTitle('Page introuvable | Actualitetogo');
                JsonLd::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                JsonLd::addImage('https://actualitetogo.com/assets/images/Icone.png');

                return view('errors.ErrorSlugPage');

            } else {

                
                SEOMeta::setTitle($author->authorName.' | Actualitetogo');
                SEOMeta::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                SEOMeta::setCanonical('https://actualitetogo.com/authors/'.$author->slug);

                OpenGraph::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                OpenGraph::setTitle($author->authorName.' | Actualitetogo');
                OpenGraph::setUrl('https://actualitetogo.com/authors/'.$author->slug);
                OpenGraph::addProperty('type', 'articles');
                OpenGraph::addImage("https://actualitetogo.com/assets/images/Icone.png");

                TwitterCard::setTitle($author->authorName.' | Actualitetogo');
                TwitterCard::setSite('@Togoactualite');

                JsonLd::setTitle($author->authorName.' | Actualitetogo');
                JsonLd::setDescription('Nous sommes Actualitetogo, l’info en continue sur le togo, l\'Afrique et le monde entier.');
                JsonLd::addImage('https://actualitetogo.com/assets/images/Icone.png');
 
                $articles = Publication::where("status", 1)
                ->where("publications.type_publication_id", 1)
                ->where("deja_citer", 1)
                ->where("author_slug", $author->slug)
                ->orderBy('date_publish', 'desc')
                ->paginate(6);

                $otherCategory = Category::get();

                $alireaussi = Publication::where("publications.deja_citer", 0)
                ->where("publications.type_publication_id", 1)
                ->where("publications.status", 1)
                ->orderBy('publications.date_publish', 'desc')
                ->take(5)
                ->get();

                return view('oneSlugPage.authors', [ 'author' => $author, 'articles' => $articles, 'alireaussi' => $alireaussi, 'otherCategory' => $otherCategory]);

            }
        }
    }

}
