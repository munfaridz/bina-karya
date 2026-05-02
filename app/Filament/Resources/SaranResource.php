<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SaranResource\Pages;
use App\Models\Saran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SaranResource extends Resource
{
    protected static ?string $model = Saran::class;
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationLabel = 'Saran & Kritik';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Saran & Kritik')
                ->schema([
                    Forms\Components\TextInput::make('nama')
                        ->label('Nama Pengirim')
                        ->default('Anonim'),

                    Forms\Components\Select::make('kategori')
                        ->label('Kategori')
                        ->options([
                            'saran' => 'Saran',
                            'kritik' => 'Kritik',
                            'pertanyaan' => 'Pertanyaan',
                        ]),

                    Forms\Components\Textarea::make('pesan')
                        ->label('Pesan')
                        ->required()
                        ->rows(4)
                        ->columnSpanFull(),

                    Forms\Components\Select::make('status')
                        ->label('Status')
                        ->options([
                            'belum_dibaca' => 'Belum Dibaca',
                            'dibaca' => 'Dibaca',
                            'dibalas' => 'Dibalas',
                        ])
                        ->default('belum_dibaca'),

                    Forms\Components\Textarea::make('balasan')
                        ->label('Balasan Admin')
                        ->rows(3)
                        ->columnSpanFull(),
                ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama')
                    ->default('Anonim'),

                Tables\Columns\TextColumn::make('pesan')
                    ->label('Pesan')
                    ->limit(60)
                    ->tooltip(fn ($record) => $record->pesan),

                Tables\Columns\BadgeColumn::make('kategori')
                    ->label('Kategori')
                    ->colors([
                        'info' => 'saran',
                        'danger' => 'kritik',
                        'warning' => 'pertanyaan',
                    ]),

                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'danger' => 'belum_dibaca',
                        'warning' => 'dibaca',
                        'success' => 'dibalas',
                    ]),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dikirim')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSarans::route('/'),
            'create' => Pages\CreateSaran::route('/create'),
            'edit' => Pages\EditSaran::route('/{record}/edit'),
        ];
    }
}