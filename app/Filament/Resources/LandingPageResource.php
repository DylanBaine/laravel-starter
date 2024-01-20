<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LandingPageResource\Pages;
use App\Models\LandingPage;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
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
                    ->required(),
                Builder::make('content_blocks')
                    ->label('Content')
                    ->columnSpan(2)
                    ->blocks([
                        Block::make('hero')
                            ->columns(1)
                            ->schema([
                                FileUpload::make('hero_image')
                                    ->image()
                                    ->imageEditor(),
                                Select::make('layout')->options([
                                    'image_left' => 'Image Left',
                                    'image_right' => 'Image Right',
                                    'image_above' => 'Image Above',
                                    'image_background' => 'Background Image',
                                ]),
                                TextInput::make('h1'),
                                Textarea::make('paragraph'),
                                Toggle::make('show_cta'),
                            ]),
                        Block::make('rich_editor')
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
                                        FileUpload::make('image_url')
                                            ->image()
                                            ->imageEditor(),
                                        TextInput::make('image_description'),
                                    ])->columnSpan(1),
                            ]),
                        Block::make('image_next_to_text')
                            ->columns(2)
                            ->schema([
                                Section::make('')
                                    ->schema([
                                        FileUpload::make('image_url')
                                            ->image()
                                            ->imageEditor(),
                                        TextInput::make('image_description'),
                                    ])->columnSpan(1),
                                Section::make('')
                                    ->schema([
                                        RichEditor::make('text'),
                                    ])->columnSpan(1),
                            ]),
                        Block::make('call_to_action')
                            ->schema([
                                TextInput::make('text'),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('slug'),
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
