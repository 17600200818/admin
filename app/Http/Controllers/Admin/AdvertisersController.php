<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Advertiser;
use Illuminate\Support\Facades\DB;

class AdvertisersController extends Controller
{
    public function index() {
        $advertisers = DB::table('advertisers')->leftJoin('buyers', 'advertisers.buyer_id', '=', 'buyers.id')->select('advertisers.*', 'buyers.company as buyer_company')->paginate(10);
        return view('admin.advertisers.index', compact('advertisers'));
    }

    public function edit(Advertiser $advertiser) {
        $buyer = $advertiser->buyer;
        $category = $advertiser->sysIndustryCategory;
        $categoryList = $category->categoryList();
        return view('admin.advertisers.edit', compact('advertiser', 'buyer', 'category', 'categoryList'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $data = [
            'name' => $request->name,
            'site_name' => $request->site_name,
            'domain' => $request->domain,
            'address' => $request->address,
            'category1' => $request->category1,
            'category2' => $request->category2,
        ];

        Advertiser::where('id', $id)->update($data);
        return redirect()->route('advertisers.index');
    }

    public function editStatus(Request $request) {
        $result = ['status' => '1',  'statusInfo' => 'error'];
        $this->validate($request, [
            'advertiserId' => 'required|integer',
            'status' => 'required|integer|between:1,4'
        ]);

        $advertiser = Advertiser::findOrFail($request->advertiserId);
        $advertiser->status = $request->status;
        $bool = $advertiser->save();
        if ($bool === true) {
            $result = ['status' => 0, 'statusInfo' => 'ok'];
        }

        return $result;
    }
}
