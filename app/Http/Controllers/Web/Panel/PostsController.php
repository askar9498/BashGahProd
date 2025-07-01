<?php

namespace App\Http\Controllers\Web\Panel;

use App\Enums\PostStatuses;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function App\Http\Controllers\Web\view;

class PostsController extends Controller
{
    public function index(Request $params): Factory|View|Application
    {
        $news = Post::whereStatus(PostStatuses::PUBLISHED)->with('image');
        DB::connection()->enableQueryLog();
        if (!empty($params['search'])) {
            $news = $news->where('title', 'like', '%' . $params['search'] . '%');
            $news = $news->OrWhere('description', 'like', '%' . $params['search'] . '%');
        }
        return view('panels.user.news.index')->with([
            'title' => 'اطلاعیه و اخبار',
            'news' => $news->orderByDesc('created_at')->paginate(10)
        ]);
    }

    public function show(Post $news): Factory|View|Application
    {
        return view('panels.user.news.show')
            ->with(['title' => 'اطلاعیه و اخبار', 'news' => $news]);
    }
}
