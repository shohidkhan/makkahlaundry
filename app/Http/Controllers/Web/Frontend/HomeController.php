<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Enum\PageEnum;
use App\Enum\SectionEnum;
use App\Http\Controllers\Controller;
use App\Models\CMS;
use App\Models\Whatsapp;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $whatsapp=Whatsapp::first();
        $banners= CMS::where('page_name',PageEnum::HOME)->where('section_name',SectionEnum::HOME_BANNER)->where('status','active')->get();
        return view('frontend.layouts.pages.home',compact('whatsapp','banners'));
    }


}
