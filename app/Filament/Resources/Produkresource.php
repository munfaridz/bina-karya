<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdukResource\Pages;
use App\Models\Produk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProdukResource extends Resource
{
    protected static ?string $model = Produk::class;
    protected static ?string $navigationIcon  = 'heroicon-o-shopping-bag';
    protected static ?string $navigationLabel = 'Lapak Produk';
    protected static ?string $navigationGroup = 'Lapak';
    protected static ?int    $navigationSort  = 5;

    public static function form(Form $form): Form
    {
        return $form->schema([

            Forms\Components\Section::make('Informasi Produk')
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('nama')
                        ->label('Nama Produk')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),

                    Forms\Components\Textarea::make('deskripsi')
                        ->label('Deskripsi')
                        ->rows(3)
                        ->columnSpanFull(),

                    Forms\Components\Select::make('kategori')
                        ->label('Kategori')
                        ->options([
                            'makanan'   => '🍱 Makanan',
                            'minuman'   => '🥤 Minuman',
                            'pakaian'   => '👕 Pakaian',
                            'kerajinan' => '🎨 Kerajinan',
                            'jasa'      => '🔧 Jasa',
                            'lainnya'   => '📦 Lainnya',
                        ])
                        ->default('lainnya')
                        ->required(),

                    Forms\Components\TextInput::make('satuan')
                        ->label('Satuan (pcs / porsi / kg / dll)')
                        ->default('pcs')
                        ->maxLength(30),

                    Forms\Components\TextInput::make('harga')
                        ->label('Harga Jual (Rp)')
                        ->numeric()
                        ->required()
                        ->prefix('Rp'),

                    Forms\Components\TextInput::make('harga_coret')
                        ->label('Harga Coret / Sebelum Diskon (opsional)')
                        ->numeric()
                        ->prefix('Rp'),

                    Forms\Components\FileUpload::make('gambar')
                        ->label('Foto Produk')
                        ->image()
                        ->directory('produk')
                        ->imageResizeMode('cover')
                        ->imageCropAspectRatio('1:1')
                        ->maxSize(2048)
                        ->columnSpanFull(),
                ]),

            Forms\Components\Section::make('Penjual')
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('nama_penjual')
                        ->label('Nama Penjual')
                        ->required()
                        ->maxLength(100),

                    Forms\Components\TextInput::make('no_wa_penjual')
                        ->label('No. WA Penjual')
                        ->helperText('Format: 08xxxxxxxxxx atau 628xxxxxxxxxx')
                        ->required()
                        ->maxLength(20),

                    Forms\Components\TextInput::make('lokasi_penjual')
                        ->label('Lokasi / RT (opsional)')
                        ->maxLength(100),
                ]),

            Forms\Components\Section::make('Status')
                ->columns(2)
                ->schema([
                    Forms\Components\Toggle::make('tersedia')
                        ->label('Produk Tersedia')
                        ->default(true),

                    Forms\Components\Toggle::make('unggulan')
                        ->label('Tampilkan di Beranda')
                        ->default(false),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('gambar')
                    ->label('Foto')
                    ->disk('public')
                    ->square()
                    ->size(56),

                Tables\Columns\TextColumn::make('nama')
                    ->label('Produk')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('kategori')
                    ->label('Kategori')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'makanan'   => 'warning',
                        'minuman'   => 'info',
                        'pakaian'   => 'success',
                        'kerajinan' => 'danger',
                        'jasa'      => 'primary',
                        default     => 'gray',
                    }),

                Tables\Columns\TextColumn::make('harga')
                    ->label('Harga')
                    ->money('IDR')
                    ->sortable(),

                Tables\Columns\TextColumn::make('nama_penjual')
                    ->label('Penjual')
                    ->searchable(),

                Tables\Columns\TextColumn::make('no_wa_penjual')
                    ->label('No. WA')
                    ->copyable(),

                Tables\Columns\IconColumn::make('tersedia')
                    ->label('Tersedia')
                    ->boolean(),

                Tables\Columns\IconColumn::make('unggulan')
                    ->label('Unggulan')
                    ->boolean(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ditambahkan')
                    ->date('d/m/Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('kategori')
                    ->label('Kategori')
                    ->options([
                        'makanan'   => 'Makanan',
                        'minuman'   => 'Minuman',
                        'pakaian'   => 'Pakaian',
                        'kerajinan' => 'Kerajinan',
                        'jasa'      => 'Jasa',
                        'lainnya'   => 'Lainnya',
                    ]),

                Tables\Filters\TernaryFilter::make('tersedia')
                    ->label('Status Ketersediaan'),

                Tables\Filters\TernaryFilter::make('unggulan')
                    ->label('Produk Unggulan'),
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
            'index'  => Pages\ListProduks::route('/'),
            'create' => Pages\CreateProduk::route('/create'),
            'edit'   => Pages\EditProduk::route('/{record}/edit'),
        ];
    }
}