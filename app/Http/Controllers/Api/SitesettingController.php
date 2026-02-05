<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SystemSetting;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class SitesettingController extends Controller
{
    use ApiResponse;


    public function siteSettings(){
        $systemSetting = SystemSetting::first();
        return $this->success($systemSetting, 'System settings retrieved successfully.');
    }
}