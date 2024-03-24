<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically Generate an XML Sitemap';

    /**
     * Execute the console command.
     *
     * @return int
     */

    public function handle()
    {
        $postsitmap = Sitemap::create();

        $postsitmap->add(Url::create('/welcome')
            ->setLastModificationDate(Carbon::yesterday())
            ->setChangeFrequency('daily')
            ->setPriority(0.1));

        $postsitmap->add(Url::create('/news/about-us')
            ->setLastModificationDate(Carbon::yesterday())
            ->setChangeFrequency('daily'));

        $postsitmap->add(Url::create('/news/advert')
            ->setLastModificationDate(Carbon::yesterday())
            ->setChangeFrequency('daily'));

        $postsitmap->add(Url::create('/news/all-post')
            ->setLastModificationDate(Carbon::yesterday())
            ->setChangeFrequency('daily'));

        $postsitmap->add(Url::create('/news/categories')
            ->setLastModificationDate(Carbon::yesterday())
            ->setChangeFrequency('daily'));
        $postsitmap->add(Url::create('/news/contact')
            ->setLastModificationDate(Carbon::yesterday())
            ->setChangeFrequency('daily'));

        Post::get()->each(function (Post $post) use ($postsitmap) {
            $postsitmap->add(
                Url::create("/news/post/{$post->slug}")
                    ->setPriority(0.9)
                    ->setChangeFrequency('monthly')
            );
        });

        Category::get()->each(function (Category $Category) use ($postsitmap) {
            $postsitmap->add(
                Url::create("/news/category/{$Category->slug}")
                    ->setPriority(0.9)
                    ->setChangeFrequency('monthly')
            );
        });

        $postsitmap->writeToFile(public_path('sitemap.xml'));
    }
}
