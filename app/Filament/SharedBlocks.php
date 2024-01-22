<?php

namespace App\Filament;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

class SharedBlocks
{
    public static function quote()
    {
        return Block::make('quote')
            ->schema([
                TextInput::make('name'),
                FileUpload::make('image')
                    ->image()
                    ->imageEditor(),
                RichEditor::make('content'),
            ]);
    }

    public static function callToAction()
    {
        return Block::make('call_to_action')
            ->schema([
                TextInput::make('text'),
            ]);
    }

    public static function imageNextToText()
    {
        return Block::make('image_next_to_text')
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
            ]);
    }

    public static function textNextToImage()
    {
        return Block::make('text_next_to_image')
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
            ]);
    }

    public static function richEditor()
    {
        return Block::make('rich_editor')
            ->schema([
                RichEditor::make('html')
                    ->label(''),
            ]);
    }

    public static function hero()
    {
        return Block::make('hero')
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
            ]);
    }
}
