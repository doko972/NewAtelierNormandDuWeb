<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            ['key' => 'company_name', 'value' => 'Atelier Normand du Web', 'group' => 'general'],
            ['key' => 'siret', 'value' => '939 474 755 00013', 'group' => 'general'],
            ['key' => 'address', 'value' => 'route de Vassy, 14110 Condé-en-Normandie, France', 'group' => 'general'],
            ['key' => 'contact_email', 'value' => 'contact@ateliernormandduweb.fr', 'group' => 'general'],
            ['key' => 'phone', 'value' => '06 16 60 28 98', 'group' => 'general'], // usage interne uniquement, jamais affiché tel quel côté public
            ['key' => 'theme_default', 'value' => 'dark', 'group' => 'theme'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
