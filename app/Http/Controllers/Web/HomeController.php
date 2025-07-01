<?php

namespace App\Http\Controllers\Web;

use App\Enums\PostStatuses;
use App\Enums\PostType;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class HomeController extends Controller
{
    public function index(): Factory|View|Application
    {
        $posts = Post::query()->whereStatus(PostStatuses::PUBLISHED)
            ->whereType(PostType::NEWS)->orderByDesc('created_at')->get()->take(6);

        return view('website.home')->with(compact(['posts']));
    }
}
