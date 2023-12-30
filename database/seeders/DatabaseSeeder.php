<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use \App\Models\User;
use \App\Models\Follow;
use \App\Models\News;
use \App\Models\Comment;
use \App\Models\FaqCategory;
use \App\Models\Faq;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Seeder for users
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@ehb.be',
            'password' => Hash::make('Password!321'),
            'birthday' => '1999-01-01',
            'profile_photo_path' => 'images/avatars/admin.png',
            'is_admin' => true,
            'bio' => 'I am the admin of this website.',
        ]);
        for ($i=1; $i < 11; $i++) { 
            User::factory()->create([
                'name' => 'User'.$i,
                'email' => 'user'.$i.'@ehb.be',
                'password' => Hash::make('Password!321'),
                'birthday' => '2000-01-01',
            ]);
        }

        // Seeder for follows
        for ($i=1; $i < 12; $i++) { 
            for ($j=1; $j < 4; $j++) { 
                $k = rand(1, 11);
                if ($i != $k) {
                    Follow::factory()->create([
                        'follower_id' => $i,
                        'following_id' => $k,
                    ]);
                }
            }
        }

        // Seeder for news
        for ($i=1; $i < 6; $i++) { 
            News::factory()->create([
                'title' => 'News Title '.$i,
                'body' => file_get_contents('http://loripsum.net/api/short/plaintext'),
                'cover_photo_path' => 'images/covers/placeholder.png',
            ]);
        }

        // Seeder for comments
        for ($i=1; $i < 16; $i++) { 
            Comment::factory()->create([
                'body' => 'Comment '.$i,
            ]);
            
        }

        // Seeder for faq categories
        for ($i=1; $i < 4; $i++) { 
            FaqCategory::factory()->create([
                'name' => 'FAQ Category '.$i,
            ]);
        }

        // Seeder for faqs
        for ($i=1; $i < 10; $i++) { 
            Faq::factory()->create([
                'question' => 'FAQ Question '.$i,
                'answer' => file_get_contents('http://loripsum.net/api/short/plaintext'),
                'faq_category_id' => rand(1, 3),
            ]);
        }
    }
}
