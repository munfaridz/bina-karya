<?php

namespace App\Filament\Pages\Auth;

use Filament\Pages\Auth\Login as BaseLogin;

class Login extends BaseLogin
{
    // Pakai vendor override path yang sudah pasti ditemukan Laravel
    protected static string $view = 'vendor.filament-panels.pages.auth.login';

    public function getView(): string
    {
        return 'vendor.filament-panels.pages.auth.login';
    }

    // Kosongkan heading "Sign in" bawaan Filament
    public function getHeading(): string|\Illuminate\Contracts\Support\Htmlable
    {
        return '';
    }

    // Kosongkan subheading
    public function getSubheading(): string|\Illuminate\Contracts\Support\Htmlable|null
    {
        return null;
    }
}
