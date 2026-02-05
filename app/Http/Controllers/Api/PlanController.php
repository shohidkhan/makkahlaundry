<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    use ApiResponse;

    public function index(){
        $plans = Plan::all();

        if($plans->isEmpty()){
            return $this->error([], 'Plans not found.',404);
        }
        return $this->success($plans, 'Plans retrieved successfully.',200);
    }
}
