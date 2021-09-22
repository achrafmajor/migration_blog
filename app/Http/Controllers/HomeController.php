<?php

namespace App\Http\Controllers;
use Artesaos\SEOTools\Facades\SEOTools;
use GeneralSettings;
use Illuminate\Support\Facades\Request;

class HomeController extends Controller
{
    public function index()
    {
        SEOTools::setTitle(app(GeneralSettings::class)->site_name);
        SEOTools::setDescription(app(GeneralSettings::class)->seo_description);
        SEOTools::opengraph()->setUrl(Request::url());
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::jsonLd()->addImage(app(GeneralSettings::class)->logo_512x512);
        return view('front.home.index');
    }
}
