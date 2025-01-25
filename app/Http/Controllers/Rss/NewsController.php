<?php

namespace App\Http\Controllers\Rss;

use Illuminate\Http\Request;
use App\Services\RssFeedService;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    protected $rssFeedService;

    public function __construct(RssFeedService $rssFeedService)
    {
        $this->rssFeedService = $rssFeedService;
    }

    public function index()
    {
        $articles = $this->rssFeedService->fetchArticles('https://feed.laravel-news.com/');

        return view('news.index', compact('articles'));
    }
}
