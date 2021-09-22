<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.site_name', 'Canada Vite Immigration');
        $this->migrator->add('general.phone', '123 456 7890');
        $this->migrator->add('general.home_titel', 'Canada Vite Immigration');
        $this->migrator->add('general.home_description', "Conscient de l’apport positif des émigrants au développement économique, social et démographique ; le Canada offre plusieurs programmes d’immigration destinés aux étrangers désirant d'y s’installer et d'y vivre. La réalisation de votre rêve d'immigrer au Canada passe par plusieurs étapes auxquelles notre bureau a le plaisir de vous assister, vous orienter et vous accompagner.");
        $this->migrator->add('general.home_sub_desc', ' Le rève devient réalité ');
        $this->migrator->add('general.home_link', '/');
        $this->migrator->add('general.home_image', '/images/brand.png');
        $this->migrator->add('general.home_background', '/images/canadaback.jpeg');
        $this->migrator->add('general.video_url', 'RedevEdu');
        $this->migrator->add('general.video_background', '/images/videobg.jpg');
        $this->migrator->add('general.video_link', '');
        $this->migrator->add('general.video_titel', '');
        $this->migrator->add('general.video_description', '');
        $this->migrator->add('general.video_sub_desc', '');
        $this->migrator->add('general.client_count', '123');
        $this->migrator->add('general.projet_count', '453');
        $this->migrator->add('general.partner_count', '18');
        $this->migrator->add('general.country_count', '12');
        $this->migrator->add('general.facebook_url', 'https://facebook.com');
        $this->migrator->add('general.instagrame_url', 'https://facebook.com');
        $this->migrator->add('general.whatsup_url', 'https://facebook.com');
        $this->migrator->add('general.messenger_url', 'https://facebook.com');
        $this->migrator->add('general.twitter_url', 'https://facebook.com');
        $this->migrator->add('general.linkedin_url', 'https://facebook.com');
        $this->migrator->add('general.youtube_url', 'https://facebook.com');
        $this->migrator->add('general.seo_titel', "Canada Vite Immigration");
        $this->migrator->add('general.seo_description', "Conscient de l’apport positif des émigrants au développement économique, social et démographique ; le Canada offre plusieurs programmes d’immigration destinés aux étrangers désirant d'y s’installer et d'y vivre. La réalisation de votre rêve d'immigrer au Canada passe par plusieurs étapes auxquelles notre bureau a le plaisir de vous assister..");
        $this->migrator->add('general.seo_keyword', "Canada, Redev");


        $this->migrator->add('general.recapachekey', "");
        $this->migrator->add('general.recapachesitekey', "");
        $this->migrator->add('general.google_analytics', "");
        $this->migrator->add('general.google_maps', "");
        $this->migrator->add('general.scripte', "");

        
        $this->migrator->add('general.logo_512x512', "/logo_512x512.png");
    }
}
