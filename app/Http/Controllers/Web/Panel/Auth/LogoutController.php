<?php

namespace App\Http\Controllers\Web\Panel\Auth;

use Auth;
use Illuminate\Http\RedirectResponse;

class LogoutController
{
    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
