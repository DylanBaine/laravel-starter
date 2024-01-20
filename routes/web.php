<?php

use App\Services\BlogPostService;
use App\Services\LandingPageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\LaravelMarkdown\MarkdownRenderer;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function (MarkdownRenderer $markdownRenderer) {
    return view('welcome', [
        'readme' => cache()
            ->remember('welcome-readme', 2, fn () => $markdownRenderer->toHtml(file_get_contents(base_path('README.md')))),
    ]);
});

Route::get('{slug}', function (string $slug, LandingPageService $landingPageService) {
    return view('landing-page', [
        'page' => $landingPageService->findLandingPage($slug),
    ]);
});

Route::get('/blog', function (Request $request, BlogPostService $blogPostService) {
    return view('blog-list', [
        'posts' => $blogPostService->getPaginatedPosts($request->perPage ?? 12, $request->page ?? 1),
    ]);
});
