<?php

namespace App\Http\Controllers\Api\Web\Backoffice\Admin\Publications\Create;

use App\Http\Controllers\Api\BaseController;
use App\Models\InfosMonthYear;
use App\Models\InfosMonthYearPublication;
use App\Models\TypePublication;
use App\Models\Publication;
use Carbon\Carbon;
use Illuminate\Http\Request; 
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class PublicitesStoreController extends BaseController 
{
    public function str_replace_all($search, $replace, $subject) {

        return str_replace($search, $replace, $subject);

    }

    public function getExcerpt($limit = 50, $post_content)
    {
        $content = strip_tags($post_content); // Supprime les balises HTML

        $words = explode(' ', $content); // Sépare les mots

        if (count($words) > $limit) {

            $excerpt = implode(' ', array_slice($words, 0, $limit)) . '...';

        } else {

            $excerpt = $content;

        }

        return $excerpt;
    }

    public function stripTags($post_content){

        $content = strip_tags($post_content); 

        return $content;

    }

    
    public function storePublicitesFirst(Request $request, $slug){

        if(auth()->user()->role_id === 1){

            $datas = $request->all();

            $validator = Validator::make($datas, [
                'title' => ['required','string', 'unique:publications'],
                 
            ],[
                'required' => 'Votre :attribute est obligatoire.',
                'title.unique' => 'Ce :attribute est déjà enregistré.',
            ], [
                'title' => 'titre de la publication',

            ]);

            if ($validator->fails()) {

                return $this->sendResponse(['errors'=> $validator->errors(), 'status' => 401],'Erreur de validation');

            }

            $typePublicationCount = TypePublication::where('slug', $slug)->count();

            if($typePublicationCount === 0){

                return $this->sendResponse(['status' => 422], 'Aucun type de publication n\'est enregistré.');

            }else{

                $typePublication = TypePublication::where('slug', $slug)->first();

                $typePublication->count_publications += 1;

                $typePublication->update();

                $datas['type_publication_id'] = $typePublication->id;

                $datas['type_publication_name'] = $typePublication->name;

                $datas['type_publication_slug'] = $typePublication->slug;

                $datas['user_id'] = auth()->user()->id;

                $datas['is_pub'] = true;

                $datas['is_article'] = false;

                $datas['presently'] = 1;

                $datas['title'] = $this->str_replace_all('<p>', '<span>', $this->str_replace_all('</p>', '</span>', $datas['title'])) ;

                $datas['slug'] = Str::slug($this->stripTags($datas['title']));

                $datas['title_truncate'] = $this->getExcerpt(10, $datas['title']);

                $date = Carbon::parse(now());

                $mois_id = $date->format('m');

                $year = $date->format('Y');

                $mois = InfosMonthYear::where('month_id', $mois_id)->first();

                $date_name = $mois->month.' '.$year;

                $datas['date_name'] =  $date_name;

                $verify_date_name = InfosMonthYearPublication::where('date_name', $date_name)->first();

                if(!$verify_date_name){

                    InfosMonthYearPublication::create(['date_name' => $date_name]);

                }

                $publicationCreateData =  Publication::create($datas);

                if($publicationCreateData){

                    return $this->sendResponse(['publicationCreateData' => $publicationCreateData, 'status' => 200], 'Première étape enregistrée.');

                }else{

                    return $this->sendResponse(['status' => 422], 'Impossible d\'enregistrer cette publication.');

                }

            }


        }else{

            return $this->sendResponse(['status' => 422], 'Vous n\'êtes pas autorisé à acceder à ses données .');

        }

    }

    public function updatePublicitesFirst(Request $request, $slug, $publication_slug){

        if(auth()->user()->role_id === 1){

            $datas = $request->all();

            $validator = Validator::make($datas, [
                'title' => ['required','string', 'unique:publications'],                 
            ],[
                'required' => 'Votre :attribute est obligatoire.',
                'title.unique' => 'Ce :attribute est déjà enregistré.',
            ], [
                'title' => 'titre de la publication', 
            ]);

            if ($validator->fails()) {

                return $this->sendResponse(['errors'=> $validator->errors(), 'status' => 401],'Erreur de validation');

            }

            $typePublicationCount = TypePublication::where('slug', $slug)->count();

            if($typePublicationCount === 0){

                return $this->sendResponse(['status' => 422], 'Aucun type de publication n\'est enregistré.');

            }else{

                $typePublication = TypePublication::where('slug', $slug)->first(); 

                $publications  = Publication::where('slug', $publication_slug)->where('type_publication_id', $typePublication->id)->get();

                if($publications){

                    foreach($publications as $publication){ 

                        $publication->user_id  = auth()->user()->id;

                        $publication->presently  = 1;

                        $datas['title'] = $this->str_replace_all('<p>', '<span>', $this->str_replace_all('</p>', '</span>', $datas['title'])) ;

                        $publication->title =  $datas['title'];

                        $publication->link_publicites =  $datas['link_publicites'];

                        $publication->slug = Str::slug($this->stripTags($datas['title']));

                        $publication->title_truncate  = $this->getExcerpt(10, $datas['title']);

                        $date = Carbon::parse(now());

                        $mois_id = $date->format('m');

                        $year = $date->format('Y');

                        $mois = InfosMonthYear::where('month_id', $mois_id)->first();

                        $date_name = $mois->month.' '.$year;

                        $publication->date_name =  $date_name;

                        $verify_date_name = InfosMonthYearPublication::where('date_name', $date_name)->first();

                        if(!$verify_date_name){

                            InfosMonthYearPublication::create(['date_name' => $date_name]);

                        }

                        $publicationCreateData =  $publication->update();
                    }
                }

                if($publicationCreateData){

                    return $this->sendResponse(['publicationCreateData' => ['slug' => Str::slug($this->getExcerpt(10, $datas['title']))] , 'status' => 200], 'Première étape modifiée.');

                }else{

                    return $this->sendResponse(['status' => 422], 'Impossible de modifier cette publication.');

                }


            }

        }else{

            return $this->sendResponse(['status' => 422], 'Vous n\'êtes pas autorisé à acceder à ses données .');

        }

    }

    public function storePublicitesThree(Request $request, $slug, $publication_slug){

        if(auth()->user()->role_id === 1){

            $datas = $request->all(); 

            $typePublicationCount = TypePublication::where('slug', $slug)->count();

            if($typePublicationCount === 0){

                return $this->sendResponse(['status' => 422], 'Aucun type de publication n\'est enregistré.');

            }else{

                if($publication_slug != "null"){

                    $typePublication = TypePublication::where('slug', $slug)->first(); 

                    $publications  = Publication::where('slug', $publication_slug)->where('type_publication_id', $typePublication->id)->get();

                    if($datas['date_publish'] <= now()){

                        return $this->sendResponse(['status' => 422], 'Veuillez bien revoir votre date de debut de publication .');

                    }else{

                        if($datas['date_publish_end'] <= now()){

                            return $this->sendResponse(['status' => 422], 'Veuillez bien revoir votre date de fin de publication .');

                        }else{

                            if($datas['date_publish_end'] <= $datas['date_publish']){

                                return $this->sendResponse(['status' => 422], 'Votre date de fin de publication ne peut être antérieure à la date de debut de publication ');

                            }else{
                    
                                if($publications){

                                    foreach($publications as $publication){ 

                                        $publication->user_id  = auth()->user()->id;

                                        $publication->presently  = 1;

                                        $publication->entete_site =  $datas['entete_site'];

                                        $publication->dans_les_contenus =  $datas['dans_les_contenus'];

                                        $publication->toutes_les_pages =  $datas['toutes_les_pages'];

                                        $publication->entre_publications =  $datas['entre_publications'];

                                        $publication->status =  $datas['status'];
                                        
                                        $publication->date_publish =  $datas['date_publish'];

                                        $publication->date_publish_end =  $datas['date_publish_end'];

                                        $date = Carbon::parse(now());

                                        $mois_id = $date->format('m');

                                        $year = $date->format('Y');

                                        $mois = InfosMonthYear::where('month_id', $mois_id)->first();

                                        $date_name = $mois->month.' '.$year;

                                        $publication->date_name =  $date_name;

                                        $verify_date_name = InfosMonthYearPublication::where('date_name', $date_name)->first();

                                        if(!$verify_date_name){

                                            InfosMonthYearPublication::create(['date_name' => $date_name]);

                                        }

                                        $publicationCreateData =  $publication->update();
                                    }

                                    if($publicationCreateData){

                                        return $this->sendResponse(['publicationCreateData' => ['slug' => Str::slug($this->getExcerpt(10, $datas['title']))] , 'status' => 200], 'Quatrième étape validée.');
    
                                    }else{
    
                                        return $this->sendResponse(['status' => 422], 'Impossible de modifier cette publication.');
    
                                    }
                                }else{
                                    return $this->sendResponse(['errors'=> [ ], 'status' => 401],'Veuillez d\'abord valider les infos de la première étape');

                                }

                                
                            }
                        }
                    }

                }else{

                    return $this->sendResponse(['errors'=> [ ], 'status' => 401],'Veuillez d\'abord valider les infos de la première étape');

                }
 
            }

        }else{

            return $this->sendResponse(['status' => 422], 'Vous n\'êtes pas autorisé à acceder à ses données .');

        }

    }

    public function updatePublicitesThree(Request $request, $slug, $publication_slug){

        if(auth()->user()->role_id === 1){

            $datas = $request->all(); 

            $typePublicationCount = TypePublication::where('slug', $slug)->count();

            if($typePublicationCount === 0){

                return $this->sendResponse(['status' => 422], 'Aucun type de publication n\'est enregistré.');

            }else{

                if($publication_slug != "null"){

                    $typePublication = TypePublication::where('slug', $slug)->first(); 

                    $publications  = Publication::where('slug', $publication_slug)->where('type_publication_id', $typePublication->id)->get();

                    if($datas['date_publish'] <= now()){

                        return $this->sendResponse(['status' => 422], 'Veuillez bien revoir votre date de debut de publication .');

                    }else{

                        if($datas['date_publish_end'] <= now()){

                            return $this->sendResponse(['status' => 422], 'Veuillez bien revoir votre date de fin de publication .');

                        }else{

                            if($datas['date_publish_end'] <= $datas['date_publish']){

                                return $this->sendResponse(['status' => 422], 'Votre date de fin de publication ne peut être antérieure à la date de debut de publication ');

                            }else{
                    
                                if($publications){

                                    foreach($publications as $publication){ 

                                        $publication->user_id  = auth()->user()->id;

                                        $publication->presently  = 1;

                                        $publication->entete_site =  $datas['entete_site'];

                                        $publication->dans_les_contenus =  $datas['dans_les_contenus'];

                                        $publication->toutes_les_pages =  $datas['toutes_les_pages'];

                                        $publication->entre_publications =  $datas['entre_publications'];

                                        $publication->status =  $datas['status'];
                                        
                                        $publication->date_publish =  $datas['date_publish'];

                                        $publication->date_publish_end =  $datas['date_publish_end'];

                                        $date = Carbon::parse(now());

                                        $mois_id = $date->format('m');

                                        $year = $date->format('Y');

                                        $mois = InfosMonthYear::where('month_id', $mois_id)->first();

                                        $date_name = $mois->month.' '.$year;

                                        $publication->date_name =  $date_name;

                                        $verify_date_name = InfosMonthYearPublication::where('date_name', $date_name)->first();

                                        if(!$verify_date_name){

                                            InfosMonthYearPublication::create(['date_name' => $date_name]);

                                        }

                                        $publicationCreateData =  $publication->update();
                                    }

                                    if($publicationCreateData){

                                        return $this->sendResponse(['publicationCreateData' => ['slug' => Str::slug($this->getExcerpt(10, $datas['title']))] , 'status' => 200], 'Quatrième étape modifiée.');
    
                                    }else{
    
                                        return $this->sendResponse(['status' => 422], 'Impossible de modifier cette publication.');
    
                                    }
                                }else{
                                    return $this->sendResponse(['errors'=> [ ], 'status' => 401],'Veuillez d\'abord valider les infos de la première étape');

                                }

                                
                            }
                        }
                    }

                }else{

                    return $this->sendResponse(['errors'=> [ ], 'status' => 401],'Veuillez d\'abord valider les infos de la première étape');

                }
 
            }

        }else{

            return $this->sendResponse(['status' => 422], 'Vous n\'êtes pas autorisé à acceder à ses données .');

        }

    }

}
