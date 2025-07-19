<?php

namespace Database\Seeders;

use App\Models\Config;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $configs = Config::create([
            'title' => '100% Bahan Berkualitas',
            'subtitle' => 'Makan Enak, Tanpa Drama – eCatering Siap Antar Kapan Saja!',
            'mobile' => '0811122334455',
            'address' => 'Jalan Soekarno Hatta, Bandung',
            'email' => 'mail@mail.com',
            'facebook' => '#',
            'youtube' => '#',
            'instagram' => '#',
            'why' => 'Karena kami menggabungkan rasa, kecepatan, dan kenyamanan dalam satu layanan. Di eCatering, kami memahami bahwa waktu Anda berharga. Itulah mengapa kami menghadirkan solusi praktis untuk kebutuhan makanan harian maupun acara spesial. Dengan bahan berkualitas, koki berpengalaman, dan sistem pemesanan online yang mudah, kami memastikan setiap hidangan sampai di tangan Anda dengan cita rasa terbaik dan pelayanan profesional'
        ]);
    }
}
