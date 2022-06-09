<?php

namespace Database\Seeders;

use App\Models\JenisJoki;
use App\Models\JenisRank;
use App\Models\LoginMethod;
use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class FormDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisJoki::insert([ [
                'name' => 'Joki Classic',
                'description' => 'Kami akan menjoki akun anda di mode Classic sampai rank yang anda pilih',
                'price' => '50000',
            ], [
                'name' => 'Joki Ranked',
                'description' => 'Kami akan menjoki akun anda di mode Ranked sampai rank yang anda pilih',
                'price' => '100000',
            ],
        ]);
        JenisRank::insert([
            [ 'name' => 'Warrior / Star', 'price' => 50000],
            [ 'name' => 'Elite / Star', 'price' => 50000],
            [ 'name' => 'Master / Star', 'price' => 50000],
            [ 'name' => 'Grandmaster / Star', 'price' => 50000],
            [ 'name' => 'Epic / Star', 'price' => 50000],
            [ 'name' => 'Legend / Star', 'price' => 50000],
        ]);
        LoginMethod::insert([
            [ 'name' => 'Facebook', 'slug' => 'facebook',   'icon' => '' ],
            [ 'name' => 'Moonton',  'slug' => 'moonton',    'icon' => '' ],
        ]);
        PaymentMethod::insert([
            [ 'name' => 'Bank BNI',         'slug' => 'bank-bni'],
            [ 'name' => 'DANA',             'slug' => 'dana'],
            [ 'name' => 'Pulsa Telkomsel',  'slug' => 'telkomsel'],
            [ 'name' => 'Bank BRI',         'slug' => 'bank-bri'],
        ]);



    }
}
