<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Model\Umkm;

class DashboardController extends Controller
{
    public function index() {
        $userId = session('logged_in_id');
        $payload['umkm'] = Umkm::where('id_user', $userId)->get(); // TODO: ganti dengan user dinamis
        return view('page/user/index', $payload);
    }
}
