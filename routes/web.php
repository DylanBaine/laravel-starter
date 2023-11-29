<?php

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
        'readme' => $markdownRenderer->toHtml(file_get_contents(base_path('README.md')))
    ]);
});
