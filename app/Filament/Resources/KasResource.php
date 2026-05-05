<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KasResource\Pages;
use App\Models\Kas;
use App\Models\Anggota;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\Summarizers\Sum;
use Illuminate\Database\Eloquent\Builder;

class KasResource extends Resource
{
    protected static ?string $model = Kas::class;
    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $navigationLabel = 'Manajemen Kas';
    protected static ?string $modelLabel = 'Transaksi Kas';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Input Kas Per Anggota')
                ->description('Masukkan data pembayaran kas anggota')
                ->schema([
                    Forms\Components\Select::make('anggota_id')
                        ->label('Nama Anggota')
                        ->relationship('anggota', 'nama')
                        ->searchable()
                        ->preload()
                        ->required(),

                    Forms\Components\Select::make('bulan')
                        ->label('Bulan')
                        ->options([
                            1 => 'Januari', 2 => 'Februari', 3 => 'Maret',
                            4 => 'April', 5 => 'Mei', 6 => 'Juni',
                            7 => 'Juli', 8 => 'Agustus', 9 => 'September',
                            10 => 'Oktober', 11 => 'November', 12 => 'Desember',
                        ])
                        ->required(),

                    Forms\Components\TextInput::make('tahun')
                        ->label('Tahun')
                        ->numeric()
                        ->default(date('Y'))
                        ->required(),

                    Forms\Components\TextInput::make('nominal')
                        ->label('Nominal (Rp)')
                        ->numeric()
                        ->prefix('Rp')
                        ->default(10000)
                        ->required(),

                    Forms\Components\Select::make('jenis')
                        ->label('Jenis Transaksi')
                        ->options([
                            'masuk' => 'Kas Masuk',
                            'keluar' => 'Kas Keluar',
                        ])
                        ->default('masuk')
                        ->required(),

                    Forms\Components\DatePicker::make('tanggal_bayar')
                        ->label('Tanggal Bayar')
                        ->displayFormat('d/m/Y')
                        ->default(now()),

                    Forms\Components\Select::make('status')
                        ->label('Status Pembayaran')
                        ->options([
                            'lunas' => 'Lunas',
                            'belum' => 'Belum Lunas',
                        ])
                        ->default('lunas')
                        ->required(),

                    Forms\Components\Textarea::make('keterangan')
                        ->label('Keterangan')
                        ->rows(2)
                        ->nullable(),
                ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('anggota.nama')
                    ->label('Nama Anggota')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('bulan')
                    ->label('Bulan')
                    ->formatStateUsing(fn (int $state): string => Kas::getNamaBulan($state))
                    ->sortable(),

                Tables\Columns\TextColumn::make('tahun')
                    ->label('Tahun')
                    ->sortable(),

                Tables\Columns\TextColumn::make('nominal')
                    ->label('Nominal')
                    ->money('IDR')
                    ->sortable()
                    ->summarize(Sum::make()->money('IDR')->label('Total')),

                Tables\Columns\BadgeColumn::make('jenis')
                    ->label('Jenis')
                    ->colors([
                        'success' => 'masuk',
                        'danger' => 'keluar',
                    ])
                    ->formatStateUsing(fn (string $state): string => $state === 'masuk' ? 'Masuk' : 'Keluar'),

                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'success' => 'lunas',
                        'warning' => 'belum',
                    ])
                    ->formatStateUsing(fn (string $state): string => $state === 'lunas' ? 'Lunas' : 'Belum'),

                Tables\Columns\TextColumn::make('tanggal_bayar')
                    ->label('Tgl Bayar')
                    ->date('d/m/Y')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('bulan')
                    ->options([
                        1 => 'Januari', 2 => 'Februari', 3 => 'Maret',
                        4 => 'April', 5 => 'Mei', 6 => 'Juni',
                        7 => 'Juli', 8 => 'Agustus', 9 => 'September',
                        10 => 'Oktober', 11 => 'November', 12 => 'Desember',
                    ]),
                Tables\Filters\SelectFilter::make('tahun')
                    ->options(function () {
                        $tahunList = [];
                        for ($y = date('Y'); $y >= 2020; $y--) {
                            $tahunList[$y] = $y;
                        }
                        return $tahunList;
                    }),
                Tables\Filters\SelectFilter::make('status')
                    ->options(['lunas' => 'Lunas', 'belum' => 'Belum']),
                Tables\Filters\SelectFilter::make('jenis')
                    ->options(['masuk' => 'Kas Masuk', 'keluar' => 'Kas Keluar']),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKas::route('/'),
            'create' => Pages\CreateKas::route('/create'),
            'edit' => Pages\EditKas::route('/{record}/edit'),
        ];
    }
}