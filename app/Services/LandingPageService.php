<?php

namespace App\Services;

use App\Models\LandingPage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

/**
 * Class LandingPageService.
 */
class LandingPageService
{
    protected function published(): Builder
    {
        return LandingPage::query()->whereStatus('published');
    }

    /**
     * @return Collection<LandingPage>
     */
    public function getAllLandingPages(): Collection
    {
        return $this->published()->get();
    }

    public function findLandingPage(string $slug): LandingPage
    {
        return $this->published()->where('slug', $slug)->firstOrFail();
    }
}
