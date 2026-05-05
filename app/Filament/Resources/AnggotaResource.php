<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnggotaResource\Pages;
use App\Models\Anggota;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AnggotaResource extends Resource
{
    protected static ?string $model = Anggota::class;
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Data Anggota';
    protected static ?string $modelLabel = 'Anggota';
    protected static ?int $navigationSort = 2;

<<<<<<< HEAD
    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Informasi Anggota')
                ->schema([
                    Forms\Components\TextInput::make('nama')
                        ->label('Nama Lengkap')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\DatePicker::make('tanggal_lahir')
                        ->label('Tanggal Lahir')
                        ->required()
                        ->displayFormat('d/m/Y'),

                    Forms\Components\Select::make('divisi')
                        ->label('Divisi')
                        ->required()
                        ->options([
                            'ketua' => 'Ketua',
                            'wakil' => 'Wakil Ketua',
                            'sekretaris' => 'Sekretaris',
                            'bendahara' => 'Bendahara',
                            'Sinoman' => 'Sinoman',
                            'Agama' => 'Agama',
                            'Humas' => 'Humas',
                            'Kesenian' => 'Kesenian',
                            'Olahraga' => 'Olahraga',
                            'Dokumentasi' => 'Dokumentasi',
                            'Dekorasi' => 'Dekorasi',
                            'Keamanan' => 'Keamanan',
                        ]),

                    Forms\Components\Select::make('status')
                        ->label('Status')
                        ->options([
                            'aktif' => 'Aktif',
                            'tidak_aktif' => 'Tidak Aktif',
                        ])
                        ->default('aktif'),

                    Forms\Components\TextInput::make('no_hp')
                        ->label('No. HP')
                        ->tel()
                        ->maxLength(20),

                    Forms\Components\Textarea::make('alamat')
                        ->label('Alamat')
                        ->rows(2)
                        ->columnSpanFull(),

                    Forms\Components\FileUpload::make('foto')
                        ->label('Foto Anggota')
                        ->image()
                        ->imageEditor()
                        ->directory('anggota')
                        ->visibility('public')
                        ->imagePreviewHeight('150')
                        ->columnSpanFull(),
                ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto')
                    ->circular()
                    ->defaultImageUrl(fn() => 'https://ui-avatars.com/api/?name=BK&background=1e3a8a&color=fff')
                    ->size(45),

                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('tanggal_lahir')
                    ->label('Tgl Lahir')
                    ->date('d/m/Y')
                    ->sortable(),

                Tables\Columns\BadgeColumn::make('divisi')
                    ->label('Divisi')
                    ->colors([
                        'primary' => 'Sosial',
                        'success' => 'Olahraga',
                        'warning' => 'Seni',
                        'info' => 'Pendidikan',
                        'danger' => 'Ekonomi',
                        'secondary' => 'Lingkungan',
                    ]),

                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'success' => 'aktif',
                        'danger' => 'tidak_aktif',
                    ]),

                Tables\Columns\TextColumn::make('no_hp')
                    ->label('No. HP')
                    ->searchable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('divisi')
                    ->options([
                        'Sosial' => 'Sosial',
                        'Olahraga' => 'Olahraga',
                        'Seni' => 'Seni',
                        'Pendidikan' => 'Pendidikan',
                        'Ekonomi' => 'Ekonomi',
                        'Lingkungan' => 'Lingkungan',
                    ]),
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'aktif' => 'Aktif',
                        'tidak_aktif' => 'Tidak Aktif',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
=======
public static function form(Form $form): Form
{
    return $form->schema([
        Forms\Components\Section::make('Informasi Anggota')
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->label('Nama Lengkap')
                    ->required()
                    ->maxLength(255),

                Forms\Components\DatePicker::make('tanggal_lahir')
                    ->label('Tanggal Lahir')
                    ->required()
                    ->displayFormat('d/m/Y'),

                Forms\Components\Select::make('divisi')
                    ->label('Divisi')
                    ->required()
                    ->options([
                        'Sosial'      => 'Sosial',
                        'Olahraga'    => 'Olahraga',
                        'Seni'        => 'Seni',
                        'Pendidikan'  => 'Pendidikan',
                        'Ekonomi'     => 'Ekonomi',
                        'Lingkungan'  => 'Lingkungan',
                    ]),

                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'aktif'       => 'Aktif',
                        'tidak_aktif' => 'Tidak Aktif',
                    ])
                    ->default('aktif'),

                Forms\Components\TextInput::make('no_hp')
                    ->label('No. HP')
                    ->tel()
                    ->maxLength(20),

                Forms\Components\Textarea::make('alamat')
                    ->label('Alamat')
                    ->rows(2)
                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('foto')
                    ->label('Foto Anggota')
                    ->image()
                    ->imageEditor()
                    ->directory('anggota')
                    ->visibility('public')
                    ->imagePreviewHeight('150')
                    ->columnSpanFull(),
            ])->columns(2),
    ]);
}

public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\ImageColumn::make('foto')
                ->label('Foto')
                ->circular()
                ->defaultImageUrl(fn () => 'https://ui-avatars.com/api/?name=BK&background=1e3a8a&color=fff')
                ->size(45),

            Tables\Columns\TextColumn::make('nama')
                ->label('Nama')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('tanggal_lahir')
                ->label('Tgl Lahir')
                ->date('d/m/Y')
                ->sortable(),

            Tables\Columns\BadgeColumn::make('divisi')
                ->label('Divisi')
                ->colors([
                    'primary' => 'Sosial',
                    'success' => 'Olahraga',
                    'warning' => 'Seni',
                    'info'    => 'Pendidikan',
                    'danger'  => 'Ekonomi',
                    'secondary' => 'Lingkungan',
                ]),

            Tables\Columns\BadgeColumn::make('status')
                ->label('Status')
                ->colors([
                    'success' => 'aktif',
                    'danger'  => 'tidak_aktif',
                ]),

            Tables\Columns\TextColumn::make('no_hp')
                ->label('No. HP')
                ->searchable(),
        ])
        ->filters([
            Tables\Filters\SelectFilter::make('divisi')
                ->options([
                    'Sosial'     => 'Sosial',
                    'Olahraga'   => 'Olahraga',
                    'Seni'       => 'Seni',
                    'Pendidikan' => 'Pendidikan',
                    'Ekonomi'    => 'Ekonomi',
                    'Lingkungan' => 'Lingkungan',
                ]),
            Tables\Filters\SelectFilter::make('status')
                ->options([
                    'aktif'      => 'Aktif',
                    'tidak_aktif'=> 'Tidak Aktif',
                ]),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ]);
}
>>>>>>> e326b0ef4e7abd0261adf1ce23e56900fcc42545

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAnggotas::route('/'),
            'create' => Pages\CreateAnggota::route('/create'),
            'edit' => Pages\EditAnggota::route('/{record}/edit'),
        ];
    }
}