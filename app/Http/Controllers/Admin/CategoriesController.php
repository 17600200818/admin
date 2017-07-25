<?php

namespace App\Http\Controllers\Admin;

use App\Models\SysIndustryCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function getCategory2(Request $request) {
        $category1 = $request->category1;
        $category2List = SysIndustryCategory::where('c1', $category1)->get();
        return $category2List;
    }
}
