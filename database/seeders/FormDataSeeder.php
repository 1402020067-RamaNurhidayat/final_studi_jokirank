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
        JenisJoki::insert([
            [ 'name' => 'Joki Classic'],
            [ 'name' => 'Joki Ranked' ],
        ]);
        JenisRank::insert([
            [ 'name' => 'Warrior / Star'],
            [ 'name' => 'Elite / Star'],
            [ 'name' => 'Master / Star'],
            [ 'name' => 'Grandmaster / Star'],
            [ 'name' => 'Epic / Star'],
            [ 'name' => 'Legend / Star'],
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
