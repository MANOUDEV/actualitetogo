<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users =[
            [
                'nom' => 'DENANYOH',
                'nom_complet' => 'Alexandre DENANYOH',
                'prenoms' => 'Alexandre',
                'telephone' => '+33 6 27 38 75 14',
                'author_id' => 1,
                'username' => 'MawuwonamTG',
                'slug' => Str::slug('MawuwonamTG'),
                'role_id' => 1,
                'status' => 1,
                'email' => 'nonojack@yahoo.fr',
                'password' =>  Hash::make('040567Ionos'),
            ],

            [
                'nom' => 'MIKANDO',
                'prenoms' => 'Eric',
                'nom_complet' => 'Eric MIKANDO',
                'telephone' => '+228 91 91 91 91',
                'author_id' => 2,
                'username' => 'delomepub',
                'slug' => Str::slug('delomepub'),
                'role_id' => 2,
                'status' => 1,
                'email' => 'ericmakondo@gmail.com',
                'password' =>  Hash::make('delomepub92'),
            ],
        ];

        foreach ($users as $user) {

           User::create($user);

        }
     // Créer un contenu
     $content = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>    
        <loc>https://actualitetogo.com/</loc>
        <lastmod>2024-09-11</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>    
        <loc>https://actualitetogo.com/about</loc>
        <lastmod>2024-09-11</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url> 
    <url>    
        <loc>https://actualitetogo.com/contact</loc>
        <lastmod>2024-09-11</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>    
        <loc>https://actualitetogo.com/infos-pratiques</loc>
        <lastmod>2024-09-11</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>    
        <loc>https://actualitetogo.com/forum</loc>
        <lastmod>2024-09-11</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>    
        <loc>https://actualitetogo.com/videos</loc>
        <lastmod>2024-09-11</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>    
        <loc>https://actualitetogo.com/events</loc>
        <lastmod>2024-09-11</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>    
        <loc>https://actualitetogo.com/pub</loc>
        <lastmod>2024-09-11</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>    
        <loc>https://actualitetogo.com/all-categories</loc>
        <lastmod>2024-09-11</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>    
        <loc>https://actualitetogo.com/search-article</loc>
        <lastmod>2024-09-11</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
</urlset>';
    
        // Créer un fichier dans le disque public (par défaut dans storage/app)
        Storage::disk('public')->put('sitemap.xml', $content);
        
    }
}