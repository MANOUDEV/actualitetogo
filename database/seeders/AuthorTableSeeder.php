<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class AuthorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                'nom' => 'DENANYOH',
                'prenoms' => 'Alexandre',
                'nom_complet' => 'DENANYOH Alexandre',
                'email' => 'nonojack@yahoo.fr',
                'telephone' => '+33 6 27 38 75 14',
                'authorName' => 'Info news 228',
                'slug' => 'info-du-pays',
                'wp_author_id' => 1,
                'date_publish' =>  now(),
                'description' => "<p>
                    Nous tenons à rappeler aux visiteurs du site que
                    sans partenariat avec togoactualite.com, la reprise des articles même partielle est strictement interdite.
                    Tout contrevenant s'expose à de graves poursuites.
                </p>"
            ], // 1
            [
                'nom' => 'MIKANDO',
                'prenoms' => 'Eric',
                'nom_complet' => 'MIKANDO Eric',
                'email' => 'ericmakondo@gmail.com',
                'telephone' => '+228 91 91 91 91',
                'authorName' => 'Togo infos',
                'slug' => 'dutogoactu',
                'wp_author_id' => 10,
                'date_publish' =>  now(),
                'description' => "<p>
                    Nous tenons à rappeler aux visiteurs du site que
                    sans partenariat avec togoactualite.com, la reprise des articles même partielle est strictement interdite.
                    Tout contrevenant s'expose à de graves poursuites.
                </p>"
            ], // 0
        ];

        foreach ($datas as $data){

            Author::create($data);

            if (Storage::disk('public')->exists('sitemap_authors.xml')) {

                $content = Storage::disk('public')->get('sitemap_authors.xml');
                
                // Chaîne après laquelle insérer du contenu
                $search = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
                
                // Nouveau contenu à insérer
                $newContent = '
    <url>    
        <loc>https://actualitetogo.com/authors/'.$data['slug'].'</loc>
        <lastmod>2024-09-11</lastmod>
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
                    Storage::disk('public')->put('sitemap_authors.xml', $updatedContent);
                    
                }
     
            }else{

            
                // Créer un contenu
                $content = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>    
        <loc>https://actualitetogo.com/authors/'.$data['slug'].'</loc>
        <lastmod>2024-09-11</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
</urlset>';
            
            // Créer un fichier dans le disque public (par défaut dans storage/app)
            Storage::disk('public')->put('sitemap_authors.xml', $content);

            }

        }
    }
}
