<?php

namespace App\Repositories\Eloquent;

use App\Models\BlogPost;
use App\Repositories\BlogPostRepositoryInterface;
use TimWassenburg\RepositoryGenerator\Repository\BaseRepository;

class BlogPostRepository extends BaseRepository implements BlogPostRepositoryInterface
{
    public function __construct(BlogPost $model)
    {
        parent::__construct($model);
    }
}
