<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Navbar;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;
use App\http\Requests;
use Validator;
use Response;
use ShopifyApp;
use App\Storelocator;
use App\SettingsStores;
use Illuminate\Support\Facades\Mail;
use App\Helper\CustomBladeCompiler;
use Illuminate\Support\Facades\Lang;
use App\Helper\MapStyles;

// use App;

class AppProxyController extends Controller
{
    public function test()
    {
        return view('plan.index');
    }

    public function facebook()
    {
        $setting = Setting::findOrFail(1);
        return response()->view('page.facebook_live', compact('setting'))
            ->withHeaders(['Content-Type' => 'application/liquid']);
    }
}
