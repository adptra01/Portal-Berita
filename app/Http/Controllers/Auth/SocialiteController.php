<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            // Google user object dari google
            $userFromGoogle = Socialite::driver('google')->user();

            // Ambil user dari database berdasarkan google user id
            $userFromDatabase = User::where('google_id', $userFromGoogle->getId())->first();

            // dd($userFromDatabase);

            // Jika tidak ada user, maka buat user baru
            if (!$userFromDatabase) {
                $newUser = new User([
                    'google_id' => $userFromGoogle->getId(),
                    'name' => $userFromGoogle->getName(),
                    'email' => $userFromGoogle->getEmail(),
                    'password' => bcrypt($userFromGoogle->getName(),),
                    'role' => 'Pengunjung',
                ]);

                $newUser->save();

                // Login user yang baru dibuat
                auth('web')->login($newUser);
                session()->regenerate();

                return redirect('/');
            }

            // Jika ada user langsung login saja
            auth('web')->login($userFromDatabase);
            session()->regenerate();

            return redirect('/');
        } catch (\Throwable $th) {
            // Redirect ke halaman login dengan pesan error
            return redirect('/login')->with('error', 'Terjadi kesalahan, silakan coba lagi.');
        }
    }

    // public function logout(Request $request)
    // {
    //     auth('web')->logout();
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();

    //     return redirect('/');
    // }
}
