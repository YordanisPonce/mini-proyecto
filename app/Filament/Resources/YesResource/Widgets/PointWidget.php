<?php

namespace App\Filament\Resources\YesResource\Widgets;

use App\Models\Point;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class PointWidget extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';
    public function table(Table $table): Table
    {
        // 'urlVideo', 'urlAudio', 'url3DModel', 'description'
        return $table
            ->query(
                Point::query()
            )
            ->columns([
                ImageColumn::make('image')->label('Imagen'),
                TextColumn::make('title')->searchable()->label('Título'),
                TextColumn::make('latitude')->searchable()->label('Latitud'),
                TextColumn::make('longitude')->searchable()->label('Longitud'),
            ])->actions([
                    Tables\Actions\Action::make('detalles')->icon('')->action(fn(Point $record) => $record->description)
                        ->modalDescription('asdads')
                        ->modalHeading('TItulo')
                    /* ->modalContent(view('welcome')) */ ,
                ]);
    }
}
