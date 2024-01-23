<?php

namespace App\Filament\Pages;

use App\Models\LandingPage;
use Illuminate\Support\Collection;
use Mokhosh\FilamentKanban\Pages\KanbanBoard;

// https://github.com/mokhosh/filament-kanban
class LandingPagesKanbanBoard extends KanbanBoard
{
    protected static string $recordTitleAttribute = 'name';

    protected static string $recordStatusAttribute = 'status';

    protected function statuses(): Collection
    {
        return collect([
            [
                'id' => 'draft',
                'title' => 'Draft',
            ],
            [
                'id' => 'reviewing',
                'title' => 'Reviewing',
            ],
            [
                'id' => 'published',
                'title' => 'Published',
            ],
        ]);
    }

    protected function records(): Collection
    {
        return LandingPage::latest('updated_at')->get();
    }

    public function onStatusChanged(int $recordId, string $status, array $fromOrderedIds, array $toOrderedIds): void
    {
        LandingPage::find($recordId)->update(['status' => $status]);
    }

    public function recordClicked(int $recordId, array $data): void
    {
        $this->redirect(route('filament.admin.resources.landing-pages.edit', $recordId));
    }
}
