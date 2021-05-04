<?php

namespace App\Http\Middleware;

use Closure;

class IsUser
{
    public function handle($request, Closure $next)
    {
        $role = session('role');
        if (!$role) return redirect('app/login')->with('failed_message', 'Anda harus login terlebih dahulu!');
        if ($role !== 'user') return redirect('/')->with('failed_message', 'Anda tidak memiliki akses ke halaman tersebut!');

        return $next($request);
    }
}
