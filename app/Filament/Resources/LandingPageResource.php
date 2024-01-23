<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LandingPageResource\Pages;
use App\Filament\SharedBlocks;
use App\Models\LandingPage;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class LandingPageResource extends Resource
{
    protected static ?string $model = LandingPage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function isEditing($form)
    {
        return $form->model && ! is_string($form->model);
    }

    public static function form(Form $form): Form
    {
        $editing = static::isEditing($form);

        return $form
            ->schema([
                TextInput::make('name')
                    ->live(debounce: 500)
                    ->required()
                    ->afterStateUpdated(function ($set, ?string $state) use ($editing) {
                        if ($state) {
                            if (! $editing) {
                                $set('slug', str($state)->slug());
                            }
                            $set('name', str($state)->title());
                        }
                    }),
                TextInput::make('slug')
                    ->readOnly($editing)
                    ->suffixAction(
                        Action::make('preview')
                            ->icon('heroicon-o-link')
                            ->url(function ($state) {
                                return $state ? url($state) : '/_preview';
                            }, true)
                    )
                    ->required(),
                Select::make('status')->options([
                    'draft' => 'Draft',
                    'reviewing' => 'Reviewing',
                    'published' => 'Published',
                ]),
                Builder::make('content_blocks')
                    ->label('Content')
                    ->columnSpan(2)
                    ->blocks([
                        SharedBlocks::hero(),
                        SharedBlocks::richEditor(),
                        SharedBlocks::textNextToImage(),
                        SharedBlocks::imageNextToText(),
                        SharedBlocks::callToAction(),
                        SharedBlocks::quote(),
                        SharedBlocks::row(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->contentGrid([
                'md' => 3,
            ])
            ->columns([
                Stack::make([
                    TextColumn::make('name'),
                    TextColumn::make('slug'),
                ]),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLandingPages::route('/'),
            'create' => Pages\CreateLandingPage::route('/create'),
            'edit' => Pages\EditLandingPage::route('/{record}/edit'),
        ];
    }
}
