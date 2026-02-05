<?php

namespace App\Enum;

enum SectionEnum: string
{
    case HOME_BANNER  = 'home_banner';
    case HOME_BANNERS  = 'home_banners';
    case HOME_HOW_WORKS  = 'home_how_works';
    case HOME_HOW_WORK  = 'home_how_work';
    case HOME_PRICING  = 'home_pricing';

    case HOME_ACCOUNT  = 'home_account';
}
