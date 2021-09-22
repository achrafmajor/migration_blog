
<?php

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $site_name;
    public string $phone;
    public string $home_titel;
    public string $home_description;
    public string $home_sub_desc;
    public string $home_link;
    public string $home_image;
    public string $home_background;
    public string $video_url;
    public string $video_background;
    public string $video_link;
    public string $video_titel;
    public string $video_description;
    public string $video_sub_desc;
    public string $client_count;
    public string $projet_count;
    public string $partner_count;
    public string $country_count;
    public string $facebook_url;
    public string $instagrame_url;
    public string $youtube_url;
    public string $whatsup_url;
    public string $messenger_url;
    public string $linkedin_url;
    public string $twitter_url;
    public string $seo_titel;
    public string $seo_description;
    public string $seo_keyword;
    public string $recapachekey;
    public string $recapachesitekey;
    public string $google_analytics;
    public string $google_maps;
    public string $scripte;
    public string $logo_512x512;
    public static function group(): string
    {
        return 'general';
    }
}