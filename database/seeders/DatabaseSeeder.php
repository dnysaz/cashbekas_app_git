<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Location;
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
      
        // users seeders 

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


        // location seeders 

        Location::create([
            'province' => 'Bali',
            'regency' => 'Tabanan',
            'user' => 'Administrator',
        ]);

        Location::create([
            'province' => 'Bali',
            'regency' => 'Karangasem',
            'user' => 'Administrator',
        ]);

        Location::create([
            'province' => 'Bali',
            'regency' => 'Singaraja',
            'user' => 'Administrator',
        ]);

        Location::create([
            'province' => 'Bali',
            'regency' => 'Denpasar',
            'user' => 'Administrator',
        ]);

        Location::create([
            'province' => 'Bali',
            'regency' => 'Klungkung',
            'user' => 'Administrator',
        ]);

        Location::create([
            'province' => 'Bali',
            'regency' => 'Bangli',
            'user' => 'Administrator',
        ]);

        Location::create([
            'province' => 'Bali',
            'regency' => 'Gianyar',
            'user' => 'Administrator',
        ]);

        Location::create([
            'province' => 'Bali',
            'regency' => 'Nusa Penida',
            'user' => 'Administrator',
        ]);

        Location::create([
            'province' => 'Bali',
            'regency' => 'Jembrana',
            'user' => 'Administrator',
        ]);


        // categories seeders 

        Category::create([
            'category' => 'Elektronika',
            'slug' => 'elektronika',
            'sub_1' => 'Komputer Dan Laptop',
            'sub_2' => 'Audio Dan Speaker',
            'sub_3' => 'TV LCD Dan Monitor',
            'sub_4' => 'Aksesoris',
            'sub_5' => 'Elektronika Lainya',
            'user' => 'Administrator',
            'icon' => 'elektronika.png',
            // 'slug_1' => 'komputer_dan_laptop',
            // 'slug_2' => 'audio_dan_speaker',
            // 'slug_3' => 'tv_lcd_dan_monitor',
            // 'slug_4' => 'aksesoris',
            // 'slug_5' => 'elektronika_lain',
        ]);

        Category::create([
            'category' => 'Kendaraan',
            'slug' => 'kendaraan',
            'sub_1' => 'Mobil',
            'sub_2' => 'Motor',
            'sub_3' => 'Sepeda',
            'sub_4' => 'Aksesoris',
            'sub_5' => 'Kendaraan Lainya',
            'user' => 'Administrator',
            'icon' => 'kendaraan.png',
            // 'slug_1' => 'mpbil',
            // 'slug_2' => 'motor',
            // 'slug_3' => 'sepeda',
            // 'slug_4' => 'aksesoris',
            // 'slug_5' => 'kendaraan_lain',
        ]);

        Category::create([
            'category' => 'Properti',
            'slug' => 'properti',
            'sub_1' => 'Rumah Dijual Atau Disewakan',
            'sub_2' => 'Ruko Dan Usaha',
            'sub_3' => 'Villa Dan Hotel',
            'sub_4' => 'Tanah',
            'sub_5' => 'Properti Lainya',
            'user' => 'Administrator',
            'icon' => 'properti.png',
            // 'slug_1' => 'rumah_dijual_disewakan',
            // 'slug_2' => 'ruko_dan_usaha',
            // 'slug_3' => 'villa_dan_hotel',
            // 'slug_4' => 'aksesoris',
            // 'slug_5' => 'properti_lain',
        ]);

        Category::create([
            'category' => 'Kebutuhan Rumah Tangga',
            'slug' => 'kebutuhan_rumah_tangga',
            'sub_1' => 'AC Dan Kulkas',
            'sub_2' => 'Alat-alat Dapur',
            'sub_3' => 'Furniture',
            'sub_4' => 'Taman Dan Kebun',
            'sub_5' => 'Kebutuhan Rumah Tangga Lainya',
            'user' => 'Administrator',
            'icon' => 'kebutuhan_rumah_tangga.png',
            // 'slug_1' => 'ac_dan_kulkas',
            // 'slug_2' => 'alat_alat_dapur',
            // 'slug_3' => 'furniture',
            // 'slug_4' => 'taman_dan_kebun',
            // 'slug_5' => 'kebutuhan_rumah_tangga_lain',
        ]);

        Category::create([
            'category' => 'Kebutuhan Anak',
            'slug' => 'kebutuhan_anak',
            'sub_1' => 'Popok Dan Handuk',
            'sub_2' => 'Balsem Dan Minyak',
            'sub_3' => 'Baju Dan Celana',
            'sub_4' => 'Sepatu Kaos Dan Topi',
            'sub_5' => 'Kebutuhan Anak Lainya',
            'user' => 'Administrator',
            'icon' => 'kebutuhan_anak.png',
            // 'slug_1' => 'popok_dan_handuk',
            // 'slug_2' => 'balsem_dan_minyak',
            // 'slug_3' => 'baju_dan_celana',
            // 'slug_4' => 'sepatu_kaos_dan_topi',
            // 'slug_5' => 'kebutuhan_anak_lain',
        ]);

        Category::create([
            'category' => 'Hobby Dan Olahraga',
            'slug' => 'hobby_dan_olahraga',
            'sub_1' => 'Alat Pancing',
            'sub_2' => 'Alat Perkebunan',
            'sub_3' => 'Sepeda Dan Skuter',
            'sub_4' => 'Alat Musik',
            'sub_5' => 'Hobby Dan Olahraga Lainya',
            'user' => 'Administrator',
            'icon' => 'hobby_dan_olahraga.png',
            // 'slug_1' => 'alat_pancing',
            // 'slug_2' => 'alat_perkebunan',
            // 'slug_3' => 'sepeda_dan_skuter',
            // 'slug_4' => 'alat_musik',
            // 'slug_5' => 'hoby_dan_olahraga_lain',
        ]);

        Category::create([
            'category' => 'Pakaian Pria',
            'slug' => 'pakaian_pria',
            'sub_1' => 'Kaos Dan Kemeja',
            'sub_2' => 'Celana Pendek Dan Celana Panjang',
            'sub_3' => 'Sepatu Dan Kaos',
            'sub_4' => 'Pakaian Dalam',
            'sub_5' => 'Pakaian Pria Lainya',
            'user' => 'Administrator',
            'icon' => 'pakaian_pria.png',
            // 'slug_1' => 'kaos_dan_kemeja',
            // 'slug_2' => 'celana_pendek_celana_panjang',
            // 'slug_3' => 'sepatu_dan_kaos',
            // 'slug_4' => 'pakaian_dalam',
            // 'slug_5' => 'pakaian_pria_lain',
        ]);

        Category::create([
            'category' => 'Pakaian Wanita',
            'slug' => 'pakaian_wanita',
            'sub_1' => 'Kaos Dan Kemeja',
            'sub_2' => 'Rok Dan Daster',
            'sub_3' => 'Sepatu Dan Kaos',
            'sub_4' => 'Pakaian Dalam',
            'sub_5' => 'Pakaian Wanita Lainya',
            'user' => 'Administrator',
            'icon' => 'pakaian_wanita.png',
            // 'slug_1' => 'kaos_dan_kemeja',
            // 'slug_2' => 'rok_dan_daster',
            // 'slug_3' => 'sepatu_dan_kaos',
            // 'slug_4' => 'pakaian_dalam',
            // 'slug_5' => 'pakaian_wanita_lain',
        ]);
    }
}
