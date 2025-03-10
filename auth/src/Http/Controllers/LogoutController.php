<?php

namespace Devdojo\Auth\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LogoutController
{
    public function __invoke(Request $request): RedirectResponse
    {
        auth('accounts')->logout();

        $this->clearTraces($request);

        return redirect()->route('home');
    }

    public function getLogout(Request $request)
    {
        auth('accounts')->logout();

        $this->clearTraces($request);

        return redirect('/');
    }

    private function clearTraces(Request $request): void
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
