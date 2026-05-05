<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class Pengaturan extends Page
{
    use InteractsWithForms;

    protected static ?string $navigationIcon    = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationLabel   = 'Pengaturan';
    protected static ?string $navigationGroup   = null;
    protected static ?int    $navigationSort    = 99;
    protected static string  $view              = 'filament.pages.pengaturan';

    // ── Profil form state ──
    public ?string $name            = null;
    public ?string $email           = null;

    // ── Password form state ──
    public ?string $current_password    = null;
    public ?string $new_password        = null;
    public ?string $new_password_confirmation = null;

    public function mount(): void
    {
        $user        = Auth::user();
        $this->name  = $user->name;
        $this->email = $user->email;
    }

    public function saveProfil(): void
    {
        $this->validate([
            'name'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . Auth::id()],
        ]);

        Auth::user()->update([
            'name'  => $this->name,
            'email' => $this->email,
        ]);

        Notification::make()
            ->title('Profil berhasil diperbarui')
            ->success()
            ->send();
    }

    public function savePassword(): void
    {
        $this->validate([
            'current_password'          => ['required', 'current_password'],
            'new_password'              => ['required', 'confirmed', Password::min(8)],
        ]);

        Auth::user()->update([
            'password' => Hash::make($this->new_password),
        ]);

        $this->reset(['current_password', 'new_password', 'new_password_confirmation']);

        Notification::make()
            ->title('Password berhasil diperbarui')
            ->success()
            ->send();
    }
}