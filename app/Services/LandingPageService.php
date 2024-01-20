<?php

namespace App\Services;

use App\Models\LandingPage;
use Illuminate\Support\Collection;

/**
 * Class LandingPageService.
 */
class LandingPageService
{
    /**
     * @return Collection<LandingPage>
     */
    public function getAllLandingPages(): Collection
    {
        return LandingPage::query()->get();
    }

    public function findLandingPage(string $slug): LandingPage
    {
        return LandingPage::query()->where('slug', $slug)->firstOrFail();
    }
}
