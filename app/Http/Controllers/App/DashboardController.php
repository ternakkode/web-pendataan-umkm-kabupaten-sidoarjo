<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Model\Umkm;

class DashboardController extends Controller
{
    public function index() {
        dd(session()->all());
        $payload['umkm'] = Umkm::where('id_user', 1)->get(); // TODO: ganti dengan user dinamis
        return view('page/user/index', $payload);
    }   
}
