<?php

namespace App\Filament\Pages\Auth;

use Filament\Pages\Auth\Register as BaseRegister;
use Filament\Forms\Components\Select;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Register extends BaseRegister
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    // protected static string $view = 'filament.pages.auth-register';

    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->getNameFormComponent(),
                        $this->getEmailFormComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmationFormComponent(),
                        Select::make('role_id')
                            ->label('Applying for')
                            ->options(Role::whereIn('slug', ['company', 'custom-role'])->get()->pluck('name', 'id'))
                            ->default(fn() => Role::where('name', 'company')->first()?->id)
                            ->required(),
                    ])
                    ->statePath('data'),
            ),
        ];
    }

    protected function handleRegistration(array $data): User
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // Attach the selected role (many-to-many relation)
        if (isset($data['role_id'])) {
            $user->roles()->attach($data['role_id']);
        }

        return $user;
    }
}
