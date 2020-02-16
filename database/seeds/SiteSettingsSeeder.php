<?php

use Illuminate\Database\Seeder;

class SiteSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\SiteSetting::create([
            'site_name' => 'صانع الصور',
            'site_email' => 'fake@fake.com',
            'site_description' => 'we make photos we make photos we make photos we make photos we make photos ',
            'site_facebook' => 'https://www.facebook.com/bla',
            'site_twitter' => 'https://www.twitter.com/bla',
            'site_instagram' => 'https://www.instagram.com/bla',
            'site_google_plus' => 'https://www.google.com/bla',
            'site_logo' => asset('logo.png'),
        ]);
    }
}
