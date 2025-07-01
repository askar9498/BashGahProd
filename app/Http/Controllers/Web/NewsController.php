<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class NewsController extends Controller
{
    public function show($slug): Factory|View|Application
    {
        /** @var Post $post */
        $post = Post::query()->with(['category', 'image'])->whereSlug($slug)->first();

        if (!$post) {
            $post = Post::query()->with(['category', 'image'])->whereSlug($slug)->firstOrFail();
        }

        $related_posts = Post::query()->with(['category', 'image'])->whereCategoryId($post->category_id)->orderByDesc('created_at')->get()->take(3);

        $latest_posts = Post::query()->with(['category', 'image'])->orderByDesc('created_at')->get()->take(2);

        return view('website.news.single')->with(compact(['post', 'related_posts','latest_posts']));
    }
}
