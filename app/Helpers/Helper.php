<?php
use App\Models\Publication;
  function alertsInfos()
    {
        $articles_count = Publication::where('status', 1)->where("publications.type_publication_id", 2)->count();

        if($articles_count === 0){

            return $articles_count;

        }else{


            $alert_infos = Publication::where('status', 1)->where("publications.type_publication_id", 2)->get();

            return  $alert_infos;

        }
    }

    function showPub($content, $category_id, $article_id){

        $alireaussi = Publication::where("publications.deja_citer", 0)
        ->where("publications.type_publication_id", 1)
        ->where("publications.status", 1)
        ->where("category_id", $category_id)
        ->where("id", "!=" ,$article_id)
        ->orderBy('publications.date_publish', 'desc')
        ->first();

        $content_insert_begin = "<div class=\"row g-0\">
                                    <div class=\"col-sm-12 bg-primary bg-opacity-10 p-4 position-relative border-end border-1 rounded-start\">
                                        <span><i class=\"bi bi-arrow-left me-3 rtl-flip\"></i>A LIRE AUSSI</span>
                                        <h6 class=\"m-0\"><a href=\"/{{ $alireaussi->slug}}\" class=\"stretched-link btn-link text-reset\"> {!! $alireaussi->title !!} </a></h6>
                                    </div>
                                </div>
                                <div>
                                    <a href=\"#\" class=\"card-img-flash d-block\">
                                        <img src=\"/assets/images/adv-2.png\" alt=\"adv\">
                                    </a>
                                </div>";

        // Séparer le paragraphe en un tableau de mots
        $mots = explode(' ',  $content );

        // Calculer la position du milieu (basée sur le nombre de mots)
        $milieuPosition = floor(count($mots) / 2);

        // Insertion du texte au milieu du paragraphe
        array_splice($mots, $milieuPosition + 1, 0,  $content_insert_begin);

        // Insertion du texte à la fin du paragraphe
        array_push($mots,  $content_insert_begin);

        // Rejoindre le tableau de mots en une chaîne de caractères
        $content = implode(' ', $mots);

        return $content;

    }


