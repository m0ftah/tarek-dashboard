<?php

namespace App\Filament\Resources\ColorGradingResource\Pages;

use App\Filament\Resources\ColorGradingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditColorGrading extends EditRecord
{
    protected static string $resource = ColorGradingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
