<?php

namespace App\Http\Controllers\sanctum;



use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

ini_set('error_reporting', E_ALL); // or error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

class PaypalController extends Controller
{
    /**
     * Returns PayPal HTTP client instance with environment that has access
     * credentials context. Use this instance to invoke PayPal APIs, provided the
     * credentials have access.
     */
    public static function client()
    {
        return new PayPalHttpClient(self::environment());
    }

     /**
     * Set up and return PayPal PHP SDK environment with PayPal access credentials.
     * This sample uses SandboxEnvironment. In production, use LiveEnvironment.
     */
    public static function environment()
    {
        $clientId = getenv("CLIENT_ID") ?: "PAYPAL-SANDBOX-CLIENT-ID";
        $clientSecret = getenv("CLIENT_SECRET") ?: "PAYPAL-SANDBOX-CLIENT-SECRET";
        return new SandboxEnvironment($clientId, $clientSecret);
    }
    //

    public static function headers(){
//         curl -v POST https://api-m.sandbox.paypal.com/v1/oauth2/token \
//   -H "Accept: application/json" \
//   -H "Accept-Language: en_US" \
//   -u "ATUwhI4LE8PkG8xt59A3JCVetBdfZ-wsRASqGaaz3lPuDdgpX9Kn5VryAzevNcLVfExfD5NftEXyVjX2:EFChhRL_vgdDV5AD7VYsN-US1sb2Uhq1Qf5oE-pHJYn8OVmdpxmAuLbQzEbDWbwHH6K_xiBZ_6BbO7oI" \
//   -d "grant_type=client_credentials"
        $request = new OrdersCreateRequest();
        $request->headers["prefer"] = "return=representation";
    }
}
