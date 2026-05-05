<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationLabel = 'Event';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Detail Event')
                ->schema([
                    Forms\Components\TextInput::make('nama')
                        ->label('Nama Event')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\Textarea::make('deskripsi')
                        ->label('Deskripsi')
                        ->rows(3),

                    Forms\Components\DatePicker::make('tanggal_mulai')
                        ->label('Tanggal Mulai')
                        ->required()
                        ->displayFormat('d/m/Y'),

                    Forms\Components\DatePicker::make('tanggal_selesai')
                        ->label('Tanggal Selesai')
                        ->displayFormat('d/m/Y'),

                    Forms\Components\TextInput::make('lokasi')
                        ->label('Lokasi'),

                    Forms\Components\Select::make('status')
                        ->label('Status')
                        ->options([
                            'akan_datang' => 'Akan Datang',
                            'berlangsung' => 'Berlangsung',
                            'selesai' => 'Selesai',
                        ])
                        ->default('akan_datang')
                        ->required(),

                    Forms\Components\Toggle::make('unggulan')
                        ->label('Tampilkan di Beranda')
                        ->default(false),

                    Forms\Components\FileUpload::make('gambar')
                        ->label('Gambar Event')
                        ->image()
                        ->directory('events')
                        ->nullable(),
                ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Event')
                    ->searchable(),

                Tables\Columns\TextColumn::make('tanggal_mulai')
                    ->label('Tanggal')
                    ->date('d/m/Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('lokasi')
                    ->label('Lokasi'),

                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'info' => 'akan_datang',
                        'warning' => 'berlangsung',
                        'success' => 'selesai',
                    ]),

                Tables\Columns\IconColumn::make('unggulan')
                    ->label('Unggulan')
                    ->boolean(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}