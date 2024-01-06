<?php

declare(strict_types=1);

namespace App\Http\Enums;

enum FeatureEnum: string {
    // case Login = 'login';
    // case Register = 'register';
    case Home = 'home';
    case ContactUs = 'contact-us';
    case Romms = 'rooms';
    case Hotels = 'hotels';
    case AboutUs = 'about-us';
    case News = 'news';
}
