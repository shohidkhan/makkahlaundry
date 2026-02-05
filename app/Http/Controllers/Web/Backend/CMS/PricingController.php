<?php

namespace App\Http\Controllers\Web\Backend\CMS;

use App\Enum\PageEnum;
use App\Enum\SectionEnum;
use App\Http\Controllers\Controller;
use App\Models\CMS;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index() {
        $data  = CMS::where('page_name',PageEnum::HOME)->where('section_name',SectionEnum::HOME_PRICING)->first();
        return view('backend.layouts.cms.home_pricing.index',compact('data'));
    }


    public function update(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $cms = CMS::updateOrCreate(
            [
                'page_name' => PageEnum::HOME,
                'section_name' => SectionEnum::HOME_PRICING,
            ],
            [
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'description' => $request->description,
            ]
        );


        return redirect()->route('admin.cms.pricing.index')->with('t-success', 'Pricing section updated successfully.');
    }
}
