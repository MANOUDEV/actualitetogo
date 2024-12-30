<?php

namespace App\Http\Controllers\Api\Web\Frontoffice;
use App\Http\Controllers\Api\BaseController;
use App\Models\Publication; 
use App\Models\Author;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 


class OneSlugController extends BaseController
{
    public function slug(Request $request, $slug){

       
        if ($slug === 'all-category') {

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

            $articles_count = Publication::where('status', 1)->where("publications.type_publication_id", 1)->count();

            if($articles_count === 0){
     
                return view('errors.HomePageControlEmpty');
    
            }else{

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
            }
        }else{

                $category = Category::where('slug', $slug)->first();

                $article = Publication::where('slug', $slug)->where("status", 1)->first();

                if (($category == null) && ( $article == null)) {

                    return view('errors.ErrorSlugPage');

                }elseif(($category !== null) && ( $article == null)) {

                    $articles_count = Publication::where('status', 1)->where("publications.type_publication_id", 1)->count();

                    if($articles_count === 0){
             
                        return view('errors.HomePageControlEmpty');
            
                    }else{
 
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

                        return view('oneSlugPage.category', ['articles' => $articles, 'alireaussi' => $alireaussi, 'category' => $category, 'otherCategory' => $otherCategory]);
                    }

                }else{

                    return view('errors.ErrorSlugPage');
                }
            }

    }

    public function tags($slug)
    {


        $articles_count = Publication::where('status', 1)->where("publications.type_publication_id", 1)->count();

        if($articles_count === 0){

            return view('errors.HomePageControlEmpty');

        }else{

            $tag = Tag::where('slug', $slug)->first();

            if ($tag == null) {

                return view('errors.ErrorSlugPage');

            } else {
 
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

            return view('errors.HomePageControlEmpty');

        }else{

            $author = Author::where('slug', $slug)->first();

            if ($author == null) {

                return view('errors.ErrorSlugPage');

            } else {

 
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
