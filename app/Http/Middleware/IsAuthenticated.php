<?php

namespace App\Http\Middleware;

use Closure;

class IsAuthenticated
{
    public function handle($request, Closure $next)
    {
        $isLoggedIn = (bool) session('is_logged_in');
        if (!$isLoggedIn) return redirect('/')->with('failed_message', 'Anda harus login terlebih dahulu!'); // TODO : Tambah handling flash message di view
        
        return $next($request);
    }
}
