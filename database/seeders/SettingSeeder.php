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
            'contact' => '1234567890',
            'whatsapp' => '1234567890',
            'description' => 'Portal berita terkini Sibanyu memberikan informasi terbaru seputar berita terkini dari berbagai kategori.',
            'about' =>
            '<p style="text-align:center;"> <i>sibanyu</i> adalah Koran Digital yang menjadi sumber utama berita dan informasi terkini. Dengan fokus pada berita lokal, nasional, dan internasional, kami menyajikan informasi terbaru tentang berbagai topik yang relevan dengan masyarakat. Tim redaksi kami bekerja keras untuk memberikan liputan yang komprehensif dan terpercaya, serta artikel-artikel berkualitas yang mengulas isu-isu penting dalam masyarakat. </p> <p style="text-align:center;"> Kami berkomitmen untuk menjadi mitra informasi terpercaya bagi pembaca setia kami. Dengan mengusung semangat pemberitaan yang objektif dan akurat, <i>ibanyu</i> bertekad untuk tetap menjadi sumber berita yang dapat diandalkan dalam menyajikan informasi terkini dan bermanfaat bagi pembaca dari berbagai kalangan. </p> <p style="text-align:center;"> Terima kasih telah mempercayai <i>sibanyu</i> sebagai sumber informasi Anda. Kami senantiasa berusaha memberikan layanan terbaik dan menjadi jembatan komunikasi yang menghubungkan pembaca dengan dunia sekitarnya. </p>'
        ]);
    }
}
