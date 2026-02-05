<?php

namespace App\Http\Controllers\Api\CMS;

use App\Enum\PageEnum;
use App\Enum\SectionEnum;
use App\Http\Controllers\Controller;
use App\Models\CMS;
use App\Models\Plan;
use App\Models\Testimonial;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class HomeCMSController extends Controller
{
    use ApiResponse;
    public function index(){
        $banner = CMS::select('title','description','background_image')->where('page_name', PageEnum::HOME)->where('section_name', SectionEnum::HOME_BANNER)->first();

        $howWork = CMS::select('title','sub_title','description')->where('page_name', PageEnum::HOME)->where('section_name', SectionEnum::HOME_HOW_WORK)->first();
        $homePricing = CMS::select('title','sub_title','description')->where('page_name', PageEnum::HOME)->where('section_name', SectionEnum::HOME_PRICING)->first();
        $homeAccount = CMS::select('title','sub_title','description')->where('page_name', PageEnum::HOME)->where('section_name', SectionEnum::HOME_ACCOUNT)->first();

        // return $homeAccount;
        $howWorkItems = CMS::select('title','description')->where('page_name', PageEnum::HOME)->where('section_name', SectionEnum::HOME_HOW_WORKS)->get();
        $testimonials  = Testimonial::latest()->take(3)->get();
        $plans = Plan::all();
        $data = [
            'banner' => $banner,
            'howWork' => $howWork,
            'howWorkItems' => $howWorkItems,
            'testimonials' => $testimonials,
            'homePricing' => $homePricing,
            'homeAccount' => $homeAccount,
            'plans' => $plans,
        ];

        return $this->success($data, 'Data retrieved successfully',200);

    }
}
