<?php

use Illuminate\Database\Seeder;
use App\Article;

class ArticleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::truncate();

        Article::create([
            'article_number_intern' => 'F01000',
            'article_number_customer' => '256887562',
            'article_index' => '02',
            'name' => 'G-Profil',
            'drawing_number' => '256887562',
            'drawing_index' => '02',
            'profil_number' => '901',
            'customer_id' => '2'
        ]);
    }
}
