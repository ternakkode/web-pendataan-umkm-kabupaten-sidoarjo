<?php

use App\Model\Admin;
use App\Model\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->email = 'demo_user_umkm_sidoarjo@gmail.com';
        $user->username = 'user';
        $user->password = Hash::make('rahasia123');
        $user->nama = 'Demo User';
        $user->telah_terverifikasi = true;
        $user->save();

        $user->alamat()->create([
            'id_kecamatan' => 1,
            'id_desa' => 1,
            'detail' => 'DISINI SENANG DISANA SENANG DIMANA MANA HATIKU SENANG'
        ]);

        $admin = new Admin();
        $admin->username = 'admin';
        $admin->password = Hash::make('rahasia123');
        $admin->nama = 'Demo Admin';
        $admin->save();
    }
}
