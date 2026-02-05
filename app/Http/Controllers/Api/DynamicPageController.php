<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DynamicPage;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class DynamicPageController extends Controller
{
    use ApiResponse;


    public  function dynamicPages(){
        $pages =  DynamicPage::all();

        if($pages->isEmpty()){
            return $this->error(404,'No Dynamic Pages Found',404);
        }

        return $this->success($pages,'Dynamic Pages Fetched Successfully',200);
    }

    public function single($slug)
    {
        $page  = DynamicPage::where('page_slug', $slug)->first();

        if (!$page) {
            return $this->error([], 'Dynamic Page Not Found', 404);
        }

        return $this->success($page, 'Dynamic Page Fetched Successfully', 200);
    }
}
