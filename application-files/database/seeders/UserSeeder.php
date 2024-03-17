<?php

namespace Database\Seeders;

use App\Model\Role;
use App\Model\User;
use Config;
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
        $user = User::where('email', Config::get('constants.ADMIN_DEFAULT_EMAIL'))->first();

        if (!isset($user)) {
            User::create([
                'name' => 'Super Admin',
                'email' => Config::get('constants.ADMIN_DEFAULT_EMAIL'), //examadmin@proshore.com
                'password' => Hash::make('123admin@'),
            ]);
        }
    }
}
