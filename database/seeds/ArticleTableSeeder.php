<?php

use Illuminate\Database\Seeder;
use App\Article;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
       DB::table('data')->truncate();
       Article::unguard();
       factory(Article::class, 50)->create();
       Article::reguard();
    }
}
