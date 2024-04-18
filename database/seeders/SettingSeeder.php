<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'title' => 'sibanyu',
            'contact' => '6285384075252',
            'whatsapp' => '6285384075252',
            'description' => 'sibanyu adalah media yang lahir dari desa. Berfilosofi dari air yang terus mengalir, menyajikan informasi dari hulu menyebar hingga ke hilir. Dengan visi "Dari Desa untuk Bangsa", mendorong pembangunan bangsa dari desa.',
            'about' =>
            '<h5 style="text-align:center;"><span style="color:hsl(0,0%,0%);"><strong>PT. TAMA MEDIA DESA (TMD)</strong></span></h5><h5 style="text-align:center;"><span style="color:hsl(0,0%,0%);"><strong>sibanyu</strong></span></h5><h5>&nbsp;</h5><p><span style="color:hsl(0,0%,0%);">sibanyu adalah media online yang lahir di desa. Memproduksi informasi secara akurat, berimbang dari sumber-sumber terpercaya.</span></p><p><span style="color:hsl(0,0%,0%);">Menyajikan informasi dari desa dalam bentuk artikel (portal web) dan video (medsos) yang dapat dikunjungi pembaca dari berbagai belahan dunia.</span></p><p style="margin-left:40px;"><span style="color:hsl(0,0%,0%);">Email Redaksi : </span><a href="mailto:sibanyutmd@gmail.com"><span style="color:hsl( 209, 75%, 60% );">sibanyutmd@gmail.com</span></a></p><p style="margin-left:40px;"><span style="color:hsl(0,0%,0%);">Keuangan dan Marketing : Reni A</span></p><p style="margin-left:40px;"><span style="color:hsl(0,0%,0%);">Pemimpin Redaksi : </span><a href="https://www.instagram.com/hasratama?igsh=MW44Mmwwc2NsMjh2Zw=="><span style="color:hsl( 209, 75%, 60% );">Luthfy Hasratama</span></a></p><p style="margin-left:40px;"><span style="color:hsl(0,0%,0%);">Redaktur : </span><a href="https://www.instagram.com/mr.ikrom346465/"><span style="color:hsl( 209, 75%, 60% );">Muhammad Ikrom</span></a></p><p style="margin-left:40px;"><span style="color:hsl(0,0%,0%);">Reporter &nbsp; :</span></p><p style="margin-left:40px;"><span style="color:hsl(0,0%,0%);">Kontributor :</span></p><p style="margin-left:40px;"><span style="color:hsl(0,0%,0%);">Web Master : Imam Rofii, Jauhari, Fourreza Ichsanurrohim</span></p><p style="margin-left:40px;"><span style="color:hsl(0,0%,0%);">Konten dan Medsos : Delka Pratama, Rico Fernando, Achfirnando Eagle</span></p>'
        ]);
    }
}
