<?php

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiteSetting::truncate(); // delete this table content since there is only one row to be used >> site settings :)
        SiteSetting::create([
            'description' => 'No description yet!',
            'country' => 'Palestine',
            'address' => 'Al-Remal Street Gaza Strip',
        ]);
    }
}
