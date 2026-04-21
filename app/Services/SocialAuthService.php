<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Str;
use Laravel\Socialite\Contracts\User as SocialUser;

class SocialAuthService
{
    public function findOrCreateUser(SocialUser $socialUser, string $provider): User
    {
        $user = User::where('provider', $provider)
            ->where('provider_id', $socialUser->getId())
            ->first();

        if ($user) {
            $user->update([
                'name' => $socialUser->getName() ?: $socialUser->getNickname() ?: 'Người dùng',
                'email' => $socialUser->getEmail(),
                'avatar' => $socialUser->getAvatar(),
            ]);

            return $user;
        }

        if ($socialUser->getEmail()) {
            $existingUser = User::where('email', $socialUser->getEmail())->first();

            if ($existingUser) {
                $existingUser->update([
                    'provider' => $provider,
                    'provider_id' => $socialUser->getId(),
                    'avatar' => $socialUser->getAvatar(),
                ]);

                return $existingUser;
            }
        }

        return User::create([
            'name' => $socialUser->getName() ?: $socialUser->getNickname() ?: 'Người dùng',
            'email' => $socialUser->getEmail() ?: strtolower($provider) . '_' . $socialUser->getId() . '@example.com',
            'password' => bcrypt(Str::random(16)),
            'student_id' => '23810310141',
            'provider' => $provider,
            'provider_id' => $socialUser->getId(),
            'avatar' => $socialUser->getAvatar(),
        ]);
    }
}