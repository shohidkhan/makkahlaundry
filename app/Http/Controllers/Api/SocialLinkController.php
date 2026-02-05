<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    use ApiResponse;

    public function socialLinks(){
        $socialLinks = SocialMedia::all();
        return $this->success($socialLinks, 'Social links retrieved successfully.');
    }
}
