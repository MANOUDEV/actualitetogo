<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::get("https://www.togoactualite.com/wp-json/wp/v2/categories?per_page=100");

        $categories_count_by_type = [
            'x-wp-totalpages' => $response->getHeader('x-wp-totalpages')[0],
            'x-wp-total' => $response->getHeader('x-wp-total')[0],
        ];

        for($i = 1; $i <= $categories_count_by_type['x-wp-totalpages']; $i++){

            $categories = Http::get("https://www.togoactualite.com/wp-json/wp/v2/categories?per_page=100&page=$i")->json();
            
            foreach( $categories as $result )
            {
                
                $categories =  Category::create([
                    'name' =>  $result['name'],
                    'slug' => $result['slug'],
                    'count_publications' => 0,
                    'date_publish' =>  now(),
                    'wp_category_id' => intval($result['id']),
                    'user_id' => 1
                ]);      

                
            
                if (Storage::disk('public')->exists('sitemap_categories.xml')) {
                    $content = Storage::disk('public')->get('sitemap_categories.xml');
                    
                    // Chaîne après laquelle insérer du contenu
                    $search = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
                    
                    // Nouveau contenu à insérer
                    $newContent = '
    <url>    
        <loc>https://actualitetogo.com/'.$result['slug'].'</loc>
        <lastmod>2024-09-25</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>';
                    
                    // Trouver la position de la chaîne spécifique
                    $position = strpos($content, $search);
                    
                    // Si le mot est trouvé
                    if ($position !== false) {
                        $position += strlen($search);
                        // Insérer le nouveau contenu
                        $updatedContent = substr($content, 0, $position) . $newContent . substr($content, $position);
                        
                        // Réécrire le fichier avec le contenu mis à jour
                        Storage::disk('public')->put('sitemap_categories.xml', $updatedContent);
                        
                    }
         
                }else{

                    
                    // Créer un contenu
                    $content = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>    
        <loc>https://actualitetogo.com/'.$result['slug'].'</loc>
        <lastmod>2024-09-25</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    
</urlset>';
                
                // Créer un fichier dans le disque public (par défaut dans storage/app)
                Storage::disk('public')->put('sitemap_categories.xml', $content);

                }

            }
        }
    }
}
