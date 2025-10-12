<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ColorGradingResource\Pages;
use App\Models\ColorGrading;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ColorGradingResource extends Resource
{
    protected static ?string $model = ColorGrading::class;

    protected static ?string $navigationIcon = 'heroicon-o-swatch';

    protected static ?string $navigationGroup = 'Content';

    protected static ?int $navigationSort = 6;

    protected static ?string $navigationLabel = 'Color Grading';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('English Content')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->label('Title'),
                        Forms\Components\Textarea::make('description')
                            ->rows(3)
                            ->label('Description'),
                    ]),

                Forms\Components\Section::make('Arabic Content')
                    ->schema([
                        Forms\Components\TextInput::make('title_ar')
                            ->label('Title (Arabic)')
                            ->maxLength(255),
                        Forms\Components\Textarea::make('description_ar')
                            ->label('Description (Arabic)')
                            ->rows(3),
                    ])
                    ->collapsed(),

                Forms\Components\Section::make('Images')
                    ->description('Upload before and after color grading images')
                    ->schema([
                        Forms\Components\FileUpload::make('before_image')
                            ->label('Before Image (Original)')
                            ->image()
                            ->directory('color-grading/before')
                            ->required()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                null,
                                '16:9',
                                '4:3',
                                '1:1',
                            ]),
                        Forms\Components\FileUpload::make('after_image')
                            ->label('After Image (Color Graded)')
                            ->image()
                            ->directory('color-grading/after')
                            ->required()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                null,
                                '16:9',
                                '4:3',
                                '1:1',
                            ]),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Settings')
                    ->schema([
                        Forms\Components\TextInput::make('order')
                            ->numeric()
                            ->default(0)
                            ->required()
                            ->label('Display Order'),
                        Forms\Components\Toggle::make('is_active')
                            ->default(true)
                            ->required()
                            ->label('Active'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('before_image')
                    ->label('Before')
                    ->square(),
                Tables\Columns\ImageColumn::make('after_image')
                    ->label('After')
                    ->square(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->label('Title'),
                Tables\Columns\TextColumn::make('order')
                    ->sortable()
                    ->label('Order'),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->sortable()
                    ->label('Active'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active Status'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('order')
            ->reorderable('order');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListColorGradings::route('/'),
            'create' => Pages\CreateColorGrading::route('/create'),
            'edit' => Pages\EditColorGrading::route('/{record}/edit'),
        ];
    }
}