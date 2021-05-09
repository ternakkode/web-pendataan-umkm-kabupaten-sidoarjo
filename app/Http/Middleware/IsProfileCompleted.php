<?php

namespace App\Http\Middleware;

use Closure;

class IsProfileCompleted
{
    public function handle($request, Closure $next)
    {
        $isEmailVerified = (bool) session('is_email_verified');
        $userId = session('logged_in_id');
        if (!$isEmailVerified) return redirect('/app/verification');
        
        $isProfileCompleted = (bool) session('is_profile_completed');
        if (!$isProfileCompleted) return redirect('/app/profile/complete')->with('failed_message', 'Silahkan lengkapi profil anda terlebih dahulu');
        
        return $next($request);
    }
}
