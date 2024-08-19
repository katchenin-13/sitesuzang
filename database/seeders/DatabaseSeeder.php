<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Atout;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Contenu;
use App\Models\Employer;
use App\Models\Filiale;
use App\Models\Image;
use App\Models\Newletter;
use App\Models\Permission;
use App\Models\Post;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::factory(10)->create();
        // Contenu::factory(10)->create();
        // Image::factory(20)->create();
        // Contact::factory(20)->create();
        // Newletter::factory(20)->create();
        // Service::factory(20)->create();
        // Post::factory(10)->create();
        // Client::factory(8)->create();
        // Atout::factory(4)->create();
        // Filiale::factory(4)->create();
        $this->call(RoleTableSeeder::class);
        // $this->call(PermissionTableSeeder::class);
        
        // User::find(1)->roles()->attach(1);
        // User::find(2)->roles()->attach(2);
        // User::find(3)->roles()->attach(3);
    }
}
