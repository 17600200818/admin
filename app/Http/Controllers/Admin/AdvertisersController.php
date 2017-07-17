<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Advertiser;

class AdvertisersController extends Controller
{
    public function index() {
        $advertisers = Advertiser::paginate(10);
        return view('admin.advertisers.index', compact('advertisers'));
    }
}
