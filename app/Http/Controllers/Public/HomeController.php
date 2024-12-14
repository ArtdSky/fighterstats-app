<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function home(): View|RedirectResponse
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return view('admin.home.dashboard');
    }
}
