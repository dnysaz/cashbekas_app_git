<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
      
        User::create([
            
            'user_id' => Str::random(32),
            'name' => 'Ketut Dana',
            'username' => 'ketutdana',
            'email' => 'danayasa2@gmail.com',
            'password' => bcrypt('Lemarikaca01'),
            'role'  => 'user',
            'address' => 'Jl.Gatot Subroto 6 Gg.Turi Permai No 26 Denpasar',
            'location' => 'Denpasar',
            'phone'   => '085792721649',
            'email_verified_at' => Carbon::now(),
            'photo' => 'user.png',
        ]);

        User::create([

            'user_id' => Str::random(32),
            'name' => 'Administrator',
            'username' => 'Admin2193',
            'email' => 'administrator@cashbekas.com',
            'password' => bcrypt('Lemarikaca01'),
            'role' => 'Administrator',
            'address' => 'Jl.Gatot Subroto 6 Gg.Turi Permai No 26 Denpasar',
            'location' => 'Denpasar',
            'phone'   => '085792721649',
            'email_verified_at' => Carbon::now(),
            'photo' => 'user.png',

        ]);

        User::create([

            'user_id' => Str::random(32),
            'name' => 'Admin',
            'username' => 'Admin',
            'email' => 'admin@cashbekas.com',
            'password' => bcrypt('Lemarikaca01'),
            'role' => 'user',
            'address' => 'Jl.Gatot Subroto 6 Gg.Turi Permai No 26 Denpasar',
            'location' => 'Denpasar',
            'phone'   => '085792721649',
            'email_verified_at' => Carbon::now(),
            'photo' => 'user.png',

        ]);
    }
}
