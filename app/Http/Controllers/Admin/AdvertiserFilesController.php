<?php

namespace App\Http\Controllers\Admin;

use App\Models\Advertiser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdvertiserFilesController extends Controller
{
    public function store(Request $request) {
        $info = ['status' => 1, 'msg' => 'error'];
        $this->validate($request, [
            'advertiserId' => 'required',
            'name' => 'required',
            'code' => 'required',
            'file' => 'required|file',
        ]);

        $path = $request->file('file')->store('advertiserFile');

        $advertiser = Advertiser::findOrFail($request->advertiserId);
        $buyerId = $advertiser->buyer->id;
        if ($path) {
            $data = [
                'buyer_id' => $buyerId,
                'advertiser_id' => $request->advertiserId,
                'code' => $request->code,
                'name' => $request->name,
                'file_path' => $path,
                'status' => 1,
                'cuid' => Auth::id(),
                'created_at' => date('Y-m-d h:i:s')
            ];

            $result = DB::table('advertiser_files')->insert($data);
            if ($result) {
                $info = ['status' => 0, 'msg' => ''];
            }
        }

        return $info;
    }
}
