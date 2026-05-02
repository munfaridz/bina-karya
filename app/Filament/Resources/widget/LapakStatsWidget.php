<?php

namespace App\Filament\Widgets;

use App\Models\Produk;
use Filament\Widgets\Widget;

class LapakStatsWidget extends Widget
{
    protected static string $view = 'filament.widgets.lapak-stats';
    protected int | string | array $columnSpan = 'full';
    protected static ?int $sort = 2;

    public function getViewData(): array
    {
        $totalProduk = Produk::count();
        $produkTersedia = Produk::where('tersedia', 1)->count();
        $produkUnggulan = Produk::where('unggulan', 1)->count();
        $produkTerbaru = Produk::latest()->take(5)->get();

        return [
            'totalProduk' => $totalProduk,
            'produkTersedia' => $produkTersedia,
            'produkUnggulan' => $produkUnggulan,
            'produkTerbaru' => $produkTerbaru,
        ];
    }
}