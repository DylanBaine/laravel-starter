<?php

namespace App\Services;

use App\Models\BlogPost;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Class BlogPostService.
 */
class BlogPostService
{
    public function getPaginatedPosts(int $perPage = null, int $page = null): LengthAwarePaginator
    {
        return BlogPost::query()->paginate($perPage, ['*'], 'page', $page);
    }

    public function findBySlug(string $slug): BlogPost
    {
        return BlogPost::query()->where('slug', $slug)->firstOrFail();
    }
}
