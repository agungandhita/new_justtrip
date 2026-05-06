<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\News\NewsInterface;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ArticleController extends Controller
{
    public function __construct(private NewsInterface $newsService) {}

    public function index(Request $request): Response
    {
        $articles = $this->newsService->getArticles($request->only(['kategori', 'search']));

        return Inertia::render('Frontend/Artikel/Index', [
            'articles' => $articles,
            'filters'  => $request->only(['kategori', 'search']),
        ]);
    }

    public function show(string $slug): Response
    {
        $article = $this->newsService->getArticle($slug);
        $related  = $this->newsService->getRelated($article->id, 3);

        return Inertia::render('Frontend/Artikel/Show', compact('article', 'related'));
    }
}
