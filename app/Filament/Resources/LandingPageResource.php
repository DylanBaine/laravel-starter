<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LandingPageResource\Pages;
use App\Models\LandingPage;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
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
                    ->required(),
                Builder::make('content_blocks')
                    ->label('Content')
                    ->columnSpan(2)
                    ->blocks([
                        Block::make('Rich Editor')
                            ->schema([
                                RichEditor::make('html')
                                    ->label(''),
                            ]),
                        Block::make('text_next_to_image')
                            ->columns(2)
                            ->schema([
                                Section::make('')
                                    ->schema([
                                        RichEditor::make('text'),
                                    ])->columnSpan(1),
                                Section::make('')
                                    ->schema([
                                        TextInput::make('image_url'),
                                        TextInput::make('image_description'),
                                    ])->columnSpan(1),
                            ]),
                        Block::make('image_next_to_text')
                            ->columns(2)
                            ->schema([
                                Section::make('')
                                    ->schema([
                                        TextInput::make('image_url'),
                                        TextInput::make('image_description'),
                                    ])->columnSpan(1),
                                Section::make('')
                                    ->schema([
                                        RichEditor::make('text'),
                                    ])->columnSpan(1),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
