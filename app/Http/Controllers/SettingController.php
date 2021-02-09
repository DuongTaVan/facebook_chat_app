<?php

namespace App\Http\Controllers;

use App\Models\Page;
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
        $shop = ShopifyApp::shop();
        if (!$shop) {
            return false;
        }
        $setting = Setting::where('shopify_domain',$shop->shopify_domain)->first();
        $page = Page::where('shopify_domain',$shop->shopify_domain)->first();
        return view('setting.index', compact('setting', 'page'));
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
        $setting = Setting::where('shopify_domain', $shop->shopify_domain)->first();
        if (!empty($setting)) {
            $setting->update($data);
        } else {
            Setting::create($data);
        }
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
        $setting = Setting::where('shopify_domain', $shop->shopify_domain)->first();
        if ($setting->status == 1) {
            $page = Page::where('shopify_domain', $shop->shopify_domain)->first();
            $data = View::make('page.facebook_live', compact('setting', 'page'))->render();
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
        $shop = ShopifyApp::shop();
        if (!$shop) {
            return false;
        }
        $shopify_domain = $shop->shopify_domain;
        $fb = new Facebook([
            'app_id' => '1019783021844319', // Replace {app-id} with your app id
            'app_secret' => 'be9f05e2ce892802faa89de83c921337',
            'default_graph_version' => 'v9.0'
        ]);
        $token = "EAAOffLzD118BANCWw2Ry9UzhrSSHEIXHq6vajz0ZBpuG34FtzpiS9VZCg7FDwuZBoQC7rQZCT9ErteUx5MZBVjsxHVaiFsaXG5ZBaZB8Dpdo6ECjjOWKsAwXDyZBPzp8hwg7UbHF3fZA0JGuZCnmcQP8QkOqDCNhYT6D4Hu2J6K55y0PwL7ETGfMev4yLaG6vSWkBu2VJeNSaBRZCkb0xrTr4JicrHDE792yiYZD";
        try {
            // Returns a `FacebookFacebookResponse` object
            $response = $fb->get(
                '/me/accounts',
                $token
            );
        } catch (FacebookExceptionsFacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (FacebookExceptionsFacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
        $graphNodes = $response->getGraphEdge()->asArray();
        $fb_domain = 'https://' . $shopify_domain;
        if (isset($graphNodes)) {
            $id_page = $graphNodes[0]['id'];
            $token = $graphNodes[0]['access_token'];
            //dd($token);
            try {
                // Returns a `FacebookFacebookResponse` object
                $response = $fb->get(
                    '/me/messenger_profile?fields=whitelisted_domains',
                    $token
                );
            } catch (FacebookExceptionsFacebookResponseException $e) {
                echo 'Graph returned an error: ' . $e->getMessage();
                exit;
            } catch (FacebookExceptionsFacebookSDKException $e) {
                echo 'Facebook SDK returned an error: ' . $e->getMessage();
                exit;
            }
            $graphNode = $response->getGraphEdge()->asArray();
            //$whitelisted_domains = $graphNode[0]['whitelisted_domains'];
            //dd($graphNode);
            if (!empty($graphNode)) {
                $whitelisted_domains = $graphNode[0]['whitelisted_domains'];
                if (!in_array($fb_domain, $whitelisted_domains)) {
                    array_push($whitelisted_domains, $fb_domain);
                }
                //dd($whitelisted_domains);
                try {
                    // Returns a `FacebookFacebookResponse` object
                    $response = $fb->post(
                        '/me/messenger_profile',
                        array(
                            'whitelisted_domains' => $whitelisted_domains
                        ),
                        $token
                    );
                } catch (FacebookExceptionsFacebookResponseException $e) {
                    echo 'Graph returned an error: ' . $e->getMessage();
                    exit;
                } catch (FacebookExceptionsFacebookSDKException $e) {
                    echo 'Facebook SDK returned an error: ' . $e->getMessage();
                    exit;
                }
            } else {
                try {
                    // Returns a `FacebookFacebookResponse` object
                    $response = $fb->post(
                        '/me/messenger_profile',
                        array(
                            'whitelisted_domains' => '[
                            "' . $fb_domain . '"
                        ]'
                        ),
                        $token
                    );
                } catch (FacebookExceptionsFacebookResponseException $e) {
                    echo 'Graph returned an error: ' . $e->getMessage();
                    exit;
                } catch (FacebookExceptionsFacebookSDKException $e) {
                    echo 'Facebook SDK returned an error: ' . $e->getMessage();
                    exit;
                }
            }
            $graphNode = $response->getGraphNode();
            if (!empty($id_page)) {
                $domain = Page::where('shopify_domain', $shopify_domain)->first();
                if (empty($domain)) {
                    Page::create(['id_page' => $id_page, 'shopify_domain' => $shopify_domain]);
                }
                else{
                    $domain->update(['id_page' => $id_page, 'shopify_domain' => $shopify_domain]);
                }
            }
            dd("success !!!");
        }
    }
}
