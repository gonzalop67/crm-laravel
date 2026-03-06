<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            ['key' => 'name', 'value' => 'CRM'],
            ['key' => 'phone', 'value' => '00000000'],
            ['key' => 'mail_host', 'value' => 'mail.colegionocturnosalamanca.com'],
            ['key' => 'mail_port', 'value' => '465'],
            ['key' => 'mail_username', 'value' => 'noreply@colegionocturnosalamanca.com'],
            ['key' => 'mail_password', 'value' => 'gP67M24e$'],
            ['key' => 'mail_encryption', 'value' => 'ssl'],
            ['key' => 'logo', 'value' => ''],
        ];

        foreach ($settings as $setting) {
            Setting::firstOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
