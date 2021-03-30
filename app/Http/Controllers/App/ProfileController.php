<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Model\User;

class ProfileController extends Controller
{
    public function complete() {
        $isProfileCompleted = (bool) session('is_profile_completed');
        if ($isProfileCompleted) return redirect('/app');

        $userId = session('logged_in_id');
        $payload['user'] = User::find($userId);

        return view('page/user/profile/complete', $payload);
    }   
}
