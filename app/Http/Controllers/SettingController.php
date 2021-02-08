<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Carbon\Carbon;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use OhMyBrew\ShopifyApp\Facades\ShopifyApp;
use Facebook\Facebook as Facebook;
use Facebook\Exceptions\FacebookResponseException as FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException as FacebookSDKException;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::findOrFail(1);
        return view('setting.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $shop = ShopifyApp::shop();
        $data['shopify_domain'] = $shop->shopify_domain;
        if ($request->status == "on")
            $data['status'] = 1;
        else
            $data['status'] = 0;
        $setting = Setting::findOrFail(1);
        //dd($data);
        $setting->update($data);
        $this->addScript_FB_ToTheme();
        return response([
            'message' => 'success',
            'type' => 'success'
        ]);
    }

    public function addScript_FB_ToTheme()
    {
        $data = [];
        $shop = ShopifyApp::shop();
        if (!$shop) {
            return false;
        }
        $setting = Setting::findOrFail(1);
        if ($setting->status == 1) {
            $data = View::make('page.facebook_live', compact('setting'))->render();
        }
        $fileScript = file_get_contents('js/ndnapps_facebook.js');
        $fileScript = 'var ndn_facebook_data= "' . base64_encode(json_encode($data)) . '";' . $fileScript;
        $theme = $shop->api()->rest('GET', '/admin/themes.json', ['fields' => 'id,name,role'])->body->themes;
        foreach ($theme as $_child) {
            if ($_child->role == "main") {
                $layout = $shop->api()->rest('GET', '/admin/themes/' . $_child->id . '/assets.json', ['asset' => ['key' => 'layout/theme.liquid']])->body->asset->value;
                $add_script = ["key" => "assets/ndnapps-facebook.js", "value" => $fileScript];
                $put_script = $shop->api()->rest('PUT', '/admin/themes/' . $_child->id . '/assets.json', ['asset' => $add_script]);
                $new_layout = $layout;

                if (!strpos($layout, 'ndnapps-facebook.js')) {
                    $new_layout = str_replace("</body>", "<script src='{{ 'ndnapps-facebook.js' | asset_url }}' defer='defer'></script>\n</body>", $layout);
                }

                $put2 = $shop->api()->rest('PUT', '/admin/themes/' . $_child->id . '/assets.json', ['asset' => ["key" => "layout/theme.liquid", 'value' => $new_layout]]);
            }
        }

    }

    public function loginFB(Request $request)
    {
        //dd($request->all());
        session_start();
        $fb = new Facebook([
            'app_id' => '1019783021844319', // Replace {app-id} with your app id
            'app_secret' => 'be9f05e2ce892802faa89de83c921337',
            'default_graph_version'  => 'v9.0'
        ]);
        $token = "EAAOffLzD118BAIwQXcmkYnedZAt3YEMPaAWDXA3cdalq7tY1O5iEv4AyjxZAWqJbyMSXYdmfGYT00gLjnigTG1fCt6C9TsZB0hK1OImwE4Mmoi4YrzEAr3NDZAophfbfz4jwAyWkjZAqIgZAlqNCOGax3AgqGEFoZCNo6DvTPEkdZBJzsb0CipN5FO8MqmFBN6h9n8X58IgOn6hdnpZBJ5gByZCDSfUBFiIKMZD";
        //dd($token);
        try {
            // Returns a `FacebookFacebookResponse` object
            $response = $fb->get(
                '/me/accounts',
                $token
            );
        } catch(FacebookExceptionsFacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(FacebookExceptionsFacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
        //$graphNodes = $response->getGraphNode();

        $graphNodes = $response->getGraphEdge()->asArray();
        dd($graphNodes);
        $token = $graphNodes[0]['access_token'];
        try {
            // Returns a `FacebookFacebookResponse` object
            $response = $fb->post(
                '/me/messenger_profile',
                array (
                    'whitelisted_domains' => '[
                    "https://dth99store.myshopify.com"
        ]'
                ),
                $token
            );
        } catch(FacebookExceptionsFacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(FacebookExceptionsFacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
        $graphNode = $response->getGraphNode();
        dd($graphNode);
        //return view('setting.choose_page', compact('graphNodes'));

    }
}
